<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contacts;
use Auth;
use Input;
use DB;
use App\Quotation;
use App\Validcode;
use App\Winner;

class CodeController extends Controller
{

    public function index()
    {


    }

    public function create()
    {
     /*   return view('contactCreate');*/
    }

    /** CODE VALIDATIE **/
    public function store(Request $request)
    {
        if(Auth::check())
        {

            $validCode = DB::table('validCodes')->where('validCode', '=', Input::get('code'))->first();

            if (is_null($validCode)) {
                
                $wrongcodeMessage = 'Dit is geen juiste code!';

                $jumpSectionA = '';

                return view('index')->with('wrongcodeMessage', $wrongcodeMessage)->with('jumpSectionA', $jumpSectionA);

            } else {

               if($validCode->FK_user_id == 0)
               {
                   $validCodeid = $validCode->id;
                   $validCode = Validcode::find($validCodeid);

                   $lotteryImg = '';

                   if($validCode->winning1_losing0 == 0)
                   {
                        $lotteryImg = 'lose';
                   }
                   else
                   {
                        $lotteryImg = 'win';
                   }


                   $validCode->FK_user_id = Auth::user()->id;
                   $validCode->save();

                   $jumpSectionA = '';

                   return view('index')->with('lotteryImg', $lotteryImg)->with('jumpSectionA', $jumpSectionA);
               }
               else {

                $jumpSectionA = '';

                $usedcodeMessage = 'Deze code is al reeds gebruikt !';

                return view('index')->with('usedcodeMessage', $usedcodeMessage)->with('jumpSectionA', $jumpSectionA);

               }
            }
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
