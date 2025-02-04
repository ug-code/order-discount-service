<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * 
 * @property int $id
 * @property string|null $name
 * @property Carbon|null $since
 * @property float|null $revenue
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Customer extends Model
{
	use SoftDeletes;
	protected $table = 'customers';

	protected $casts = [
		'revenue' => 'float'
	];

	protected $dates = [
		'since'
	];

	protected $fillable = [
		'name',
		'since',
		'revenue'
	];
}
