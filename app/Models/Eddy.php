<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eddy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'sex',
    ];
}
