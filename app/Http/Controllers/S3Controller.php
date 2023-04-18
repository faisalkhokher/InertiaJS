<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class S3Controller extends Controller
{
    public function object()
    {
       $dir =  Storage::disk('s3')->allDirectories();
       $d =  Storage::disk('s3')->download('/test/fsl1.jfif');
       return $d;   
    }
}
