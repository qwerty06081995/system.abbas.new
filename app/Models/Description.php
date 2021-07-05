<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable = [
        'text', 'author'
    ];

    public function contract(){
        return $this->belongsTo('App\Model\Contract', 'description', 'id');
    }

}