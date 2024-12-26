<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Room;

class RoomCont extends Component
{
    private $room;
    private $id;
    public function __construct($room, $id)
    {
        $this->room = $room;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.room-cont', [
            'room' => $this->room,
            'id' => $this->id]);
    }
}
