<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    public $timestamps = false;
    use HasFactory;

    public $fillable = ["type"];
}
