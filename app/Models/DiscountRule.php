<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DiscountRule
 *
 * @property string|null $type
 * @property float|null $min_price
 * @property int|null $category
 * @property string|null $rule
 * @property int|null $product_count
 * @property int|null $rate
 * @property string|null $description
 *
 * @package App\Models
 */
class DiscountRule extends Model
{
    protected $table        = 'discount_rules';
    protected $primaryKey   = 'type';
    public    $incrementing = false;
    public    $timestamps   = false;

    protected $casts
        = [
            'min_price'     => 'float',
            'category'      => 'int',
            'product_count' => 'int',
            'rate'          => 'int'
        ];

    protected $fillable
        = [
            'type',
            'min_price',
            'category',
            'rule',
            'product_count',
            'rate',
            'description'
        ];
}
