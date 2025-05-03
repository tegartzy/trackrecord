<?php

class HomeModel {
    private static string $file = __DIR__ . '/../../data.json';

    public static function getAll(): array
    {
        if (!file_exists(self::$file)) return [];
        return json_decode(file_get_contents(self::$file), true) ?? [];
    }

    public static function tambah(string $judul, string $keterangan): void
    {
        $data = self::getAll();
        $data[] = ['judul' => $judul, 'keterangan' => $keterangan];
        file_put_contents(self::$file, json_encode($data, JSON_PRETTY_PRINT));
    }
}
