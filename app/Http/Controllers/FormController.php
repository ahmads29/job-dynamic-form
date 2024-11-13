<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormField;
use App\Models\JobApplication;

class FormController extends Controller
{
    public function index()
    {
        $fields = FormField::all();
        return view('form', compact('fields'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(array_reduce(FormField::all()->toArray(), function($rules, $field) {
            $rules[$field['label']] = $field['is_required'] ? 'required' : 'nullable';
            return $rules;
        }, []));

        JobApplication::create(['responses' => json_encode($data)]);

        return redirect('/')->with('success', 'Application submitted successfully!');
    }
}
