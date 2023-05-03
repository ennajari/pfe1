<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desponibilite extends Model
{
    use HasFactory;

    protected $table = 'desponibilites';

    protected $fillable = [
        'prof_id',
        'jour',
        't8_10',
        't10_12',
        't14_16',
        't16_18',
    ];
    protected $fillable1 = ['heure_debut', 'heure_fin', 'jour', 'type_cours', 'salle_id', 'professeur_id'];
    // Définir la relation entre les disponibilités et les professeurs



    public function professeur()
    {
        return $this->belongsTo('App\Models\Professeur');
    }

    public function salle()
    {
        return $this->belongsTo('App\Models\Salle');
    }

}
