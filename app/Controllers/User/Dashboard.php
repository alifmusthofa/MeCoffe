<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use App\Models\TransaksiModel;
use App\Models\DaftarbelanjaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Dashboard extends BaseController
{

    public function index()
    {

        $produk = new ProdukModel();
        $kunci = $this->request->getVar('keyword');
        $ukuran = $this->request->getVar('ukuran');
        if ($kunci !== null) {
            $data['produk'] = $produk->like('nama', $kunci)->where('status', 'jual')->findAll();
        } elseif ($ukuran !== null) {
            $data['produk'] = $produk->where('ukuran', $ukuran)->findAll();
        } else {
            $data['produk'] = $produk->where('status', 'jual')->findAll();
        }
        $ukuran = new CategoryModel();
        $data['ukuran'] = $ukuran->findAll();
        echo view('user/dashboard', $data);
    }

    //------------------------------------------------------------

    public function detail($slug)
    {
        $produk = new ProdukModel();
        $data['produk'] = $produk->where([
            'slug' => $slug,
            'status' => 'jual'
        ])->first();

        if (!$data['produk']) {
            throw PageNotFoundException::forPageNotFound();
        }

        echo view('user/detail', $data);
    }
    public function pembayaran($slug)
    {
        $produk = new ProdukModel();
        $data['produk'] = $produk->where([
            'slug' => $slug,
            'status' => 'jual'
        ])->first();


        if (!$data['produk']) {
            throw PageNotFoundException::forPageNotFound();
        }
        $jumlah = $this->request->getVar('jumlah');
        $data['jumlah'] = $jumlah;
        echo view('user/pembayaran', $data);
    }

    public function Profile()
    {
        $user = new UserModel();
        $data['user'] = $user->where([
            'id' => $this->session->get('id'),
        ])->first();


        echo view('user/editProfil', $data);
    }

    public function UpdateProfile()
    {
        $user = new UserModel();
        $id = $this->session->get('id');
        $data['user'] = $user->where('id', $id)->first();

        $user->update($id, [
            "nomor" => $this->request->getPost('phone'),
            "alamat" => $this->request->getPost('address'),
        ]);
        return redirect()->to('/user/dashboard');
    }

    public function listBarang()
    {
        $transaksi = new TransaksiModel();

        //tangkap data dari form 
        $data = $this->request->getPost();

        // masukan data ke database

        $transaksi->insert([
            'id_user' => $this->session->get('id'),
            'metodePembayaran' => $data['payment'],
            'totalpembelian' => $data['totalPembayaran'],
        ]);

        $idTransaksi = $transaksi->last($this->session->get('id'));
        $idStringTransaksi = json_decode(json_encode($idTransaksi), true);

        $daftarBelanja = new DaftarbelanjaModel();
        $status = "belum";
        $daftarBelanja->insert([
            'id_user' => $this->session->get('id'),
            'id_barang' => $data['id_product'],
            'id_transaksi' => $idStringTransaksi,
            'jumlah' => $data['jumlah'],
            'harga' => $data['harga'],
            'totalharga' => $data['Totalharga'],
            'status' => $status,
        ]);

        //jika berhasil membeli
        session()->setFlashdata('pembelian', 'Pesanan Anda telah berhasil diproses.');

        $hasil = json_decode(json_encode($transaksi->jointransaksi()), true);
        $data['hasil'] = $hasil;
        echo view('user/listBarang', $data);
    }
    public function daftarBelanja()
    {

        $transaksi = new TransaksiModel();
        $hasil = json_decode(json_encode($transaksi->jointransaksi()), true);
        $data['hasil'] = $hasil;
        echo view('user/listBarang', $data);
    }
}