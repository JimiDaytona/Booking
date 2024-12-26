<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class ControllerRoom extends Controller
{
    public function AddRoom(Request $request)
    {
        $validetedData = $this->validate($request, [
            'name' => 'required',
            'img' => 'required',
            'price' => 'required|numeric',
            'description' => "required",
            'person' => "required|numeric",
        ]);

        try {
            $newRoom = Room::create($validetedData);
            return redirect(route('admin-room'));
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    public function DeleteRoom($id)
    {
        Room::find($id)->delete();
        return redirect(route('admin-room'));

    }
}
