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
 * Class OrderItem
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $product_id
 * @property int|null $quantity
 * @property int|null $unit_price
 * @property int|null $total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class OrderItem extends Model
{
    use SoftDeletes;

    protected $table = 'order_items';

    protected $casts
        = [
            'order_id'   => 'int',
            'product_id' => 'int',
            'quantity'   => 'int',
            'unit_price' => 'int',
            'total'      => 'int',

        ];

    protected $fillable
        = [
            'order_id',
            'product_id',
            'quantity',
            'unit_price',
            'total'
        ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }
}
