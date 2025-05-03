<?php
namespace Tegarsatria\trackrecord\FoxMind\controller;

use HomeModel;

require_once __DIR__ . '/../model/HomeModel.php';

class HomeController {
    public function index()
    {
        $data = HomeModel::getAll();
        include __DIR__ . '/../view/index.php';
    }

    public function formTambah()
    {
        include __DIR__ . '/../view/tambah.php';
    }

    public function tambahData()
    {
        $judul = $_POST['judul'] ?? '';
        $keterangan = $_POST['keterangan'] ?? '';

        HomeModel::tambah($judul, $keterangan);
        header('Location: /');
    }
}
