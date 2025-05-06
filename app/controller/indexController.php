<?php

namespace Tegarsatria\trackrecord\FoxMind\controller;

use Tegarsatria\trackrecord\FoxMind\config\Database;
use Tegarsatria\trackrecord\FoxMind\model\indexModel;

require_once __DIR__ . '/../model/indexModel.php';

class indexController
{
    public function index()
    {
        $model = new indexModel();
        $data = $model->getAllNotes();

        include __DIR__ . '/../view/index.php';
    }

    public function formTambah()
    {
        include __DIR__ . '/../view/tambahNote.php';
    }

    public function tambahData(): void
    {
        $judul = $_POST['judul'] ?? '';
        $keterangan = $_POST['keterangan'] ?? '';
        $gambar = null;

        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true); // bikin folder kalau belum ada
            }

            $gambarName = uniqid() . '-' . basename($_FILES['gambar']['name']);
            $uploadPath = $uploadDir . $gambarName;

            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadPath)) {
                $gambar = $gambarName; // simpan nama file doang ke DB
            }
        }

        $model = new indexModel();
        $model->insertNote($judul, $keterangan, $gambar);

        header('Location: /');
    }

    public function keterangan()
    {
        include __DIR__ . '/../view/keterangan.php';
    }
}
