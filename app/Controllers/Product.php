<?php

namespace App\Controllers;

use App\Models\ApproveModels;
use App\Models\ProductsModels;

class Product extends BaseController
{
    protected $ProdukModel;
    protected $ApproveModel;
    public function __construct()
    {
        $this->ProdukModel = new ProductsModels();
        $this->ApproveModel = new ApproveModels();
    }

    public function index(): string
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
            'title' => 'Detail Produk ' . $this->ProdukModel->getProduk($url)['nama_produk'],
            'product' => $this->ProdukModel->getProduk($url),
            'errors' => \Config\Services::validation()
        ];
        return view('EditProduct', $data);
    }


    public function AddProduct()
    {
        $validationRules = [
            'namaproduct' => [
                'rules' => 'required|min_length[3]|max_length[100]|regex_match[/^[a-zA-Z0-9\s]+$/]|is_unique[produk_items.nama_produk]',
                'errors' => [
                    'required' => 'Nama Produk Wajib diisi',
                    'min_length' => 'Nama Produk Minimal 3 Karakter',
                    'is_unique' => 'Nama Produk Sudah Ada !!!',
                    'regex_match' => 'Nama Produk Harap Diisi Dengan Benar !!!'  // hanya mengizinkan huruf, angka, dan spasi
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
            session()->setFlashdata('modal', 'product');
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
            'hrg_prdk' => str_replace('.', '', $this->request->getPost('hargaproduk')),
            'stock_prdk' => $this->request->getPost('jmlh_produk'),
            'img_prdk' =>  $NImageProduk
        ];
        $this->ProdukModel->save($data);
        return redirect()->to('/ListProduct')->with('message', 'Data berhasil Ditambahkan !!!');
    }

    public function editProduct($id_produk)
    {
        $validationRules = [
            'namaproduct' => [
                'rules' => 'required|min_length[3]|max_length[100]|regex_match[/^[a-zA-Z0-9\s]+$/]|is_unique[produk_items.nama_produk, id_produk,' . $id_produk . ']',
                'errors' => [
                    'required' => 'Nama Produk Wajib diisi',
                    'min_length' => 'Nama Produk Minimal 3 Karakter',
                    'is_unique' => 'Nama Produk Sudah Ada !!!',
                    'regex_match' => 'Nama Produk Harap Diisi Dengan Benar !!!'  // hanya mengizinkan huruf, angka, dan spasi
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

            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $imageProduk = $this->request->getFile('imageprdk');
        $imageOld = $this->request->getPost('imageproduklama');
        $nama_produk = $this->request->getPost('namaproduct');
        $url = str_replace(' ', '-', $nama_produk);


        if ($imageProduk->getError() == 4) {
            $nameImage = $imageOld;
        } else if ($imageOld == 'noimage.webp') {

            $nameImage =   $imageProduk->getRandomName();
            $imageProduk->move('assets/images/product/', $nameImage);
        } else {
            $nameImage = $imageProduk->getRandomName();
            $imageProduk->move('assets/images/product/', $nameImage);
            unlink('assets/images/product/' . $imageOld);
        }
        $data = [
            'id_produk' => $id_produk,
            'nama_produk' => $nama_produk,
            'deskrip_produk' => $this->request->getPost('desc_prdk'),
            'hrg_prdk' => str_replace('.', '', $this->request->getPost('hargaproduk')),
            'stock_prdk' => $this->request->getPost('jmlh_produk'),
            'img_prdk' =>  $nameImage
        ];

        $this->ProdukModel->save($data);
        return redirect()->to('/detailProduct/' .   $url)->with('message', 'Data Berhasil di ubah !!!');
    }



    public function deleteProduct($id_produk)
    {
        $produk = $this->ProdukModel->find($id_produk);
        if ($produk['img_prdk'] != 'noimage.webp') {
            unlink('assets/images/product/' . $produk['img_prdk']);
        }

        $this->ProdukModel->delete($produk);

        return redirect()->to('/ListProduct')->with('message', 'Data berhasil dihapus !!!');
    }


    public function orderProduk()
    {
        $productId = $this->request->getPost('id_produk');
        $produk = $this->ProdukModel->find($productId);
        $jmlhPesan = (int)$this->request->getPost('jmlh_pesan');
        $totalHarga = $jmlhPesan * $produk['hrg_prdk'];
        if ($jmlhPesan > $produk['stock_prdk']) {
            session()->setFlashdata('modal', 'order');
            session()->setFlashdata('product_id', $productId);
            return redirect()->back()->withInput()->with('errors', ['jmlh_pesan' => 'Jumlah pesanan melebihi stok yang tersedia.']);
        }

        $validationRules = [
            'nama_psn' => [
                'rules' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'errors' => [
                    'required' => 'Nama Pemesan Wajib Diisi !!!',
                    'regex_match' => 'Nama Pemesan Harap Diisi Dengan Benar !!!'
                ]
            ],
            'alamat_psn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Pemesanan Wajib Diisi !!!'
                ]
            ],
            'jmlh_pesan' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Pesanan Harus Diisi !!!',

                ]
            ],
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('modal', 'order');
            session()->setFlashdata('product_id', $productId);
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id_produk' => $productId,
            'nama_pemesan' => $this->request->getPost('nama_psn'),
            'alamat_pemesanan' => $this->request->getPost('alamat_psn'),
            'jumlah_pesanan' =>    $jmlhPesan,
            'total_harga' => $totalHarga,
            'ordered_by' => user_id()
        ];
        $this->ApproveModel->save($data);
        $newStock = $produk['stock_prdk'] - $jmlhPesan;
        $this->ProdukModel->update($productId, ['stock_prdk' => $newStock]);
        return redirect()->to('/ListOrder')->with('message', 'Pesanan Anda Sudah Di Pesan Tunggu Disetujui Terlebih dahulu !!!');
    }
}
