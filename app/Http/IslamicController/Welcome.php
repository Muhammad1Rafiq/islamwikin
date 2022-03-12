<?php
namespace App\Http\IslamicController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Livewire\Component;

class Welcome extends Component
{
    public $number;
    public $data = 5;

    public function render()
    {
        
        // $i = DB::SELECT("SELECT * FROM types");
        
        // $this->number = json_encode($i, JSON_UNESCAPED_UNICODE);
        
        return view('welcome')->extends('layouts.layout');
    }
}
