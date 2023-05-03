<?php

namespace App\Http\Controllers;

use App\Models\Desponibilite;
use App\Models\Professeur;
use App\Models\Module;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function prof(Request $request)
    {
        $nom = Professeur::all();

        $semestres = \App\Models\Module::select('semestre')->distinct()->get();
        $fillieres = \App\Models\Module::select('filliere')->distinct()->get();

        $specialite = $request->input('specialite');
        $filliere = $request->input('filliere');
        $semestre = $request->input('semestre');

        $modules = \App\Models\Module::all();

        return view('proffesseur.index', compact('nom', 'modules', 'semestres', 'fillieres'));
    }








    public function admin()
    {
        return view('admin.index');
    }


    public function emploi()
    {
        return view('admin.test');
    }


    public function acceil()
    {
        return view('layouts.acceil');
    }
    public function despo()
    {
        $heure = Desponibilite::all();
        return view('proffesseur.disponibilite', compact('heure'));
    }



}
