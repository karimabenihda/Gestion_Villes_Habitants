<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
use HasFactory;

protected $fillable=['id','ville','nombreHabitant'];

protected static function boot()
{
    parent::boot();

    static::creating(function ($ville) {
        if ($ville->nombreHabitant === null) {
            $ville->nombreHabitant = 0;
        }
    });
}

public function Habitants(){
    return $this->hasMany(Habitant::class);
}
}
