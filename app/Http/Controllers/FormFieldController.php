<?php

namespace App\Http\Controllers;

use App\Models\FormField;
use Illuminate\Http\Request;

class FormFieldController extends Controller
{
    public function index()
    {
        $fields = FormField::all();
        return view('admin.form_fields.index', compact('fields'));
    }

    public function create()
    {
        return view('admin.form_fields.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string',
            'type' => 'required|string',
            'is_required' => 'boolean',
        ]);

        FormField::create($request->all());
        return redirect()->route('form-fields.index')->with('success', 'Form field created successfully.');
    }

    public function edit(FormField $formField)
    {
        return view('admin.form_fields.edit', compact('formField'));
    }

    public function update(Request $request, FormField $formField)
    {
        $request->validate([
            'label' => 'required|string',
            'type' => 'required|string',
            'is_required' => 'boolean',
        ]);

        $formField->update($request->all());
        return redirect()->route('form-fields.index')->with('success', 'Form field updated successfully.');
    }

    public function destroy(FormField $formField)
    {
        $formField->delete();
        return redirect()->route('form-fields.index')->with('success', 'Form field deleted successfully.');
    }
}
