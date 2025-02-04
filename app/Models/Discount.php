<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Discount
 * 
 * @property int $id
 * @property int $order_id
 * @property int $sub_total
 * @property string $discount_reason
 * @property string $discount_amount
 *
 * @package App\Models
 */
class Discount extends Model
{
	protected $table = 'discounts';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'sub_total' => 'int'
	];

	protected $fillable = [
		'order_id',
		'sub_total',
		'discount_reason',
		'discount_amount'
	];
}
