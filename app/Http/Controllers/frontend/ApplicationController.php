<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends FrontendController
{
public function index(){
    return view($this->pagePath . 'index');

//    return view('admin.index');

}
}
