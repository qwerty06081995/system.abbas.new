<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
    protected $fillable = [
        'code', 'author', 'plan', 'zone', 'mass', 'price', 'pure_price',
        'company_name', 'from_city', 'to_city', 'description', 'status',
        'creation_date'
    ];
    public $timestamps = false;

//    public function description(){
//        return $this->hasMany('App\Model\Description', 'description', 'id');
//    }
}
