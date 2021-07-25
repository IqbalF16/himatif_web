<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'title_route',
        'title',
        'table_title',
        'link',
        'form_in_json',
    ];
}
