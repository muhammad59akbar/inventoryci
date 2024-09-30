<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModels extends Model
{
    protected $table      = 'produk_items';
    protected $primaryKey = 'id_produk';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_produk', 'deskrip_produk', 'hrg_prdk', 'stock_prdk', 'img_prdk'];

    public function getProduk($url = false)
    {
        if ($url === false) {
            return $this->findAll();
        }
        $nama_produk = str_replace('-', ' ', $url);
        $produk =  $this->where(['nama_produk' =>  $nama_produk])->first();
        if (!$produk) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Produk dengan nama $nama_produk tidak ditemukan.");
        }


        return $produk;
    }
}
