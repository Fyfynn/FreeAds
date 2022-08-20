<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //

    public function welcome() 
    {
        var_dump(auth()->guest());
        if (auth()->guest()) 
        {
            return redirect('/connection')->withErrors([
                'email' => "You have to log in to view this page !"
            ]);
        }
        return view('account');
    }

    public function disconnect()
    {
        auth()->logout();
        return redirect('ads');
    }
}
 