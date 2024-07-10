<?php

namespace App\Controllers;

use App\Models\koneksiModel;

class koneksi extends BaseController
{
    protected $koneksiModel;
    public function __construct()
    {
        $this->koneksiModel = new koneksiModel();
    }
    public function index()
    {
        $connection = $this-> koneksiModel -> findAll();
        $data = [
            'title' => 'Koneksi',
            'connection' => $connection
        ];


        return view('index', $data);
    }
}
