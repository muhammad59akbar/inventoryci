<?php

namespace App\Models;

use CodeIgniter\Model;

class ApproveModels extends Model
{
    protected $table      = 'approve_items';
    protected $primaryKey = 'id_approve';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_produk', 'nama_pemesan', 'alamat_pemesanan', 'jumlah_pesanan', 'total_harga', 'status', 'id_kurir', 'approved_by', 'ordered_by'];

    // public function getOrder($url_order = false)
    // {
    //     $this->select('approve_items.*, produk_items.nama_produk, kurir.fullname as nama_kurir, approved.fullname as nama_approve, orderby.fullname as nama_pengorder',)
    //         ->join('produk_items', 'produk_items.id_produk = approve_items.id_produk')
    //         ->join('users as orderby', 'orderby.id = approve_items.ordered_by', 'left')
    //         ->join('users as kurir', 'kurir.id = approve_items.id_kurir', 'left')
    //         ->join('users as approved', 'approved.id = approve_items.approved_by', 'left');

    //     if ($url_order === false) {
    //         return $this->findAll();
    //     }

    //     $namapemesan = str_replace('-', ' ', $url_order);
    //     $pesanan = $this->where(['approve_items.nama_pemesan' => $namapemesan])->first();

    //     if (!$pesanan) {
    //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan nama $namapemesan tidak ditemukan.");
    //     }

    //     return $pesanan;
    // }

    public function getOrder($url_order = false)
    {
        $userId = user_id();
        $query = $this->select('approve_items.*, produk_items.nama_produk, kurir.fullname as nama_kurir, approved.fullname as nama_approve, orderby.fullname as nama_pengorder',)
            ->join('produk_items', 'produk_items.id_produk = approve_items.id_produk')
            ->join('users as orderby', 'orderby.id = approve_items.ordered_by', 'left')
            ->join('users as kurir', 'kurir.id = approve_items.id_kurir', 'left')
            ->join('users as approved', 'approved.id = approve_items.approved_by', 'left')
            ->orderBy('approve_items.status', 'DESC')
            ->orderBy('approve_items.created_at', 'DESC');

        if (in_groups(['Owner', 'Staff Admin'])) {
        } else {
            $query->where('approve_items.ordered_by', $userId);
        }


        if ($url_order) {

            $namapemesan = str_replace('-', ' ', $url_order);
            $pesanan = $query->where(['approve_items.nama_pemesan' => $namapemesan])->first();

            if (!$pesanan) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan Nama Pemesan $url_order tidak ditemukan.");
            }
            return $pesanan;
        }
        return $query->get()->getResultArray();
    }
}
