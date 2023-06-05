<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Farm;

class RenterController extends Controller
{
    public function index(Request $request)
    {
        // $farms = Farm::paginate(9);
        // return view('RenterDashboard.renter', compact('farms'));
        $Farm = $request->input('name_useres');

        $Farms = Farm::when($Farm, function ($query) use ($Farm) {
            $query->where(function ($query) use ($Farm) {
                $query->where('title', 'like', '%' . $Farm . '%')
                    ->orWhere('address', 'like', '%' . $Farm . '%')
                    ->orWhere('price', 'like', '%' . $Farm . '%');
            });
        })->get();



        $Farm = $Farms; // Assign the filtered farms to $Farm variable

        return view('RenterDashboard.renter', compact('Farm'));
    }
    public function destroy($id)
{
    // Find the farm by ID and delete it
    $farm = Farm::findOrFail($id);
    $farm->delete();

    // Redirect or return a response as needed
    return redirect()->route('RenterDashboard.index')->with('success', 'Farm deleted successfully');
}
    public function edit($id)
    {
        $farm = Farm::find($id);

        return view('RenterDashboard.edit',compact('farm'));
    }
}
