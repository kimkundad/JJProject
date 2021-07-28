<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    //
    public function my_account(){

        return view('profile.my_account'); 
    }

    public function delete_my_account(){
        return view('profile.delete_account'); 
    }

    public function confirm_delete_my_account($id){

        DB::table('users')
        ->where('id', $id)
        ->delete();
        
        Auth::logout();

        return redirect(url('/'))->with('del_success','ลบข้อมูล สำเร็จ');
    }
}
