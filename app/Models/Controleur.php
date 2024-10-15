<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Controleur extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'email', 'password', 'mission', 'sexe'];
}
