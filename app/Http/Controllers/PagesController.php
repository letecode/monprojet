<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index() {
        $students = "Aliance et Paul";
        return view('monsite', ['students' => $students]);
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
