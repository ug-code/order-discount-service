<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Product;

class MessageService
{
    public static $error
        = [
            '100' => 'Eklenmen istenen müşteri bulunamadı. (100)',
            '101' => 'Beklenmeyen bir hata oluştu. Ürün fiyatını dpğru olduğundan emin olunuz. (101)',
            '102' => 'Beklenmeyen bir hata oluştu (102)',
            '103' => 'Ürün fiyatında manipülasyon işlemi var. (103)',
            '104' => 'İstenilen ürün için stok bulunmamakta (104)',
            '105' => 'Connetion hatası (105)',
            '106' => 'Silinmesi istenen sipariş bulunamadı (106)',
            '107' => 'Geçersiz productId no (107)',
            '108' => 'Sipariş bulunamadı (108)',
        ];


}
