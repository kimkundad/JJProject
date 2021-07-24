<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function my_account(){

        return view('profile.my_account'); 
    }
}
