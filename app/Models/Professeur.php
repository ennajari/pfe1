<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;
    protected $table = 'professeurs';
    protected $fillable = ['prof_id','specialite', 'fillier', 'semestre', 'module'];


    // Définir la relation entre les professeurs et les disponibilités
    public function disponibilites()
    {
        return $this->hasMany('App\Models\Desponibilite');
    }
}
