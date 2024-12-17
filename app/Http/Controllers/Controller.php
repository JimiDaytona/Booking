<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Room;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private $room;

//    public function __construct()
//    {
//    }

    public function show($id = 'all')
    {
        if ($id == 'all'){
            $this->room = Room::all();
        }else {
            $this->room = Room::find($id);
        }
        return view('layout', ['room'=>$this->room, 'id'=> $id]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'dateIn' => 'required',
            'dateOut' => 'required',
            'person' => 'required',
            'price' => 'required',
        ]);
        $this->room = Room::searchRoom($request->dateIn, $request->dateOut, $request->person, $request->price);
        return view('layout', ['room'=>$this->room, 'id'=> 'all']);
    }

    public function myRoom()
    {
        $resrvations = Reservation::getForUser();
        return view('my_room', compact('resrvations'));
    }

    public function adminRoom()
    {
        $rooms = Room::all();
        $users = User::all();
        $reservations = Reservation::all();
        return view('admin-room', compact('rooms', 'users', 'reservations'));
    }


}
