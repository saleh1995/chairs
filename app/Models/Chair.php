<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'chair_category_id',
        'place_id',
    ];


    //relations

    public function category(){
        return $this->belongsTo(ChairCategory::class);
    }

    public function place(){
        return $this->belongsTo(Place::class);
    }
}
