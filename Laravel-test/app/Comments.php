<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'content', 'date', 'post_id' ];
}
