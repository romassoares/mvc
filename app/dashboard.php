<?php

namespace App;

use PDO;
use App\DB;

class Dashboard
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    public function index()
    {
        $input_change = filter_input(INPUT_POST, 'input_change', FILTER_SANITIZE_SPECIAL_CHARS);
        $priority = $this->change_priority($input_change);
        $sort = $this->sortArray();

        require "resources/dashboard.php";
    }

    public function sortArray()
    {
        $array = [9, 7, 0, 0, 2, 19];
        sort($array);

        return $array;
    }

    public function change_priority($input)
    {
        $response = $this->db->conection()->prepare('SELECT * FROM table_name ORDER BY id');
        $response->execute();
        $users = $response->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }
}
