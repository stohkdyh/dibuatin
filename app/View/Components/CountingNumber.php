<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CountingNumber extends Component
{
    public $number;
    public $label;

    public function __construct($number, $label)
    {
        $this->number = $number;
        $this->label = $label;
    }
    
    public function render(): View|Closure|string
    {
        return view('components.counting-number');
    }
}