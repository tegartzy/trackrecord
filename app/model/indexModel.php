<?php
namespace Tegarsatria\trackrecord\FoxMind\model;

use Tegarsatria\trackrecord\FoxMind\config\Database;


class indexModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function insertNote($judul, $isi, $gambar): void
{
    $stmt = $this->db->prepare("INSERT INTO note (judul, isi, gambar) VALUES (?, ?, ?)");
    $stmt->execute([$judul, $isi, $gambar]);
}
    

    public function getAllNotes() {
        $stmt = $this->db->query("SELECT * FROM note ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }
}
