<?php

namespace App\Http\Controllers;

use App\Models\Desponibilite;
use App\Models\Professeur;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $profs = DB::table('professeurs')
            ->join('users', 'professeurs.prof_id', '=', 'users.id')
            ->select('professeurs.id', 'professeurs.prof_id','users.name', 'users.email', 'professeurs.specialite', 'professeurs.module')
            ->distinct('professeurs.prof_id')
            ->get();


        return view('admin.index', compact('profs'));
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
