<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    public function technologies()
    {
        return $this->hasMany(Technologie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }



    protected $fillable = ["intitule_projet","description_projet","client","duree_realisation","annee_de_realisation","user_id"];
}
