<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acide extends Model
{
    use HasFactory;
    protected $table = 'acides';
    protected $fillable = [	'Ref_bac', 'densite' ,'temperature'	,'P2O5' ,'TS' ,'SO4' ,'cd' ,'Mgo','Zn', 'heure', 'saiseur', 'id_produit'];
    protected $primaryKey = 'id_acide';
    protected $keyType = 'string';
    protected $foreignKey = 'id_produit';
}