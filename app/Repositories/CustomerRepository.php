<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    public function find(int $customerId): ?Customer
    {
        return Customer::find($customerId);
    }
}
