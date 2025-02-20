<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Izinkan mass assignment pada kolom name dan description
    protected $fillable = ["name", "description"];
}
