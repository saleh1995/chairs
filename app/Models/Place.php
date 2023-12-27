<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Place extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'seat_plan',
        'row_count',
        'column_count',
        'image'
    ];
    
    public $translatedAttributes = ['name'];


    //relations
    public function chairs(){
        return $this->hasMany(Chair::class);
    }
}
