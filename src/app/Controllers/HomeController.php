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
            $dsn = $_ENV['DB_DRIVER'] . ':host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
            $db = new PDO(
                $dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']
            );


            try {
                $db->beginTransaction();
                $name = $_GET['name'];
                $email = $_GET['email'];
                $password = password_hash($_GET['password'], PASSWORD_DEFAULT);
                $amount = $_GET['amount'];
                $userQuery = 'INSERT INTO users (name, email, password) VALUES(:name, :email, :password)';
                $invoiceQuery = 'INSERT INTO invoices (amount, user_id) VALUES(:amount , :user_id)';
                $userStmt = $db->prepare($userQuery);
                $userStmt->bindValue(':name', $name);
                $userStmt->bindValue(':email', $email);
                $userStmt->bindValue(':password', $password);
                $userStmt->execute();
                $user_id = $db->lastInsertId();
                $invoiceStmt = $db->prepare($invoiceQuery);
                $invoiceStmt->bindValue(':amount', $amount);
                $invoiceStmt->bindValue(':user_id', $user_id);
                $invoiceStmt->execute();
                $db->commit();
            } catch (\Throwable $e) {
                if ($db->inTransaction()) {
                    $db->rollBack();
                }
            }


            foreach (
                $db->query('SELECT * FROM users u LEFT JOIN invoices i ON u.id = i.user_id')->fetchAll(
                    PDO::FETCH_ASSOC
                ) as $user
            ) {
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }


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