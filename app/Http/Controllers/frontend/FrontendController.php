<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public $frontendPath='frontend.';
    public  $pagePath='';
    public function __construct()
    {

        $this->pagePath= $this->frontendPath.'pages.';
//echo  $this->pagePath;
    }
}
