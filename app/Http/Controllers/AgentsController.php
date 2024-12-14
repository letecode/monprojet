<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentsController extends Controller
{
    public function index() {
        $agents = Agent::all();
        $departments = Department::all();
        return view('pages.agents.index', compact('agents', 'departments'));
    }

    /**
     * Formulaire de creation
     */
    public function create() {
        $departments = Department::all();
        return view('pages.agents.create', compact('departments'));
    }

    /**
     * Enregistrement
     */
    public function store(Request $request) {
        // validation !
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'unique:agents,email'],
            'phone' => ['required', 'max:15'],
            'birth_date' => ['required', 'date'],
            'department_id' => ['required', 'numeric']
        ])->validate();

        // enregistrer
        // $agent = new Agent();
        // $agent->name = $request->name;
        // $agent->email = $request->email;
        // $agent->phone = $request->phone;
        // $agent->birth_date = $request->birth_date;
        // $agent->department_id = $request->department_id;
        // $agent->save();

        Agent::create($request->except('_token'));

        return redirect()->route('agents.liste')->with('success', 'Agent ajouté avec success');
    }


    public function edit(Request $request, Agent $agent) {
        $departments = Department::all();
        return view('pages.agents.edit', compact('agent', 'departments'));
    }

    public function update(Request $request, Agent $agent) {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'unique:agents,email,'.$agent->id],
            'phone' => ['required', 'max:15'],
            'birth_date' => ['required', 'date'],
            'department_id' => ['required', 'numeric']
        ])->validate();

        $agent->update($request->except('_token', '_method'));

        return redirect()->route('agents.liste')->with('success', 'Agent modifié avec success');
    }

    public function destroy(Request $request, Agent $agent) {
        if($agent && $agent->id != null) {
            $agent->delete();
        }

        return redirect()->route('agents.liste')->with('success', 'Agent supprimée avec success');
    }

}
