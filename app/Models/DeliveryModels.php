<?php

namespace App\Models;

use CodeIgniter\Model;

class DeliveryModels extends Model
{
    protected $table      = 'resPengiriman';
    protected $primaryKey = 'id_pengiriman';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_approve', 'no_resi', 'nama_penerima', 'foto_penerima', 'status'];

    // public function getDelivery($url_pemesanan = false)
    // {

    //     $userId = user_id();

    //     $this->select('resPengiriman.no_resi, resPengiriman.status, approve_items.nama_pemesan, 
    //     approve_items.alamat_pemesanan, approve_items.total_harga, kurir.fullname as nama_kurir, orderer.fullname as nama_sales, 
    //     resPengiriman.status')
    //         ->join('approve_items', 'approve_items.id_approve = resPengiriman.id_approve', 'left')
    //         ->join('users as kurir', 'kurir.id = approve_items.id_kurir', 'left')
    //         ->join('users as orderer', 'orderer.id = approve_items.ordered_by', 'left');

    //     if (in_groups(['Owner', 'Staff Admin'])) {

    //         return $this->findAll();
    //     } elseif (in_groups('Sales')) {

    //         return $this->where('approve_items.ordered_by', $userId)->findAll();
    //     } elseif (in_groups('Kurir')) {

    //         return $this->where('approve_items.id_kurir', $userId)->findAll();
    //     }
    //     if ($url_pemesanan === false) {
    //     }

    //     $noresi = $this->where(['resPengiriman.no_resi' => $url_pemesanan])->first();

    //     if (!$noresi) {
    //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan nama $url_pemesanan tidak ditemukan.");
    //     }

    //     return $noresi;
    // }
    // public function getDelivery($url_pemesanan = false)
    // {
    //     $userId = user_id();

    //     // Set up the common query
    //     $this->select('resPengiriman.no_resi, resPengiriman.status, approve_items.nama_pemesan, 
    // approve_items.alamat_pemesanan, approve_items.total_harga, kurir.fullname as nama_kurir, orderer.fullname as nama_sales')
    //         ->join('approve_items', 'approve_items.id_approve = resPengiriman.id_approve', 'left')
    //         ->join('users as kurir', 'kurir.id = approve_items.id_kurir', 'left')
    //         ->join('users as orderer', 'orderer.id = approve_items.ordered_by', 'left');

    //     if (in_groups(['Owner', 'Staff Admin'])) {
    //         // Owners and Staff Admin can see all orders
    //         if ($url_pemesanan) {
    //             $noresi = $this->where(['resPengiriman.no_resi' => $url_pemesanan])->first();
    //             if (!$noresi) {
    //                 throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan nomor resi $url_pemesanan tidak ditemukan.");
    //             }
    //             return $noresi;
    //         }
    //         return $this->findAll(); // If no specific order is requested, return all
    //     } elseif (in_groups('Sales')) {
    //         // Sales can only see their own orders
    //         if ($url_pemesanan) {
    //             $noresi = $this->where(['resPengiriman.no_resi' => $url_pemesanan, 'approve_items.ordered_by' => $userId])->first();
    //             if (!$noresi) {
    //                 throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan nomor resi $url_pemesanan tidak ditemukan.");
    //             }
    //             return $noresi;
    //         }
    //         // If no specific order is requested, return all orders for the sales user
    //         return $this->where('approve_items.ordered_by', $userId)->findAll();
    //     } elseif (in_groups('Kurir')) {
    //         // Kurir can only see orders assigned to them
    //         if ($url_pemesanan) {
    //             $noresi = $this->where(['resPengiriman.no_resi' => $url_pemesanan, 'approve_items.id_kurir' => $userId])->first();
    //             if (!$noresi) {
    //                 throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan nomor resi $url_pemesanan tidak ditemukan.");
    //             }
    //             return $noresi;
    //         }
    //         // If no specific order is requested, return all orders for the kurir user
    //         return $this->where('approve_items.id_kurir', $userId)->findAll();
    //     }
    // }

    // public function getDelivery($url_pemesanan = false)
    // {
    //     $userId = user_id();

