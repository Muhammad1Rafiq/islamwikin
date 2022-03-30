<?php

namespace App\Http\IslamicController;

use App\Models\Surah;
use Illuminate\Support\Facades\Post;
use App\Models\reciters;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
// use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
// use ProtoneMedia\LaravelFFMpeg\FFMpeg;


class Hifz extends Component
{
    public $fromSurah = 1; // start from surah
    public $fromAyah = 1;
    public $toAyahStart = null;
    public $reciterR = "mahir_mu3aiql";
    public $toSurah = 1;
    public $toAyah;
    public $bsmla;
    public $repeatN = 1;
    public $htmlIndex01 = "";
    protected $listeners = [ 'repeate' ]; // 
    public $resultData = [];
    public function repeate($value) { 
        if(!is_null($value)) 
        $this->repeatN = $value; 
    } 

    public function check(){
        // dd(
        //     "Qarii: ".$this->reciterR.
        //     " \nF Surah: ".$this->fromSurah.
        //     " \nF Ayah: ".$this->fromAyah.
        //     " \nTo Surah: ".$this->toSurah.
        //     " \nTo Ayah: ".$this->toAyah.
        //     " \nBsmla: ".$this->bsmla.
        //     " \nRepatTime: ".$this->repeatN
        // );
        $dataCount = null;
        $fromSurah = null;
        $fromAyah = $this->fromAyah;
        $fromContent = null;
        $toSurah = null;
        $toAyah = $this->toAyah;
        $toContent = null;
        $reciter = null;
        $repeat = $this->repeatN;
        if($this->toAyah == null){
            $toAyah = $this->fromAyah;
        }
        $dataCount = DB::select("call getCount($this->fromSurah, $this->fromAyah, $this->toSurah, $toAyah )")[0]->count;
        $fromSurah = DB::select("SELECT `name` FROM `surah` where `id` =".$this->fromSurah)[0]->name;
        $fromContent = DB::select("SELECT `quran` FROM `getquran` where surah = $this->fromSurah and ayah = $fromAyah")[0]->quran;
        $toSurah = DB::select("SELECT `name` FROM `surah` where `id` =".$this->toSurah)[0]->name;
        $toContent = DB::select("SELECT `quran` FROM `getquran` where surah = $this->toSurah and ayah = $toAyah")[0]->quran;
        $reciter = DB::select("SELECT * FROM `reciters` where `path` = '$this->reciterR'")[0]->name;
        // dd($fromSurah);
        $array = [$dataCount,$fromSurah,$fromAyah,$fromContent,$toSurah,$toAyah,$toContent,$reciter,$repeat,$this->fromSurah];
        $this->emit('aadb',$array);

    }
    public function downloadAudio(){
        $toAyah = $this->toAyah;
        if($this->toAyah == null){
            $toAyah = $this->fromAyah;
        }
        $reciterM = DB::select("SELECT * FROM `reciters` where `path` = '$this->reciterR'")[0]->min;
        $dataRes = DB::select("call getAyahCodeAndTafsir($this->fromSurah, $this->fromAyah, $this->toSurah, $toAyah)");
        $data = "";
        header('Content-Type: audio/mpeg');
        for ($j=0; $j < $this->repeatN; $j++) {
            for ($i=0; $i < sizeof($dataRes); $i++) {
                $data = $data . file_get_contents(storage_path("app/public/quran/".$this->reciterR."/".$dataRes[$i]->code.".mp3"));
            }
        }   
        
        $time = date("Ymd");
        file_put_contents(storage_path("app/temp/".$time.Session::getId().'.mp3'), $data);
        $fileName = $this->reciterR." | $this->fromSurah=$this->fromAyah to $this->toSurah=$toAyah";
        $headers = [
            'Content-Type' => 'audio/mpeg',
         ];
        return response()
        ->download(storage_path('app\temp\/'.$time.Session::getId().".mp3"), $fileName.'.mp3',$headers)
        ->deleteFileAfterSend(true);
    }

    public function setTSurah(){
        if ($this->fromSurah != 114) {
            $this->toSurah = $this->fromSurah+1;
        }else{
            $this->toSurah = $this->fromSurah;
        } 
    }
    public $ayahTo;
    public function fromSChanges(){
        $this->ayahTo = Surah::all();
        $this->ayahTo = $this->ayahTo[$this->toSurah-1];
    }
    public function mount(){
        $this->fromSChanges();
    }
    public function render()
    {
        $surahsFrom = Surah::all();
        $reciters = reciters::all();
        $ayahsFrom = Surah::find($this->fromSurah);
        $surahsTo = Surah::where('id','>=', $this->fromSurah)->get();
        
        if($this->toSurah == $this->fromSurah){
            $this->toAyahStart = $this->fromAyah;
        }else{
            // $this->toAyahStart = 1;  
        }
        
        $array = [
            "surahsFrom" => $surahsFrom,
            "ayahsFrom" => $ayahsFrom->nAyah,
            "surahsTo" => $surahsTo,
            "ayahsTo" => $this->ayahTo->nAyah,
            "reciters" => $reciters
        ];
        return view('hifz',$array)->extends('layouts.main')->section('main');
    }
}