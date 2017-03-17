<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('frontend.home')->with(array('active' => 'home','param'=>''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    
}
