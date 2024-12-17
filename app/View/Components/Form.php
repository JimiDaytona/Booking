<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     */
    private $action;
    private $price;

    public function __construct($action, $price = false)
    {
        $this->action = $action;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form', ['action' => $this->action, 'price' => $this->price]);
    }
}
