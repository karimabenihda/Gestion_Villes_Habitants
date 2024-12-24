<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitant extends Model
{
    use HasFactory;
protected $fillable=['id' , 'cin' , 'nom' ,'prenom' , 'photo'];
public function Ville(){
    return $this->belongsTo(Ville::class);
}

}
