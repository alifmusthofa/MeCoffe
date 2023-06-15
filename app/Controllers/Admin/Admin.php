<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use \App\Models\ProdukModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Files\File;
use CodeIgniter\Files\Files;
use CodeIgniter\Helpers\filesystem_helper;

class Admin extends BaseController
{
    protected $perpage = 5;
    protected $helpers = ['form'];


    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        //cek role dari session
        if ($this->session->get('role') != 1) {
            return redirect()->to('/auth/login');
        }
        $produk = new ProdukModel();;
        $data['produk'] = $produk->paginate($this->perpage, 'bootstrap');
        $data['pager'] = $produk->pager;
        return view('admin/dashboard', $data);
    }

    public function search()
    {
        $keyword = $this->request->getPost('keyword');
        //cek role dari session
        if ($this->session->get('role') != 1) {
            return redirect()->to('/auth/login');
        }
        if (!$keyword) {
            return redirect()->to('/admin');
        }
        $produk = new ProdukModel();
        $data['produk'] = $produk->like('nama', $keyword)->findAll();
        $data['pager'] = $produk->pager;
        return view('admin/produk/search', $data);
    }

    //--------------------------------------------------------------------------

    public function preview($id)
    {
        $produk = new ProdukModel();
        $data['produk'] = $produk->where('id', $id)->first();

        if (!$data['produk']) {
            throw PageNotFoundException::forPageNotFound();
        }
        echo view('admin/produk/detail', $data);
    }

    //--------------------------------------------------------------------------

    public function create()
    {
        $produk = new ProdukModel();

        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if ($isDataValid) {

            $upload = $this->request->getFile('gambar');
            $produk->insert([
                "nama" => $this->request->getPost('nama'),
                "slug" => url_title($this->request->getVar('nama'), '-', TRUE),
                "deskripsi" => $this->request->getPost('deskripsi'),
                "ukuran" => $this->request->getPost('ukuran'),
                "berat" => $this->request->getPost('berat'),
                "stok" => $this->request->getPost('stok'),
                "harga" => $this->request->getPost('harga'),
                'gambar' => $upload->getName(),
                "promo" => $this->request->getPost('promo'),
                "status" => $this->request->getPost('status'),

            ]);
            $result = $produk->last();
            $folderID = $result->id;
            $pathfile = '../public/assets/images/produk/' . $folderID;
            $upload->move(WRITEPATH . $pathfile);
            return redirect('admin');
        }

        // tampilkan form create
        $ukuran = new CategoryModel();
        $data['ukuran'] = $ukuran->findAll();
        echo view('admin/produk/create', $data);
    }

    //--------------------------------------------------------------------------

    public function edit($id)
    {


        // ambil artikel yang akan diedit
        $produk = new ProdukModel();
        $data['produk'] = $produk->where('id', $id)->first();

        // lakukan validasi data artikel
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'nama' => 'required',

        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if ($isDataValid) {
            $upload = $this->request->getFile('gambar');
            $folderID = $this->request->getPost('id');
            $pathfile = '../public/assets/images/produk/' . $folderID;
            $upload->move(WRITEPATH .  $pathfile, $name = $upload->getName(), $overwrite = true);
            $produk->update($id, [
                "nama" => $this->request->getPost('nama'),
                "slug" => url_title($this->request->getVar('nama'), '-', TRUE),
                "deskripsi" => $this->request->getPost('deskripsi'),
                "ukuran" => $this->request->getPost('ukuran'),
                "berat" => $this->request->getPost('berat'),
                "stok" => $this->request->getPost('stok'),
                "harga" => $this->request->getPost('harga'),
                'gambar' => $upload->getName(),
                "promo" => $this->request->getPost('promo'),
                "status" => $this->request->getPost('status'),
            ]);
            return redirect('admin');
        }

        // tampilkan form edit
        $ukuran = new CategoryModel();
        $data['ukuran'] = $ukuran->findAll();
        echo view('admin/produk/edit', $data);
    }

    //--------------------------------------------------------------------------
    public function delete($id)
    {
        helper('filesystem');
        $folderID = $id;
        $pathfile = '../public/assets/images/produk/' . $folderID;
        delete_files($pathfile, true);
        rmdir($pathfile);

        $news = new ProdukModel();
        $news->delete($id);


        return redirect('admin');
    }
}