    //     // Set up the common query
    //     $this->select('resPengiriman.no_resi, resPengiriman.status, approve_items.nama_pemesan, 
    //     approve_items.alamat_pemesanan, approve_items.total_harga, kurir.fullname as nama_kurir, 
    //     orderer.fullname as nama_sales')
    //         ->join('approve_items', 'approve_items.id_approve = resPengiriman.id_approve', 'left')
    //         ->join('users as kurir', 'kurir.id = approve_items.id_kurir', 'left')
    //         ->join('users as orderer', 'orderer.id = approve_items.ordered_by', 'left');

    //     // Base query for the current user group
    //     $query = $this;

    //     if (in_groups(['Owner', 'Staff Admin'])) {
    //         // Owners and Staff Admin can see all orders
    //     } elseif (in_groups('Sales')) {
    //         // Sales can only see their own orders
    //         $query = $this->where('approve_items.ordered_by', $userId);
    //     } elseif (in_groups('Kurir')) {
    //         // Kurir can only see orders assigned to them
    //         $query = $this->where('approve_items.id_kurir', $userId);
    //     }

    //     // If a specific order is requested
    //     if ($url_pemesanan) {
    //         $noresi = $query->where(['resPengiriman.no_resi' => $url_pemesanan])->first();
    //         if (!$noresi) {
    //             throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan nomor resi $url_pemesanan tidak ditemukan.");
    //         }
    //         return $noresi;
    //     }

    //     // Return all orders based on the user's group
    //     return $query->findAll();
    // }

    // public function getDelivery($url_pemesanan = false)
    // {
    //     $userId = user_id();

    //     if (in_groups(['Owner', 'Staff Admin'])) {
    //         $query = $this->select('resPengiriman.*, approve_items.nama_pemesan, approve_items.alamat_pemesanan, approve_items.total_harga, approve_items.jumlah_pesanan, kurir.fullname as nama_kurir, orderer.fullname as orderby, approved.fullname as approveby')
    //             ->join('approve_items', 'approve_items.id_approve = resPengiriman.id_approve', 'left')
    //             ->join('users as approved', 'approved.id = approve_items.approved_by', 'left')
    //             ->join('users as kurir', 'kurir.id = approve_items.id_kurir', 'left')
    //             ->join('users as orderer', 'orderer.id = approve_items.ordered_by', 'left');

    //         if ($url_pemesanan) {
    //             $noresi = $query->where(['resPengiriman.no_resi' => $url_pemesanan])->first();
    //             if (!$noresi) {
    //                 throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan nomor resi $url_pemesanan tidak ditemukan.");
    //             }
    //             return $noresi;
    //         }

    //         return $query->get()->getResultArray();
    //     } elseif (in_groups('Sales')) {
    //         $query = $this->select('resPengiriman.*, approve_items.nama_pemesan, approve_items.alamat_pemesanan, approve_items.jumlah_pesanan, approve_items.total_harga, kurir.fullname as nama_kurir, approved.fullname as approveby')
    //             ->join('approve_items', 'approve_items.id_approve = resPengiriman.id_approve', 'left')
    //             ->join('users as approved', 'approved.id = approve_items.approved_by', 'left')
    //             ->join('users as kurir', 'kurir.id = approve_items.id_kurir', 'left')
    //             ->where('approve_items.ordered_by', $userId);

    //         if ($url_pemesanan) {
    //             $noresi = $query->where(['resPengiriman.no_resi' => $url_pemesanan])->first();
    //             if (!$noresi) {
    //                 throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan nomor resi $url_pemesanan tidak ditemukan.");
    //             }
    //             return $noresi;
    //         }

    //         return $query->findAll();
    //     } elseif (in_groups('Kurir')) {
    //         $query = $this->select('resPengiriman.*, approve_items.nama_pemesan, approve_items.alamat_pemesanan')
    //             ->join('approve_items', 'approve_items.id_approve = resPengiriman.id_approve', 'left')
    //             ->where('approve_items.id_kurir', $userId);

    //         if ($url_pemesanan) {
    //             $noresi = $query->where(['resPengiriman.no_resi' => $url_pemesanan])->first();
    //             if (!$noresi) {
    //                 throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan nomor resi $url_pemesanan tidak ditemukan.");
    //             }
    //             return $noresi;
    //         }

