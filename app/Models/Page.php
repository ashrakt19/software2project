<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name' ,'desc', 'meta_keywords' , 'meta_desc'
    ];
}
