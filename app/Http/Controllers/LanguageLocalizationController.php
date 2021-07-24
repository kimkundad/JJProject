<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Redirect;

class LanguageLocalizationController extends Controller
{
    public function index(Request $request){
        if($request->lang != ''){
            app()->setLocale($request->lang);
        }
        return Redirect::to('/');
    }
}
