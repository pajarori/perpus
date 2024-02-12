<?php

class Pinjam extends BaseCore
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all()
    {
        $data = $this->db->query("SELECT * FROM pinjaman INNER JOIN buku ON pinjaman.id_buku = buku.id INNER JOIN users ON pinjaman.id_user = users.id");
        if ($data->count()) {
            $this->data = $data->result();
            return true;
        }
        return false;
    }

    public function find($bukuid, $status = null)
    {
        if ($status) {
            $data = $this->db->query("SELECT * FROM pinjaman WHERE id_buku = ? AND status = ?", [$bukuid, $status]);
        } else {
            $data = $this->db->query("SELECT * FROM pinjaman WHERE bukuid = ?", [$bukuid]);
        }

        if ($data->count()) {
            $this->data = $data->result();
            return true;
        }

        return false;
    }

    public function ismybook($bukuid)
    {
        $data = $this->db->query("SELECT * FROM pinjaman WHERE id_buku = ? AND id_user = ? AND status = ?", [$bukuid, Session::get('user'), 'dipinjam']);

        if ($data->count()) {
            $this->data = $data->first();
            return true;
        }

        return false;
    }

    public function create($fields = [])
    {
        if (!$this->db->insert('pinjaman', $fields)) {
            throw new Exception('Ada masalah saat meminjam buku.');
        }
    }

    public function update($fields = [], $id = null)
    {
        if (!$id) {
            $id = $this->data()->id;
        }

        if (!$this->db->update('pinjaman', $id, $fields)) {
            throw new Exception('Ada masalah ketika memperbarui status peminjaman.');
        }

        return true;
    }

    public function delete($id = null)
    {
        if (!$id) {
            $id = $this->data()->id;
        }

        if (!$this->db->delete('pinjaman', $id)) {
            throw new Exception('Ada masalah saat mengembalikan buku.');
        }

        return true;
    }

    public function pinjam($bukuid)
    {
        $fields = [
            'id_buku' => $bukuid,
            'id_user' => Session::get('user'),
            'tanggal_pinjam' => date('Y-m-d H:i:s'),
            'tanggal_kembali' => null,
            'status' => 'dipinjam'
        ];

        $this->create($fields);
    }

    public function kembali($id)
    {
        $fields = [
            'tanggal_kembali' => date('Y-m-d H:i:s'),
            'status' => 'dikembalikan'
        ];

        return $this->update($fields, $id);
    }

    public function deleteBuku($bukuid)
    {
        $data = $this->db->query("DELETE FROM pinjaman WHERE id_buku = ?", [$bukuid]);
    }
}
