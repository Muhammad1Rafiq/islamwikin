<?php

namespace App\Http\IslamicController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Types;
use App\Models\Post;
use App\Models\Articles;
use Livewire\WithFileUploads;

class Newpost extends Component
{
    use WithFileUploads;
    public $photo;
    public function save(){
        $this->validate([
            'photo' => 'image|max:1024'
        ]);
        $this->photo->store('photos');
    }
    public $title,$sm_disc,$type,$content;
    public function render()
    {
        $array = [
            "types" => Types::all(),
            "articles" => Articles::all()
        ];
        return view('newpost',$array)->extends('layouts.layout');
    }
    public function addPost(){
        Post::create([
            'a_id' => 3,
            'title' => $this->title,
            'sm_disc' => $this->sm_disc,
            't_id' => $this->type,
            'content' => $this->content
        ]);
        return dd("send sesc");
    }
    
}