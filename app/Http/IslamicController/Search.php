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
        
            $data = DB::select("call searchEngine('$this->search')");
        
        
        $array = [
            "articles" => $data
        ];
        
       
        return view('search', $array)->extends('layouts.main')->section('main');
    }
}