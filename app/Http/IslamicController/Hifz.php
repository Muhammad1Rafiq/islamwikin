<?php

namespace App\Http\IslamicController;

use App\Models\Surah;
use Illuminate\Support\Facades\Post;
use App\Models\reciters;
use Livewire\Component;

class Hifz extends Component
{
    public $fromSurah = 1; // start from surah
    public $fromAyah = 1;
    public $toAyahStart = null;
    public $reciterR = "mahir_mu3aiql";
    public $toSurah = 1;
    public $toAyah;
    public $TooAYyah;
    public $bsmla;
    public $waitTime = 0;
    public $repeatN = 1;

    protected $listeners = [ 'wait','repeate','senda' ]; // 
    public function wait($value) { 
        if(!is_null($value)) 
        $this->waitTime = $value; 
    } 
    public function repeate($value) { 
        if(!is_null($value)) 
        $this->repeatN = $value; 
    } 
    public function senda($value) { 
        if(!is_null($value)) 
        $this->TooAYyah = $value;
        $this->check();
    } 

    public function check(){
        dd(
            "Qarii: ".$this->reciterR.
            " \nF Surah: ".$this->fromSurah.
            " \nF Ayah: ".$this->fromAyah.
            " \nTo Surah: ".$this->toSurah.
            " \nTo Ayah: ".$this->TooAYyah.
            " \nBsmla: ".$this->bsmla.
            " \nWaitRange: ".$this->waitTime.
            " \nRepatTime: ".$this->repeatN
        );
       
    }

    public function setTSurah(){
        if ($this->fromSurah != 114) {
            $this->toSurah = $this->fromSurah+1;
        }else{
            $this->toSurah = $this->fromSurah;
        } 
    }

    
    public function render()
    {
        $surahsFrom = Surah::all();
        $reciters = reciters::all();
        $ayahsFrom = Surah::find($this->fromSurah);
        $surahsTo = Surah::where('id','>=', $this->fromSurah)->get();
        $ayahsTo = Surah::all();
        $ayahsTo = $ayahsTo[$this->toSurah-1];
        if($this->toSurah == $this->fromSurah){
            $this->toAyahStart = $this->fromAyah;
        }else{
            $this->toAyahStart = 1;  
        }
        
        $array = [
            "surahsFrom" => $surahsFrom,
            "ayahsFrom" => $ayahsFrom->nAyah,
            "surahsTo" => $surahsTo,
            "ayahsTo" => $ayahsTo->nAyah,
            "reciters" => $reciters
        ];
        return view('hifz',$array)->extends('layouts.main')->section('main');
    }
}
