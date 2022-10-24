<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use PDO;
use PDOException;

class HomeController
{

    public function index(): View
    {
        try {
            $dsn = 'mysql:host=ltrw-db;dbname=my_db';
            $db = new PDO(
                $dsn, 'root', 'root'
            );

            $name = $_GET['name'];
            $email = $_GET['email'];
            $password = password_hash($_GET['password'], PASSWORD_DEFAULT);


            $query = 'INSERT INTO users (name, email, password) VALUES(:name, :email, :password)';


            $stmt = $db->prepare($query);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->execute();


            foreach ($db->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC) as $user) {
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }

        echo '<pre>';
        var_dump($db);
        echo '</pre>';

        return View::make('index', $_GET);
    }

    public function download()
    {
        header('Content-type: application/txt');
        header('Content-Disposition: attachment;filename="file.txt"');

        readfile(STORAGE_PATH . 'test.txt');
    }

    public function upload(): void
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];

        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        header('Location: /');
        exit;
    }

}