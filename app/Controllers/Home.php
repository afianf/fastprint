<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $db      = \Config\Database::connect();
        $data = $db->table('Produk')->where('status_id', '1')->get()->getResult();
        return view('home', ['products' => $data]);
    }
    public function search()
    {
        $q = $this->request->getGet('q');
        $db      = \Config\Database::connect();
        $data = $db->table('Produk')->where('status_id', '1')->like('nama_produk', $q)->get()->getResult();
        return view('search', ['products' => $data, 'q' => $q]);
    }
}
