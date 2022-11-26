<?php

declare(strict_types=1);

namespace App\Models;

use App\BaseModel;

class InvoiceModel extends BaseModel
{

    public function create(float $amount, int $user_id): int
    {
        $invoiceQuery = 'INSERT INTO invoices (amount, user_id) VALUES(:amount , :user_id)';


        $invoiceStmt = $this->db->prepare($invoiceQuery);
        $invoiceStmt->bindValue(':amount', $amount);
        $invoiceStmt->bindValue(':user_id', $user_id);
        $invoiceStmt->execute();

        return (int)$this->db->lastInsertId();
    }

    public function find(int $invoiceId): array
    {
        $query = 'SELECT * FROM invoices i LEFT JOIN users u ON u.id = i.user_id WHERE i.id = :id';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':id', $invoiceId);

        $stmt->execute();

        $invoice = $stmt->fetch();

        return  $invoice ?? [];
    }


}