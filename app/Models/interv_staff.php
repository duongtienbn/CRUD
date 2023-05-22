<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class first_interv_staff extends Model
{
    use HasFactory;
    protected $table = 'interv_staffs';

    protected $fillable = 'name';

}
