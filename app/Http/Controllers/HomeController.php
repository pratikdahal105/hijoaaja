<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Featured;
use App\Models\News;
use App\Models\Videos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dt = Carbon::now()->toDateString();
        $news_data = Featured::whereDate('till', '>=', $dt)
            ->join('news', 'news.id', '=', 'featured.news_id')
            ->orderBy('news.publish_date', 'DESC')
            ->get();
        $videos = Videos::orderBy('publish_date', 'DESC')->get();
        return view('pages.home', compact('news_data', 'videos'));
    }

    public function newsAll(){
        $news_data = News::with('category')->orderBy('publish_date', 'DESC')->get();
        return view('pages.news', compact('news_data'));
    }

    public function newsDetail($slug){
        $news = News::where('slug', $slug)->first();
        return view('pages.newsDetail', compact('news'));
    }

    public function newsFilter($category){
        $category = Category::where('name', $category)->first();
        $news_data = News::where('category_id', $category->id)->orderBy('publish_date', 'DESC')->get();
        $cat = News::with('category')->get();
        return view('pages.newsFilter', compact('news_data', 'cat', 'category'));
    }

    public function aboutUs(){
        return view('pages.aboutus');
    }

    public function contact(){
        return view('pages.contact');
    }
}
