<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use View;
use Illuminate\Http\Request;
use Hash;


class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/';
    protected $loginPath = '/login';


    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|confirmed|min:6',
            'city' => 'required|max:100',
            'password_confirmation' => 'required|min:6',
        ]);

        if ($validator->fails()) 
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('registerFail', ['fail']);
        }

        $input = $request->all();

        $user = new User();
        $user->name = $input['name'];
        $user->city    = $input['city'];
        $user->email    = $input['email'];
        $user->ipAddress    = $request->ip();
        $user->password  = Hash::make($input['password']);

        $user->save();

        Auth::login($user);

        return redirect('/')->with('success','Account successvol aangemaakt!');
    }

    public function login(request $request)
    {   
        $input = $request->all();

        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']]))
        {
            return redirect('/');
        }
        else
        {
            return redirect('/')->with('loginFail', ['fail']);
        }
    }
}
