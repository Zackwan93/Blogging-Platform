<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index (){
        $title = 'Welcome to Silver Lining Bird Nest!';
       // return view('pages.index', compact('title'));
       return view('pages.index') -> with('title',$title);
    }

    public function about (){
        $title = 'ABOUT';
        return view('pages.about') -> with('title',$title);
    }

    public function services (){
        $data = array (
            'title' => 'SERVICES',
            'list'  => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services') -> with($data);
        
    }
        
    public function login (){
        $title = 'Welcome to Silver Lining Bird Nest!';
       // return view('pages.index', compact('title'));
       return view('pages.login') -> with('title',$title);
    }
    
}