    //         return $query->findAll();
    //     }
    // }
    // public function getDelivery($url_pemesanan = false)
    // {
    //     $userId = user_id();
    //     if (in_groups(['Owner', 'Staff Admin'])) {
    //         $query = $this->select('resPengiriman.*, approve_items.nama_pemesan, approve_items.alamat_pemesanan, approve_items.total_harga, approve_items.jumlah_pesanan, kurir.fullname as nama_kurir, orderer.fullname as orderby, approved.fullname as approveby, produk.nama_produk')
    //             ->join('approve_items', 'approve_items.id_approve = resPengiriman.id_approve', 'left')
    //             ->join('produk_items as produk', 'produk.id_produk = approve_items.id_produk')
    //             ->join('users as approved', 'approved.id = approve_items.approved_by', 'left')
    //             ->join('users as kurir', 'kurir.id = approve_items.id_kurir', 'left')
    //             ->join('users as orderer', 'orderer.id = approve_items.ordered_by', 'left');

    //         if ($url_pemesanan) {
    //             $noresi = $query->where(['resPengiriman.no_resi' => $url_pemesanan])->first();
    //             if (!$noresi) {
    //                 throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan nomor resi $url_pemesanan tidak ditemukan.");
    //             }
    //             return $noresi;
    //         }

    //         return $query->get()->getResultArray();
    //     } else {
    //         $query = $this->select('resPengiriman.*, approve_items.nama_pemesan, approve_items.alamat_pemesanan, approve_items.jumlah_pesanan, kurir.fullname as nama_kurir, orderer.fullname as orderby, produk.nama_produk')
    //             ->join('approve_items', 'approve_items.id_approve = resPengiriman.id_approve', 'left')
    //             ->join('users as kurir', 'kurir.id = approve_items.id_kurir', 'left')
    //             ->join('produk_items as produk', 'produk.id_produk = approve_items.id_produk')
    //             ->join('users as orderer', 'orderer.id = approve_items.ordered_by', 'left')
    //             ->groupStart()
    //             ->where('approve_items.id_kurir', $userId)
    //             ->orWhere('approve_items.ordered_by', $userId)
    //             ->groupEnd()
    //             ->where('approve_items.id_kurir IS NOT NULL');

    //         if ($url_pemesanan) {
    //             $noresi = $query
    //                 ->where(['resPengiriman.no_resi' => $url_pemesanan])
    //                 ->groupStart()
    //                 ->where('approve_items.id_kurir', $userId)
    //                 ->orWhere('approve_items.ordered_by', $userId)
    //                 ->groupEnd()
    //                 ->first();

    //             if (!$noresi) {
    //                 throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan nomor resi $url_pemesanan tidak ditemukan");
    //             }

    //             return $noresi;
    //         }

    //         return $query->findAll();
    //     }
    // }


    public function getDelivery($url_pemesanan = false)
    {
        $userId = user_id();
        $query = $this->select('resPengiriman.*, approve_items.nama_pemesan, approve_items.alamat_pemesanan, approve_items.jumlah_pesanan, produk.nama_produk, kurir.fullname as nama_kurir, orderer.fullname as orderby')
            ->join('approve_items', 'approve_items.id_approve = resPengiriman.id_approve', 'left')
            ->join('produk_items as produk', 'produk.id_produk = approve_items.id_produk', 'left')
            ->join('users as kurir', 'kurir.id = approve_items.id_kurir', 'left')
            ->join('users as orderer', 'orderer.id = approve_items.ordered_by', 'left');

        if (in_groups(['Owner', 'Staff Admin'])) {
            $query->select('approve_items.total_harga, approved.fullname as approveby')
                ->join('users as approved', 'approved.id = approve_items.approved_by', 'left');
        } else {
            $query->groupStart()
                ->where('approve_items.id_kurir', $userId)
                ->orWhere('approve_items.ordered_by', $userId)
                ->groupEnd()
                ->where('approve_items.id_kurir IS NOT NULL');
        }

        if ($url_pemesanan) {
            $noresi = $query->where(['resPengiriman.no_resi' => $url_pemesanan])->first();
            if (!$noresi) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan nomor resi $url_pemesanan tidak ditemukan.");
            }
            return $noresi;
        }

        return $query->get()->getResultArray();
    }
}
