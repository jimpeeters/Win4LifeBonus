<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contacts;
use Auth;
use Input;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code = Contacts::where('FK_user_id', '=', Auth::user()->user_id)->get();


       /* dd(Auth::user());*/

        return view('index')->with('codes', $codes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     /*   return view('contactCreate');*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check())
        {
        $code = new Code;


        $code->code = Input::get('code');

        $code->FK_user_id = Auth::user()->user_id; //save user id of uploading user for uploaded file

        $code->save();


        $codes = Code::where('FK_user_id', '=', Auth::user()->user_id)->get();


        return view('index')->with('codes', $codes);

        }
        else 
        {

          $message = 'Je moet inloggen of registreren om een code toe te voegen!';

          return view('index')->with('message', $message);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specificContact = Contacts::where('contact_id', '=', $id)->first();

        return view('contactEdit')->with('contact', $specificContact);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = Contacts::where('contact_id', '=', $id)->first();

        $contact->name = Input::get('name');
        $contact->email = Input::get('email');
        $contact->address = Input::get('address');
        $contact->number = Input::get('number');

        $contact->FK_user_id = Auth::user()->user_id; //save user id of uploading user for uploaded file

        $contact->save();



        $contacts = Contacts::where('FK_user_id', '=', Auth::user()->user_id)->get();


        return view('contacts')->with('contacts', $contacts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contacts::find($id)->first();

        $contact->delete();

        $contacts = Contacts::where('FK_user_id', '=', Auth::user()->user_id)->get();

        return view('contacts')->with('contacts', $contacts);


    }
}
