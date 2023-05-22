<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apply_department extends Model
{
    use HasFactory;

    protected $table = 'apply_departments';

    protected $fillable = ['departments'];


}
