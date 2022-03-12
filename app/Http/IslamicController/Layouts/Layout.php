<?php

namespace App\Http\IslamicController\Layouts;

use Livewire\Component;

class Layout extends Component
{
    public $data = 5;

    public function lastarticle(){
        return dd("hello");
    }
    public function render()
    {
        return view('layouts.layout');
    }
}
