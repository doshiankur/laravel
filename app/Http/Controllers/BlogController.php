<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    function index(){
    	//dd("hi");
    	return redirect('blogview');
    }
}
