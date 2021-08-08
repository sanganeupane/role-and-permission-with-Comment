<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Logincontroller extends Controller
{
    public $loginPath = 'login.';
    public $pagePath = '';

    public function __construct()
    {

        $this->pagePath = $this->loginPath . 'login.';
//echo  $this->pagePath;
    }
}
