<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DaftarbelanjaModel;
use App\Models\ProdukModel;

class Pemesanan extends BaseController
{
    protected $perpage = 10;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->session = session();
    }
    public function index()
    {
        $daftarbelanjaModel = new DaftarbelanjaModel();
        $data['daftarpembelian'] = $daftarbelanjaModel->where("status", "belum")->paginate($this->perpage, 'bootstrap');
        $data['jumlah'] = $daftarbelanjaModel->countTransaksi();
        $data['pager'] = $daftarbelanjaModel->pager;
        echo view('admin/pemesanan/proses', $data);
    }
    public function done($id)
    {
        $daftarbelanjaModel = new DaftarbelanjaModel();
        $produk = new ProdukModel();
        $jumlah = $daftarbelanjaModel->where('id', $id)->where('status', 'belum')->first();

        $stok = $produk->where('id', $jumlah['id_barang'])->first();

        if ($stok['stok'] < $jumlah['jumlah']) {
            $data['daftarpembelian'] = $daftarbelanjaModel->where("status", "belum")->paginate($this->perpage, 'bootstrap');
            $data['jumlah'] = $daftarbelanjaModel->countTransaksi();
            $data['pager'] = $daftarbelanjaModel->pager;
            $this->session->setFlashdata('gagal', 'Perubahan telah gagal karena stok telah habis');
            echo view('admin/pemesanan/proses', $data);
            exit();
        }
        $produk->update($jumlah['id_barang'], [
            "stok" => $stok['stok'] - $jumlah['jumlah'],
        ]);

        $daftarbelanjaModel->update($id, [
            'status'   => "sudah",
        ]);


        // $daftarbelanjaModel->done($id);
        return redirect()->to('/admin/pemesanan/');
    }

    public function terkirim()
    {
        $daftarbelanjaModel = new DaftarbelanjaModel();
        $data['daftarpembelian'] = $daftarbelanjaModel->where("status", "sudah")->orderBy("updated_at", "desc")->paginate($this->perpage, 'bootstrap');
        $data['jumlah'] = $daftarbelanjaModel->countTransaksi();
        $data['pager'] = $daftarbelanjaModel->pager;
        echo view('admin/pemesanan/terkirim', $data);
    }

    public function kembalikan($id)
    {
        // ambil artikel yang akan diedit
        $daftarbelanjaModel = new DaftarbelanjaModel();
        $daftarbelanjaModel->update($id, [
            'status'   => "belum",
        ]);


        // $daftarbelanjaModel->done($id);
        return redirect()->to('/admin/terkirim/');
    }
}
