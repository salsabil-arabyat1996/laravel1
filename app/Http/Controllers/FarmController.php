<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmController extends Controller
{
    public function index()
    {
        $farms = Farm::with('images')->get();
        $user = Auth::user();
        return view('farms.index', compact('farms','user'));
    }



    public function create()
    {
        return view('farms.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'price' => 'required|numeric',
            'num_guests' => 'required|integer',
            'num_bedrooms' => 'required|integer',
            'num_beds' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048' // Validate each uploaded image
        ]);

        // Create a new farm instance
        $farm = Farm::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'price' => $request->input('price'),
            'num_guests' => $request->input('num_guests'),
            'num_bedrooms' => $request->input('num_bedrooms'),
            'num_beds' => $request->input('num_beds'),
        ]);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);

                Image::create([
                    'farm_id' => $farm->id,
                    'image' => $imageName,
                ]);
            }
        }
        return redirect()->route('farms.index')->with('success', 'Farm created successfully.');
    }

    public function show(Farm $farm)
{
    $farm->load('images'); // Load the images relationship

    return view('farms.show', compact('farm'));
}

    public function edit(Farm $farm)
    {
        return view('farms.edit', compact('farm'));
    }

    public function update(Request $request, Farm $farm)
    {
        // Validate the input
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'price' => 'required|numeric',
            'num_guests' => 'required|integer',
            'num_bedrooms' => 'required|integer',
            'num_beds' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048' // Validate each uploaded image


        ]);

        // Update the farm instance
        $farm->update($validatedData);

        // Upload and attach images to the farm
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);

                Image::create([
                    'farm_id' => $farm->id,
                    'image' => $imageName,
                ]);
            }
        }

        return redirect()->route('farms.index')->with('success', 'Farm updated successfully.');
    }

    public function destroy(Farm $farm)
    {
        // Delete the farm and its associated images
        $farm->images()->delete();
        $farm->delete();

        return redirect()->route('farms.index')->with('success', 'Farm deleted successfully.');
    }
}
