<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Voiture;

class Micanician extends Model
{
    use HasFactory;

    protected $fillable= ['name'];

    public function voiture(Type $var = null)
    {
        return $this->hasOne(Voiture::class);
    }

    public function vpropritaire(Type $var = null)
    {
        return $this->hasOneTrough(Vpropritaire::class,Voiture::class);
    }
}
