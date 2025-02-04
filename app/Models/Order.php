<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 *
 * @property int $id
 * @property int|null $customer_id
 * @property float|null $total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $casts
        = [
            'customer_id' => 'int',
            'total'       => 'float',
        ];

    protected $fillable
        = [
            'id',
            'customer_id',
            'total'
        ];


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, "order_id", 'id');
    }
}
