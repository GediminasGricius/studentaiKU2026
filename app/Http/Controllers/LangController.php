<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function changeLanguage($lang, Request $request){
        if ($request->user()->can('changeLanguage')){
            $request->session()->put('locale', $lang);
        }

        return redirect()->back();
    }
}
// http://localhost:8000/changeLanguage/en
