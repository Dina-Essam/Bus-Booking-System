<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'bus';
    protected $fillable = ['bus_name','description', 'capacity'];

    public function seats()
    {
        return $this->hasMany(Seat::class,'bus_id');
    }

    public function trips()
    {
        return $this->hasMany(Trip::class,'bus_id');
    }

}
