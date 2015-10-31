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
use App\Code;
use Carbon\Carbon;
use Hash;

class CodeController extends Controller
{

    /** CODE VALIDATIE **/
    public function store(Request $request)
    {
        $winners = DB::table('winners')->get();

        if(Auth::check())
        {
            /* Code opslagen voor controle bij admin */

            $code = new Code;
            $code->code = Input::get('code');
            $code->FK_user_id = Auth::user()->id;
            $code->save();


            $validCodes = DB::table('validCodes')
            ->get();

            foreach($validCodes as $validCode)
            {
              if (Hash::check(Input::get('code'), $validCode->validCode))
              {
                  /*het is een valid code */
                 if($validCode->FK_user_id == 0)
                 {
                     /* het is een valid code die nog niet is ingevoerd */

/*                     $validCodeid = $validCode->id;
                     $validCode = Validcode::find($validCodeid);*/

                     $lotteryImg = ''; // variabele meesturen om javascript te laten runnen

                     /* Kijken of het een winnende code is */

                     if($validCode->winning1_losing0 == 0)
                     {
                          $lotteryImg = 'lose';
                     }
                     if($validCode->winning1_losing0 == 1)
                     {
                          $lotteryImg = 'win';
                                      
                          $winner = new Winner;

                          $winner->winningMonth = Carbon::now()->month;
                          $winner->FK_user_id = Auth::user()->id;
                          $winner->name = Auth::user()->name;

                          $winner->save();
                     }

                    //Code updaten
                     $specificValidCode = Validcode::find($validCode->id);

                     $specificValidCode->FK_user_id = Auth::user()->id;

                     $specificValidCode->save();


                     $jumpSectionA = '';  // variabele meesturen om javascript te laten runnen

                     return view('index')
                     ->with('lotteryImg', $lotteryImg)
                     ->with('jumpSectionA', $jumpSectionA)
                     ->with('winners', $winners);
                 }
                 else 
                 {
                  /* het is een validcode die al is gebruikt */ 

                  $jumpSectionA = ''; // variabele meesturen om javascript te laten runnen

                  $usedcodeMessage = 'Deze code is al reeds gebruikt !';

                  return view('index')
                  ->with('usedcodeMessage', $usedcodeMessage)
                  ->with('jumpSectionA', $jumpSectionA)
                  ->with('winners', $winners);

                 }
              }
            }

            /* Alle codes zijn gecheckt dus het is geen valid code */ 


          $wrongcodeMessage = 'Dit is geen juiste code!';

          $jumpSectionA = ''; // variabele meesturen om javascript te laten runnen

          return view('index')
          ->with('wrongcodeMessage', $wrongcodeMessage)
          ->with('jumpSectionA', $jumpSectionA)
          ->with('winners', $winners);
        }
        else 
        {

          $message = 'Je moet inloggen of registreren om een code toe te voegen!';

          return view('index')
          ->with('message', $message)
          ->with('winners', $winners);

        }

    }


    
}
