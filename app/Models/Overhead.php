<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Overhead extends Model
{
    use SoftDeletes;
	
	protected $table = 'overheads';
	protected $fillable = [
	    'overhead_code', 'from_name', 'order_id'
    ];
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

	public function order(){
	    return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
