<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title2Translation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name'];
}
