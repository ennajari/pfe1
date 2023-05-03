<?php

namespace App\Http\Controllers;

use App\Models\Desponibilite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmploiController extends Controller
{
    public function assignEmploi(){

        $user = Auth::user();
        $desponibilities = DB::table('desponibilites')->where('prof_id', $user->id)->get();
        $professeur = DB::table('professeurs')->where('prof_id', $user->id)->get();

        return view('admin.assignEmploi', compact(['desponibilities', 'professeur', 'user']));
    }

    public function updateClasse(Request $request){
        // $request->validate(['classe'=>'required|numeric|exists:professeurs,id']);

        $classeId = $request->input('classe');
        $dispoId = $request->input('dispo');

        $dispo = Desponibilite::find($dispoId);

        $dispo->professeur_id = $classeId;

        $dispo->update();

        return redirect()->back()->with('success', 'Desponibilite has been updated with successful');

    }

    public function emploiGenerate()
    {
        $user = Auth::user();

        $desponibilites = DB::select('SELECT d.*, p.*
                        FROM desponibilites d JOIN professeurs p
                            ON d.professeur_id = p.id
                            where d.prof_id = '.$user->id.'
                           ');


        return view('admin.test', compact('desponibilites'));
    }
}















