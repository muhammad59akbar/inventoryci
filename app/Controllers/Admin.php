<?php

namespace App\Controllers;

use App\Models\ProductsModels;

class Admin extends BaseController
{
    protected $ProdukModel;
    public function __construct()
    {
        $this->ProdukModel = new ProductsModels();
    }
    public function index(): string
    {
        $data = [
            'title' => 'tester',
        ];
        return view('Dashboard', $data);
    }

    public function ListUser(): string
    {
        $data = [
            'title' => 'List User',
        ];
        return view('UserList', $data);
    }

    public function Product(): string
    {
        $data = [
            'title' => 'List Product',
            'listprdk' => $this->ProdukModel->getProduk(),
            'errors' => \Config\Services::validation()
        ];
        return view('ListProduct', $data);
    }

    public function detailProduk($url): string
    {

        $data = [
            'title' => 'Detail Produk',
            'product' => $this->ProdukModel->getProduk($url)
        ];
        return view('EditProduct', $data);
    }


    public function AddProduct()
    {
        $validationRules = [
            'namaproduct' => [
                'rules' => 'required|min_length[3]|max_length[100]|is_unique[produk_items.nama_produk]',
                'errors' => [
                    'required' => 'Nama Produk Wajib diisi',
                    'min_length' => 'Nama Produk Minimal 3 Karakter',
                    'is_unique' => 'Nama Produk Sudah Ada !!!'
                ]
            ],
            'desc_prdk'   =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Produk Wajib Diisi'
                ]
            ],
            'jmlh_produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Produk Wajib Diisi'
                ]
            ],
            'hargaproduk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Produk Wajib Diisi'
                ]
            ],
            'imageprdk' => [
                'rules' => 'max_size[imageprdk,1024]|is_image[imageprdk]|mime_in[imageprdk,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'this file very big',
                    'is_image' => 'this is not image',
                    'mime_in' => 'this is not image',

                ]

            ]
        ];


        if (!$this->validate($validationRules)) {

            return redirect()->to('/ListProduct')->withInput()->with('errors', $this->validator->getErrors());
        }

        $imageProduk = $this->request->getFile('imageprdk');

        if ($imageProduk->getError() === 4) {
            $NImageProduk = 'noimage.webp';
        } else {
            $NImageProduk = $imageProduk->getRandomName();
            $imageProduk->move('assets/images/product/', $NImageProduk);
        }

        $data = [
            'nama_produk' => $this->request->getPost('namaproduct'),
            'deskrip_produk' => $this->request->getPost('desc_prdk'),
            'hrg_prdk' => $this->request->getPost('hargaproduk'),
            'stock_prdk' => $this->request->getPost('jmlh_produk'),
            'img_prdk' =>  $NImageProduk
        ];
        $this->ProdukModel->save($data);
        return redirect()->to('/ListProduct')->with('message', 'Data berhasil Ditambahkan !!!');
    }
}
