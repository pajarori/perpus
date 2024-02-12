<?php

class User extends BaseCore
{

    private $db, $isLoggedIn = false;

    public function __construct($user = null)
    {
        $this->db = Database::getInstance();

        if (!$user) {
            if (Session::exists('user')) {
                $user = Session::get('user');

                if ($this->find($user)) {
                    $this->isLoggedIn = true;
                }
            }
        } else {
            $this->find($user);
        }
    }

    public function all()
    {
        $data = $this->db->query("SELECT * FROM users");

        if ($data->count()) {
            $this->data = $data->result();
            return true;
        }
        return false;
    }

    public function create($fields = [])
    {
        if (!$this->db->insert('users', $fields)) {
            throw new Exception('Ada masalah saat membuat akun.');
        }
    }

    public function update($fields = [], $id = null)
    {
        if (!$id && $this->isLoggedIn) {
            $id = $this->data()->id;
        }

        if (!$this->db->update('users', $id, $fields)) {
            throw new Exception('Ada masalah ketika memperbarui akun.');
        }
    }

    public function find($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->db->query("SELECT * FROM users WHERE $field = ?", [$user]);

            if ($data->count()) {
                $this->data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function login($username = null, $password = null)
    {
        $user = $this->find($username);

        if ($user) {
            if (password_verify($password, $this->data()->password)) {
                Session::put('user', $this->data()->id);
                Session::put('level', $this->data()->level);
                Session::put('nama', $this->data()->nama);
                $this->isLoggedIn = true;
                return true;
            }
        }
        return false;
    }

    public function getLevel($level)
    {
        if ($level == 1) {
            return 'administrator';
        } else if ($level == 3) {
            return 'petugas';
        }
        return 'peminjam';
    }

    public function register($username, $password, $nama, $level = 'peminjam')
    {
        if (!$username || !$password || !$nama) {
            return "Lengkapi form pendaftaran.";
        }

        if ($this->find($username)) {
            return "Username sudah terdaftar.";
        }

        $this->create([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nama' => $nama,
            'level' => $this->getLevel($level)
        ]);

        return "Pendaftaran berhasil.";
    }

    public function edit($field, $id)
    {
        if (!$id && $this->isLoggedIn) {
            $id = $this->data()->id;
        }

        if ($field["password"] != "") {
            $field["password"] = password_hash($field["password"], PASSWORD_DEFAULT);
        } else {
            $field["password"] = $this->data()->password;
        }

        if (!$this->db->update('users', $id, [
            'password' => $field["password"],
            'nama' => $field["nama"],
            'level' => $this->getLevel($field["level"])
        ])) {
            return "Ada masalah saat mengubah data.";
        }

        return "Data berhasil diubah.";
    }

    public function delete($id = null)
    {
        if (!$id && $this->isLoggedIn) {
            $id = $this->data()->id;
        }

        if (!$this->db->delete('users', $id)) {
            return false;
        }
    }

    public function isLoggedIn()
    {
        return $this->isLoggedIn;
    }

    public function logout()
    {
        $this->isLoggedIn = false;

        Session::delete('user');
    }
}
