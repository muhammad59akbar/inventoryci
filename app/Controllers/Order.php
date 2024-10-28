<?php

namespace App\Controllers;

use App\Models\ApproveModels;
use App\Models\DeliveryModels;
use App\Models\ProductsModels;
use Myth\Auth\Models\UserModel;

class Order extends BaseController
{
    protected $ApproveModel;
    protected $UserModel;
    protected $DeliveryModel;
    protected $ProdukModel;
    public function __construct()
    {
        $this->ApproveModel = new ApproveModels();
        $this->ProdukModel = new ProductsModels();
        $this->UserModel = new UserModel();
        $this->DeliveryModel = new DeliveryModels();
    }
    public function index()
    {
        $data = [
            'title' => 'List Pesanan',
            'listorder' => $this->ApproveModel->getOrder(),
            'namaKurir' =>  $this->UserModel->getKurir(),
            'errors' => \Config\Services::validation()
        ];
        return view('ListOrder', $data);
    }

    public function detailPesanan($url_order)
    {
        $data = [
            'title' => 'Detaial Pesanan ' . $this->ApproveModel->getOrder($url_order)['nama_pemesan'],
            'DetailItem' => $this->ApproveModel->getOrder($url_order)
        ];
        return view('DetailPesanan', $data);
    }

    public function ApproveItems()
    {
        $orderID = $this->request->getPost('id_approve');
        $namaKurir = $this->request->getPost('nama_kurir');
        $kurirList = $this->UserModel->getKurir();
        $kurirValid = false;
        foreach ($kurirList as $kurir) {
            if ($kurir['id'] == $namaKurir) {
                $kurirValid = true;
                break;
            }
        }
        if (!$kurirValid) {
            session()->setFlashdata('orderID',   $orderID);
            return redirect()->back()->with('errors', ['nama_kurir' => 'Masukan Nama Kurir Dengan Benar']);
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
            'nama_kurir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Pemesanan Wajib Diisi !!!'
                ]
            ]
        ];
        if (!$this->validate($validationRules)) {
            session()->setFlashdata('orderID',   $orderID);
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id_approve' => $orderID,
            'nama_pemesan' => $this->request->getPost('nama_psn'),
            'alamat_pemesanan' => $this->request->getPost('alamat_psn'),
            'id_kurir' =>  $namaKurir,
            'status' => 'Approved',
            'approved_by' => user_id(),
        ];
        $this->ApproveModel->save($data);

        $dataTanggal = date('dMY');
        $randomAngka = str_pad(mt_rand(1, 99), 2, '0', STR_PAD_LEFT);
        $noresi = $orderID . $dataTanggal . $randomAngka;

        $this->DeliveryModel->save([
            'id_approve' => $orderID,
            'no_resi' =>   $noresi,
        ]);
        return redirect()->to('/ListOrder')->with('message', 'Pesanan Anda Sudah Di Setujui, Mohon Ditunggu Sampai Pengiriman Tiba !!!');
    }

    public function deleteOrder($id_order)
    {
        $order = $this->ApproveModel->find($id_order);
        $produk = $this->ProdukModel->find($id_order);
        $newstock = $order['jumlah_pesanan'] + $produk['stock_prdk'];
        $this->ProdukModel->update($produk['id_produk'], ['stock_prdk' => $newstock]);
        $this->ApproveModel->delete($id_order);
        return redirect()->to('/ListOrder')->with('message', 'Data berhasil dihapus !!!');
    }


    public function ListPengiriman(): string
    {
        $data = [
            'title' => 'List Pengiriman',
            'listpngirim' => $this->DeliveryModel->findAll()
        ];
        return view('ListPengiriman', $data);
    }
}
