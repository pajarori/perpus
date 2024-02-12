<?php

class Buku extends BaseCore
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all()
    {
        $data = $this->db->query("SELECT * FROM buku");
        if ($data->count()) {
            $this->data = $data->result();
            return true;
        }
        return false;
    }

    public function find($field, $value, $search = false)
    {
        if ($search) {
            $data = $this->db->query("SELECT * FROM buku WHERE $field LIKE '%?%'", [$value]);
        } else {
            $data = $this->db->query("SELECT * FROM buku WHERE $field = ?", [$value]);
        }

        if ($data->count()) {
            $this->data = $data->result();
            return true;
        }

        return false;
    }

    public function create($fields = [])
    {
        if (!$this->db->insert('buku', $fields)) {
            throw new Exception('Ada masalah saat menambahkan buku.');
        }
    }

    public function update($fields = [], $id = null)
    {
        if (!$id) {
            $id = $this->data()->id;
        }

        if (!$this->db->update('buku', $id, $fields)) {
            throw new Exception('Ada masalah ketika memperbarui buku.');
        }
    }

    public function delete($id = null)
    {
        if (!$id) {
            $id = $this->data()->id;
        }

        if (!$this->db->delete('buku', $id)) {
            return false;
        }

        return true;
    }

    public function editBuku($fields, $id, $gambar = [])
    {
        if ($this->find('judul', $fields['judul']) && $this->first()->id != $id) {
            return "Judul sudah ada.";
        }

        if ($this->find('isbn', $fields['isbn']) && $this->first()->id != $id) {
            return "ISBN sudah ada.";
        }

        if (strlen($fields['tahun_terbit']) != 4) {
            return "Tahun terbit harus 4 digit.";
        }

        $filegambar = $this->first()->gambar;
        if ($gambar && $_FILES['gambar']['error'] == 0) {
            $filegambar = uploadGambar($gambar, realpath(dirname(__FILE__, 4)) . '/assets/img/cover/');
        }

        $this->update([
            'judul' => $fields['judul'],
            'gambar' => $filegambar,
            'deskripsi' => $fields['deskripsi'],
            'pengarang' => $fields['pengarang'],
            'penerbit' => $fields['penerbit'],
            'tahun_terbit' => $fields['tahun_terbit'],
            'isbn' => $fields['isbn'],
            'jumlah_buku' => $fields['jumlah_buku'],
            'lokasi' => $fields['lokasi']
        ], $id);

        return "Berhasil memperbarui buku.";
    }

    public function tambahBuku($fields = [], $gambar = [])
    {
        if ($this->find('judul', $fields['judul'])) {
            return "Judul sudah ada.";
        }

        if ($this->find('isbn', $fields['isbn'])) {
            return "ISBN sudah ada.";
        }

        if (strlen($fields['tahun_terbit']) != 4) {
            return "Tahun terbit harus 4 digit.";
        }

        $filegambar = 'no-image.jpg';
        if ($gambar) {
            $filegambar = uploadGambar($gambar,  realpath(dirname(__FILE__, 4)) . '/assets/img/cover/');
        }

        $this->create([
            'judul' => $fields['judul'],
            'gambar' => $filegambar,
            'deskripsi' => $fields['deskripsi'],
            'pengarang' => $fields['pengarang'],
            'penerbit' => $fields['penerbit'],
            'tahun_terbit' => $fields['tahun_terbit'],
            'isbn' => $fields['isbn'],
            'jumlah_buku' => $fields['jumlah_buku'],
            'lokasi' => $fields['lokasi']
        ]);

        return "Berhasil menambahkan buku.";
    }

    public function error()
    {
        return $this->db->error();
    }
}
