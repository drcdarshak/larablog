<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index(){
        $title = 'Home';
        return view('welcome',compact('title'));
    }

    public function about(){
        $title='About';
        return view('static-pages.about')->with('title',$title);
    }

    public function service(){
        $data=array(
            'title' =>'Services',
            'services'=>['Web development', 'Designing','App development']
        );
        return view('static-pages.service')->with($data);
    }
}
