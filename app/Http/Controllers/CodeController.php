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

    
}
