<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $price
 * @property int|null $category
 * @property int|null $stock
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $casts
        = [
            'id'         => 'int',
            'price'      => 'float',
            'category'   => 'int',
            'stock'      => 'int',
            'created_at' => 'datetime:Y-m-d',
            'updated_at' => 'datetime:Y-m-d',
            'deleted_at' => 'datetime:Y-m-d',
        ];


    protected $fillable
        = [
            'id',
            'name',
            'price',
            'category',
            'stock'
        ];
}
