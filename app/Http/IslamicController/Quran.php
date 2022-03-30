<?php

namespace App\Http\IslamicController;

use App\Models\Getquran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Post;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;



class Quran extends Component
{
    public $persian = ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];
    public $english = [ 0 ,  1 ,  2 ,  3 ,  4 ,  5,  6 ,  7 ,  8 ,  9];
    public $requested;
    public $step = 0;
    public $tafsir = 'asan';
    public $reciterR = 'algamdi';
    public $start;
    public $end;
    public $limit = 9;

    protected $listeners = [ 'loadMore' ]; 
    public function loadMore() { 
        $this->limit += 5; 
    } 

    public function playWord($surah,$data){
        $link = asset('storage/everyWord/'.$surah."/$data.mp3");
        // dd(URL::);
        return $this->emit('runAudio',$link);
    }
    public function playAyah($id){
        $result = DB::select("SELECT `code` FROM `getquran` where id = $id")[0]->code;
        return $this->emit('runAudio',asset('storage/quran/'.$this->reciterR."/".$result.".mp3"));
    }

    public function mount(Request $request,$id){
        $this->requested = $id;
        if ($request->input('s') != null) {
            $this->start = $request->input('s');
        }else{$this->start = 1;}
        if ($request->input('e') != null) {
            $this->end = $request->input('e');
        }else{$this->end = 287;}
    }
    public function translateCity($name){
        if($name == "meccan"){
            return "مەککی";
        }else if($name == "medinan"){
            return "مەدەنی";
        }else{

        }
    }
    public function saveSetting(){
        $this->emit('closeModal',null);
    }
    public function render()
    {
        $this->emit('closeModal',null);
        $words = DB::select("call getWord($this->requested);");
        $surahs = DB::select("SELECT * FROM `surah` where id = $this->requested");
        
        $ayahs = Getquran::where('surah','=', $this->requested)->paginate($this->limit+$this->start);
        
        // dd($ayahs);
        $reciter = DB::select("SELECT * FROM `reciters`");
        $array = [
            "words" => $words,
            "ayahs" => $ayahs,
            "surahs" => $surahs,
            "reciter" => $reciter
        ];
        return view('quran',$array)->extends('layouts.main')->section('main');
    }
}
