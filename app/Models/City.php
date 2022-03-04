<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cities';
    protected $fillable = ['city_name_ar','city_name_en'];

    public function stations()
    {
        return $this->hasMany(Station::class,'city_id');
    }
}
