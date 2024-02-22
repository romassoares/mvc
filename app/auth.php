<?php

namespace App;

session_start();

class Auth
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    public static function isAuthenticated($user)
    {

        $_SESSION['user'] = $user;

        $_SESSION['logged'] = true;

        return $_SESSION['logged'];
    }

    public function login()
    {
        $data['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {

            $data['cpf'] = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);

            $sql = 'SELECT * FROM table_name WHERE email=:email AND cpf=:cpf LIMIT 1';

            $response = $this->db->conection()->prepare($sql);
            $response->bindParam(':email', $data['email']);
            $response->bindParam(':cpf', $data['cpf']);

            if ($response->execute()) {

                $user = $response->fetchObject();
                if ($user) {

                    $this->isAuthenticated($user);

                    header('location: /dashboard');
                } else {
                    echo 'Nenhum usuário encontrado';
                }
            } else {
                echo 'Erro ao buscar usuário';
            }
        } else {
            echo "Endereço de e-mail inválido";
        }
    }

    public function logout()
    {
        if (isset($_SESSION['logged'])) {
            unset($_SESSION['logged']);
            session_destroy();
            // var_dump($_SESSION['logged']);
            // die();

            header("location: /login");
        } else {
            echo "error ao fazer o logout";
        }
    }
}
