<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classify extends Model
{
    protected $table = 'classify';
    protected $fillable = ['name','type'];
    public $timestamps = false;
}
