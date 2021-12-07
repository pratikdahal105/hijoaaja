<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Contact;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public $path = 'backend.pages.';

    public function index(){
        $views = News::sum('views');
        $emails = count(Contact::where('status', 0)->get());
        $advertisement = count(Advertisement::where('status', 1)->get());
        $user = count(User::all());
        return view($this->path.'dashboard.Dashboard', compact('views', 'emails', 'advertisement', 'user'));
    }
}
