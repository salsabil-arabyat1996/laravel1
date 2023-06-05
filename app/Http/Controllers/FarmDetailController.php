<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\ReviewRating;
use App\Models\Comment;
use App\Models\Farm;
use App\Models\Image;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FarmDetailController extends Controller
{
    public function view($id)
    {
        // Retrieve the specific appointment based on the ID
        $appointment = Appointment::where('farm_id', $id)->get();

        // Retrieve the specific farm based on the ID
        $farm = Farm::find($id);

        // Retrieve the comments related to the specific farm
        $comments = Comment::where('farm_id', $id)->get();

        // Fetch all booked appointments from the database
        $bookedAppointments = Appointment::all();

        $images =  Image::where('farm_id', $id)->get();

        // Get the booked dates
        $bookedDates = [];
        foreach ($bookedAppointments as $appointment) {
            $bookedDates[] = [
                'start' => Carbon::parse($appointment->check_in)->format('Y-m-d'),
                'end' => Carbon::parse($appointment->check_out)->format('Y-m-d')
            ];
        }

        return view('home.farm-details', compact('appointment', 'farm', 'comments', 'bookedDates', 'bookedAppointments', 'images'));
    }

    public function submitAppointment(Request $request)
    {
        // Retrieve the form input values
        $checkIn = $request->input('date-in');
        $checkOut = $request->input('date-out');
        // $farm_id = $request->input('farm_id');

        // Perform any additional validation or processing as needed

        // Check if the selected period falls within any booked appointments
        $isBooked = Appointment::where(function ($query) use ($checkIn, $checkOut) {
            $query->where('check_in', '<=', Carbon::parse($checkIn))
                ->where('check_out', '>=', Carbon::parse($checkOut));
        })->exists();

        if ($isBooked) {
            return redirect()->back()->with('error', 'The selected period is already booked.');
        }

        // Create a new Appointment instance and save it to the database
        $appointment = new Appointment();
        $appointment->check_in = Carbon::parse($checkIn);
        $appointment->check_out = Carbon::parse($checkOut);
        $appointment->farm_id = $request->input('farm_id');
        $appointment->user_id = Auth::id();
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment booked successfully!');
    }
    public function reviewstore(Request $request)
    {
        $review = new Comment();
        $review->farm_id = $request->farm_id;
        $review->name    = $request->name;
        $review->email   = $request->email;
        $review->feedback = $request->comment;
        $review->star_rating = $request->rating;
        $review->save();
        return redirect()->back()->with('flash_msg_success', 'Your review has been submitted Successfully,');
    }
}
