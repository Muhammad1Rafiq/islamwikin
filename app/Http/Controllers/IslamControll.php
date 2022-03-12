<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IslamControll extends Controller
{
    public function last(){
        $result = DB::select("SELECT id FROM `articles` ORDER BY id DESC limit 1");
        $id = $result[0]->id;
        return redirect('/article/'.$id);
    }
    public function random(){
        $result = DB::select("SELECT id FROM `articles`");
        $random = rand(0, sizeof($result));
        $id = $result[$random]->id;
        return redirect('/article/'.$id);
    }
}
