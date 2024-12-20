<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListReservation extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct($reservations)
    {
        $this->reservations = $reservations;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.list.list-reservation', ['reservations' => $this->reservations]);
    }
}
