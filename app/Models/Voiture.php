<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Vpropritaire;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable =['model','micanician_id'];

    public function vpropritaire()
    {
        return $this->hasOne(Vpropritaire::class);
    }
}
