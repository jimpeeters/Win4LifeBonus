<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller
{
    public function index()
    {
    	$winners = DB::table('winners')->get();

        return view('index')->with('winners', $winners);
    }

}
