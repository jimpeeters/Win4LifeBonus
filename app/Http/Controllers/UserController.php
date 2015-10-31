<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Input;
use Auth;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller {


  public function index()
  {
    $users = User::where('admin1_user0', '=', 0)->with('codes')->withTrashed()->get();

/*    dd($users);*/

    return view('dashboard')->with('users', $users);
  }

  public function destroy($id)
  {
    $specificUser = User::find($id);
    $specificUser->delete();

    $users = User::where('admin1_user0', '=', 0)->withTrashed()->get();

/*    return view('dashboard')->with('users', $users);*/
    return Redirect::to('dashboard')->with('users', $users);
  }

  public function restore($id)
  {
    $specificUser = User::withTrashed()->find($id);
    $specificUser->restore();


    $users = User::where('admin1_user0', '=', 0)->withTrashed()->get();

/*    return view('dashboard')->with('users', $users);*/
    return Redirect::to('dashboard')->with('users', $users);
  }
  
}

?>