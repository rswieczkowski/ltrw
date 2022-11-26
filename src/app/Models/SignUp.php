<?php

namespace App\Models;

use App\BaseModel;
use Throwable;

class SignUp extends BaseModel
{


    public function __construct(protected UserModel $userModel, protected InvoiceModel $invoiceModel)
    {
        parent::__construct();
    }

    /**
     * @throws Throwable
     */
    public function register(array $userInfo, array $invoiceInfo): int
    {
        try {
            $this->db->beginTransaction();

            $userId = $this->userModel->create($userInfo['name'], $userInfo['email'], $userInfo['password']);
            $invoiceId = $this->invoiceModel->create($invoiceInfo['amount'], $userId);

            $this->db->commit();
        } catch (Throwable $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            throw $e;
        }
        return $invoiceId;
    }
}