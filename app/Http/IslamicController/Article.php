<?php

namespace App\Http\IslamicController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Articles;

class Article extends Component
{
    public $post;
    public $t;
    
    public function download(){
        

        // for ($i=1; $i < 9; $i++) { 
        //    $data = $data . Storage::disk('public')->get("yasir_ad/02200".$i.".mp3");
        // }
        
        $surah = DB::select("SELECT * FROM `surah`");
        $ayah = DB::select("SELECT * FROM `ayah_meta`");
        $word = DB::select("SELECT * FROM `word`");

        for ($i = 59900; $i < 70000; $i++) {
            $surahN = $ayah[$word[$i]->ayah-1]->surah;
            $ayahN = $ayah[$word[$i]->ayah-1]->ayah;
            $posN = $word[$i]->position;
            $surahNP = str_pad($surahN, 3, '0', STR_PAD_LEFT);
            $ayahNP = str_pad($ayahN, 3, '0', STR_PAD_LEFT);
            $posNP = str_pad($posN, 3, '0', STR_PAD_LEFT);

            $fileName = $surahNP."_".$ayahNP."_".$posNP.".mp3";
            
            $data = file_get_contents("https://words.audios.quranwbw.com/$surahN/$fileName");
            file_put_contents(storage_path("app/everyWord/$surahN/$fileName"),$data);

        }
        dump("finish");
    }

    public function mount($id){
        $this->post = Articles::find($id);
        $this->t = $this->post->title;
        //  return dd($this->qString);
    }
    protected $queryString = ['t'];
    public function render()
    {
        // $array = [
        //     "articles" => Articles::all()
        // ];
        return view('article', $this->post)->extends('layouts.layout');
    }
}
