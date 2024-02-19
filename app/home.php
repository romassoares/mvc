<?php

namespace App;

use App\DB;
use PDO;

class Home
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    public function index()
    {
        $response = $this->db->conection()->prepare('SELECT * FROM table_name ORDER BY id');
        $response->execute();
        $users = $response->fetchAll(PDO::FETCH_ASSOC);
        require 'resources/home.php';
    }

    public function search()
    {
        $data = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $response = $this->db->conection()->prepare('SELECT * FROM table_name WHERE name LIKE :name');
        $response->execute([':name' => '%' . $data . '%']);

        $users = $response->fetchAll(PDO::FETCH_ASSOC);

        require 'resources/home.php';
        exit();
    }

    public function store()
    {
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $response = $this->db->conection()->prepare('INSERT INTO table_name (name, email, cpf)
        VALUES (:name, :email, :cpf)');
        $response->bindParam(':name', $data['name']);
        $response->bindParam(':email',  $data['email']);
        $response->bindParam(':cpf', $data['cpf']);
        $response->execute();

        $this->index();
        exit();
    }

    public function edit(int $id)
    {
        if ($id) {
            $response = $this->db->conection()->prepare('SELECT * FROM table_name WHERE id = :id');
            $response->bindValue(':id', $id);
            $response->execute();
            $user = $response->fetchObject();
            require 'resources/form.php';
            exit;
        } else {
            $this->index();
            exit;
        }
    }

    public function update()
    {
        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        $response = $this->db->conection()->prepare('update table_name SET name = :name, email=:email, cpf=:cpf where id = :id');
        $response->bindParam(':name', $data['name']);
        $response->bindParam(':email',  $data['email']);
        $response->bindParam(':cpf', $data['cpf']);
        $response->bindParam(':id', $data['id']);

        $response->execute();

        $this->index();
        exit();
    }

    public function remove($id)
    {
        if ($id) {
            $response = $this->db->conection()->prepare('DELETE FROM table_name WHERE id = :id');
            $response->bindValue(':id', $id);
            $response->execute();

            $this->index();
            exit;
        } else {
            header('location: /');
            exit;
        }
    }
}
