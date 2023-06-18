<?php
// app/Http/Controllers/PropertyController.php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyListController extends Controller
{
    public function index()
    {
        $properties = Property::where('user_id', auth()->id())->get();
        // dd($properties);  // Add this line for debugging
        return view('property-list', compact('properties'));
    }

    public function create()
    {
        return view('property-create');
    }

    public function store(Request $request)
    {
        // validation
        $request->validate([
            'description' => 'required|max:40',
            'longDescription' => 'required|max:255',
            'property_type' => 'required|integer',
            'rentsale' => 'required|numeric|min:1|max:2', //měl by být spíše boolean, ale uvědomil jsem si příliš pozdě
            'size' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'street' => 'required|max:255',
            'city' => 'required|max:255',
        ]);

        // store data
        $property = new Property($request->all());
        $property->user_id = auth()->id();
        $property->save();

        return redirect()->route('property.index');
    }

    public function edit(Property $property)
    {
        return view('property-edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        // validation
        $request->validate([
            'description' => 'required|max:40',
            'longDescription' => 'required|max:255',
            'property_type' => 'required|integer',
            'rentsale' => 'required|numeric|min:1|max:2', //měl by být spíše boolean, ale uvědomil jsem si příliš pozdě
            'size' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'street' => 'required|max:255',
            'city' => 'required|max:255',
        ]);

        // update data
        $property->fill($request->all());
        $property->save();

        return redirect()->route('property.index');
    }

    // Delete images on Cascade so I don't need to care about it on a application level
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('property.index');
    }
}
