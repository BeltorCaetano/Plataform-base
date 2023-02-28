<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lojaModel extends Model
{
    use HasFactory;
    protected $table = 'lojas';
    protected $fillable = ['name'];
}
