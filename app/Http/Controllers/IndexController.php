<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function returnIndex(){
        $cats = Cat::all();
        return view('index',[
            'catsData'=>$cats
        ]);
    }

    // public function navbar(){
    //     $categoriesNames = Cat::all();
    //     return view('layout',[
    //         'categoriesNames' => $categoriesNames
    //     ]);
    // }
}
