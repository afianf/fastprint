<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin');
    }
    public function insert()
    {
        if($this->request->getMethod() != "POST") throw new \Exception('Metode tidak didukung');
        $req = $this->request->getPost();
        $db = \Config\Database::connect();
        try {
            $success = $db->table('Produk')->insert($req);
            if($success) return $this->response->setJSON(['success' => true]);
            else throw new \Exception('Insert Error');
        } catch(Exception $e) {
            throw new \Exception('Server error');
        }
    }
    public function delete()
    {
        if($this->request->getMethod() != "POST") throw new \Exception('Metode tidak didukung');
        $req = $this->request->getPost();
        $db = \Config\Database::connect();
        try {
            $success = $db->table('Produk')->where('id_produk', $req['id_produk'])->delete();
            if($success) return $this->response->setJSON(['success' => true]);
            else throw new \Exception('Delete Error');
        } catch(Exception $e) {
            throw new \Exception('Server error');
        }
    }
    public function update()
    {
        if($this->request->getMethod() != "POST") throw new \Exception('Metode tidak didukung');
        $req = $this->request->getPost();
        $db      = \Config\Database::connect();
        try {
            $newVal = [
                'nama_produk' => $req['nama_produk'],
                'harga' => $req['harga'],
                'status_id' => $req['status_id'],
                'kategori_id' => $req['kategori_id']
            ];
            $success = $db->table('Produk')->where('id_produk', $req['id_produk'])->update($newVal);
            if($success) return $this->response->setJSON(['success' => true]);
            else throw new \Exception('Delete Error');
        } catch(Exception $e) {
            throw new \Exception('Server error');
        }
    }
    public function get_products()
    {
        $db      = \Config\Database::connect();
        $data = $db->table('Produk')->select('*')->join('Kategori', 'Kategori.id_kategori = Produk.kategori_id')->join('Status', 'Status.id_status = Produk.status_id')->get()->getResult();
        return $this->response->setJSON($data);
    }
    public function get_categories()
    {
        $db      = \Config\Database::connect();
        $data = $db->table('Kategori')->get()->getResult();
        return $this->response->setJSON($data);
    }
    public function get_status()
    {
        $db      = \Config\Database::connect();
        $data = $db->table('Status')->get()->getResult();
        return $this->response->setJSON($data);
    }
}
