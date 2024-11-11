<?php

namespace App\Controllers;

use App\Models\ApproveModels;
use App\Models\DeliveryModels;
use App\Models\ProductsModels;
use Myth\Auth\Models\UserModel;


class Delivery extends BaseController
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
    public function ListPengiriman(): string
    {


        $data = [
            'title' => 'List Pengiriman',
            'listpngirim' =>  $this->DeliveryModel->getDelivery(),
            'errors' => \Config\Services::validation()
        ];

        return view('ListPengiriman', $data);
    }

    public function detailPengiriman($url_pemesanan)
    {
        $data = [
            'title' => 'Detail Pengiriman',
            'detailpengirim' => $this->DeliveryModel->getDelivery($url_pemesanan)
        ];
        return view('DetailDelivery', $data);
    }
    public function RiwayatPengiriman()
    {
        $data = [
            'title' => 'Riwayat Pengiriman',
            'listpngirim' =>  $this->DeliveryModel->getDelivery(),
        ];
        return view('RiwayatPengiriman', $data);
    }

    public function detailRiwayatPengiriman($url_pemesanan)
    {
        $data = [
            'title' => 'Detail Pengiriman',
            'detailpengirim' => $this->DeliveryModel->getDelivery($url_pemesanan)
        ];
        return view('DetailRiwayatPengiriman', $data);
    }

    public function ApprovePengiriman()
    {

        $deliveryID = $this->request->getPost('id_pengiriman');

        $validationRules = [
            'nama_penerima' => [
                'rules' => 'required|regex_match[/^[a-zA-Z0-9\s]+$/]',
                'errors' => [
                    'required' => 'Nama Penerima Wajib Diisi !!!',
                    'regex_match' => 'Nama Penerima Harap Diisi Dengan Benar !!!'
                ]
            ],
            'fotopenerima' => [
                'rules' => 'uploaded[fotopenerima]|max_size[fotopenerima,1024]|is_image[fotopenerima]|mime_in[fotopenerima,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Wajib Diisi !!!',
                    'max_size' => 'this file very big',
                    'is_image' => 'this is not image',
                    'mime_in' => 'this is not image',

                ]

            ]

        ];
        if (!$this->validate($validationRules)) {
            session()->setFlashdata('deliveryID',   $deliveryID);
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }


        $imagebukti = $this->request->getFile('fotopenerima');
        $Nimagebukti = $imagebukti->getRandomName();
        $imagebukti->move('assets/images/bukti/', $Nimagebukti);


        $data = [
            'id_pengiriman' => $deliveryID,
            'nama_penerima' => $this->request->getPost('nama_penerima'),
            'foto_penerima' => $Nimagebukti,
            'status' => 'Delivered Successfully'
        ];

        $this->DeliveryModel->save($data);
        return redirect()->to('/ListPengiriman')->with('message', 'Bukti Telah Disimpan Terimakasih Atas Pengiriman Anda !!!');
    }
}
