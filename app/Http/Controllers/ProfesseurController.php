<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professeur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfesseurController extends Controller
{
    public function store(Request $request)
    {
        $professeur = new Professeur();
        $professeur->specialite = $request->input('specialite');
        $professeur->fillier = $request->input('fillier');
        $professeur->semestre = $request->input('semestre');
        $professeur->module = $request->input('module');
        $professeur->prof_id = Auth::user()->id;
        $professeur->save();
    
        return redirect()->route('prof')->with('success', 'Professeur créé avec succès !');
    }
    

   
    public function deleteRow($id)
    {
        $row = Professeur::find($id);
        $row->delete();
        return redirect()->back()->with('success', 'Row deleted successfully');
    }

    // la function destropy
}

   


