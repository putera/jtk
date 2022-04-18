<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Base extends Component
{
    public function render()
    {
        return view('layouts.base');
    }
}
