<?php

namespace App\Http\Controllers;

use App\Models\Desponibilite;
use App\Models\Professeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class DesponibiliteController extends Controller
{
    //
    public function store(Request $request)
{
    $prof_id = Auth::user()->id;

    // Liste des jours à enregistrer dans la base de données
    $jours = ['Lundi', 'Mardi','Mercredi', 'Jeudi','Vendredi', 'Samudi'];

    foreach ($jours as $jour) {
        // On récupère ou crée un enregistrement de disponibilité pour ce jour
        $disponibilites = Desponibilite::updateOrCreate([
            'prof_id' => $prof_id,
            'jour' => $jour,
        ]);

        // On vérifie si chaque plage horaire est cochée ou non
        $disponibilites->t8_10 = in_array('8-10', $request->input($jour, [])) ? 1 : 0;
        $disponibilites->t10_12 = in_array('10-12', $request->input($jour, [])) ? 1 : 0;
        $disponibilites->t14_16 = in_array('14-16', $request->input($jour, [])) ? 1 : 0;
        $disponibilites->t16_18 = in_array('16-18', $request->input($jour, [])) ? 1 : 0;

        // On enregistre les disponibilités
        $disponibilites->save();
    }

    return redirect()->back()->with('success', 'Les disponibilités ont été enregistrées avec succès.');
}

    public function edit (int $id)
    {
        $prof = Professeur::findOrFail($id); // find or fail is find + 404 error if the row doesn't found
        $dispo = Desponibilite::where('prof_id', $prof->prof_id)->get();


        return view('admin.disponibilite.edit', compact('prof', 'dispo'));
    }

    public function update(Request $request)
    {
        dd('ard nannay');
        // Récupère la disponibilité à modifier
        $disponibilites = Desponibilite::findOrFail($id);

        // On vérifie si chaque plage horaire est cochée ou non
        $disponibilites->t8_10 = in_array('8-10', $request->input($disponibilites->jour, [])) ? 1 : 0;
        $disponibilites->t10_12 = in_array('10-12', $request->input($disponibilites->jour, [])) ? 1 : 0;
        $disponibilites->t14_16 = in_array('14-16', $request->input($disponibilites->jour, [])) ? 1 : 0;
        $disponibilites->t16_18 = in_array('16-18', $request->input($disponibilites->jour, [])) ? 1 : 0;

        // On enregistre les disponibilités
        $disponibilites->save();

        return redirect()->back()->with('success', 'La disponibilité a été modifiée avec succès.');
    }



}















