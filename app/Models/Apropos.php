<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apropos extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected $fillable = ["nom","prenom","date_de_naissance","nationalite","statut_de_travail","bio","tel","email","addresse","ville","pays","disponibilite","photo_profil","user_id"];

}
