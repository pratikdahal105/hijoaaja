<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Featured;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Videos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dt = Carbon::now()->toDateString();
        $gallerys = Gallery::all();
        $news_data = Featured::whereDate('till', '>=', $dt)
            ->join('news', 'news.id', '=', 'featured.news_id')
            ->orderBy('news.publish_date', 'DESC')
            ->get();
        $videos = Videos::orderBy('publish_date', 'DESC')->get();
        return view('pages.home', compact('news_data', 'videos', 'gallerys'));
    }

    public function newsAll(){
        $category = Category::all();
        $news_data = News::with('category')->orderBy('created_at', 'DESC')->get();
        return view('pages.news', compact('news_data', 'category'));
    }

    public function newsDetail($slug){
        $news = News::where('slug', $slug)->first();
        $news->increment('views');
        return view('pages.newsDetail', compact('news'));
    }

    public function newsFilter($category){
        $category = Category::where('name', $category)->first();
        $news_data = News::where('category_id', $category->id)->orderBy('publish_date', 'DESC')->get();
        $cat = Category::all();
        return view('pages.newsFilter', compact('news_data', 'cat', 'category'));
    }

    public function aboutUs(){
        return view('pages.aboutus');
    }

    public function contact(Request $request){
        if($request->isMethod('get')){
            return view('pages.contact');
        }
        if($request->isMethod('post')){
            $request->validate([
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);
            if ($request->check == null){
                $conatct = new Contact();
                $data['subject'] = $request->subject;
                $data['email'] = $request->email;
                $data['message'] = $request->email;
                if($conatct->create($data)){
                    return redirect()->back()->with('success', 'Message sent successfully!');
                }
                else{
                    return redirect()->back()->with('error', 'Oops something went wrong!');
                }
            }
            return redirect()->back()->with('success', 'Message sent successfully!');
        }
    }
}
