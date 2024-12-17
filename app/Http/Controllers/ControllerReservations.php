<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ControllerReservations extends Controller
{

    public function booking($id, request $request)
    {
        $dateIn = $request->dateIn;
        $dateOut = $request->dateOut;

        if (empty(Reservation::scopeOverlapping($dateIn, $dateOut, $id))) {

            $newReserv = $request->validate([
                'dateIn' => 'required|date',
                'dateOut' => 'required|date|after_or_equal:dateIn',
                'person' => 'required|integer|min:1',
            ]);

            $newReserv['user_id'] = Auth::id();
            $newReserv['room_id'] = $id;

            Reservation::create($newReserv);

            return redirect()->back()->with('success', 'Reservation created successfully');
        }

        return redirect()->back()->with('fail', 'Reservation already booked');

    }

    public function dellBooking($id)
    {
        if (Auth::id() == Reservation::find($id)->user_id) {
            Reservation::destroy($id);
            return redirect()->back()->with('success', 'Reservation deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'This is not your reservation.');
        }

    }


}


