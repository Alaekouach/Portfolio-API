<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }


    protected $fillable = ["photo_projet","projet_id"];
}
