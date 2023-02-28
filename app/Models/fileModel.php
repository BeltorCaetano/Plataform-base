<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fileModel extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $fillable = ['file_path'];
}
