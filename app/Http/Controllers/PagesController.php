<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{

    public function index() {
        // Eloquent
        $agents = Agent::whereHas('department', function($q){
            $q->where('name', 'informatique');
        })->get();

        return view('monsite', [
            'agents' => $agents,
            ]
        );
    }

    public function contact() {
        $name = request('name');
        $prenom = request('prenom');

        return view('pages.contact', compact('name', 'prenom'));
    }

    public function project($projet){

        return view('projets.letecode', compact('projet'));
    }
}
