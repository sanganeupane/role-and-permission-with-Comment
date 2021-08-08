<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public $backendtendPath = 'backend.';
    public $pagePath = '';

    public function __construct()
    {

        $this->pagePath = $this->backendtendPath . 'admin.';
//echo  $this->pagePath;
    }
}
