<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\FollowerMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FollowerController extends Controller
{
    //
    public function new()
    {
        $follower = auth()->user();
        $follower = User::where('email', request('email'))->firstOrFail();

        $follower->suivis()->attach($follower);

        Mail::to($follower)->send(new FollowerMail);

        return back();
    }
}
