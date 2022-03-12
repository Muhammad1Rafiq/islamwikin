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
