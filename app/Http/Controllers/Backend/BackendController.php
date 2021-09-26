<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public $path = 'backend.pages.';

    public function index(){
        return view($this->path.'dashboard.Dashboard');
    }
}
