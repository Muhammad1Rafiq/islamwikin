<?php

namespace App\Http\IslamicController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Articles;


class Search extends Component
{
    public $search;
    protected $queryString = ['search'];
    
    public function render()
    {
        
            $surah = DB::select("SELECT * FROM `surah`");
        
        
        $array = [
            "surahs" => $surah
        ];
        
       
        return view('search', $array)->extends('layouts.main')->section('main');
    }
}