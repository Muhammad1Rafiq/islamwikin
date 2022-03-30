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

set_time_limit(50000000000);
class Test extends Component
{
    public function download(){
        
        // dd(asset("as/page004.png"));
        $surahName = imagecreatefrompng(public_path('as/surahNames/23.png'));
        list($newwidth, $newheight) = getimagesize(public_path('as/surahNames/23.png'));
        $src = imagecreatefrompng(public_path('as/textOnly/004.jpg'));
        $dest = imagecreatefrompng(public_path('as/bag.png'));
        $image = imagecreate($newwidth, $newheight);
        $red = imagecolorallocate($image, 255, 0, 0);
        imagefill($image, 0, 0, $red);
        // imagealphablending($dest, false);
        // imagesavealpha($dest, true);
        imagecopymerge($dest, $src, 10, 9, -50, -80, 1000, 1500, 100); //have to play with these numbers for it to work for you, etc.
        imagecopyresampled($image, $surahName, 0, 0, 0, 0, $newwidth, $newheight, $newwidth, $newheight);
        imagecopyresampled($dest, $image, 460, 42, 0, 0, $newwidth/4, $newheight/4, $newwidth, $newheight);


        $color = imagecolorallocate($dest, 0, 0, 0);
        $font = public_path('as/arial.ttf');
        imagettftext($dest, 15, 0, 500, 1540, $color, $font, "604");

        header('Content-Type: image/jpeg');
        imagejpeg($dest, "0.0.4.jpeg");
        imagedestroy($dest);
        imagedestroy($src);
    }

    public function render()
    {        
        set_time_limit(50000000000);
        return view('test')->extends('layouts.main')->section('main');
    }
    
}