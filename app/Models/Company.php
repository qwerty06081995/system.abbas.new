<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'company_name', 'code', 'bin', 'iin'
    ];
    public $timestamps = false;
}