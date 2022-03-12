<?php

namespace App\Http\IslamicController;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;


class Test extends Component
{
    public $fromSurah;
    public $fromAyah;
    public $toSurah;
    public $toAyah;
    public $wait;
    public $bsmla = false;

    public function download(){
        $emptyhalf = Storage::disk('public')->get("emptyhalf.mp3");
        $empty = Storage::disk('public')->get("empty.mp3");
        $data = null;

        for ($i=1; $i < 9; $i++) { 
           $data = $data . Storage::disk('public')->get("yasir_ad/02200".$i.".mp3");
        }
        
        $time = date("Ymd");
        Storage::disk('temp')->put($time.Session::getId().'.mp3', $data.$data); 
        $fileName = "22:1 - 22:9";
        return response()
        ->download(storage_path('app\temp\/'.$time.Session::getId().".mp3"), $fileName.'.mp3')
        ->deleteFileAfterSend(true);
    }

    public function render()
    {        
        $datas = [
            "data" => null
        ];
        
        return view('test',$datas)->extends('layouts.main')->section('main');
    }
    
}