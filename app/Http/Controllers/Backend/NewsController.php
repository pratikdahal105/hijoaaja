<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Featured;
use App\Models\News;
use App\Models\Videos;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use File;

class NewsController extends Controller
{
    public $path = 'backend.pages.';

    public function index(){
        $news_data = News::with('category', 'feature')->get();
        return view($this->path.'news.list', compact('news_data'));
    }

    public function newsCreate(Request $request){
        if ($request->isMethod('get')) {
            $news = null;
            $categories = Category::select('name', 'id')->get();
            return view($this->path . 'news.create', compact('news', 'categories'));
        }
        if ($request->isMethod('post')) {
            try {
                $data = new News();
                $data['slug'] = SlugService::createSlug(News::class, 'slug', $request->title);
                $data['category_id'] = $request->category_id;
                $data['author'] = $request->author;
                $data['title'] = $request->title;
                if ($request->hasFile('thumbnail')) {
                    $file = $request->file('thumbnail');
                    $uploadPath = public_path('uploads/news/thumbnail/');
                    $data['thumbnail'] = $this->fileUpload($file, $uploadPath);
                }
                $data['summary'] = $request->summary;
                $data['body'] = $request->body;
                $data['publish_date'] = $request->publish_date;
                $data->save();
                return redirect()->route('news.list')->with('success', 'News Created Successfully!');
            }catch (\Exception $e){
                return redirect()->back()->with('error', 'Make Sure All Required Fields are Filled!');
            }

        }
    }

    public function newsEdit(Request $request, $slug){
        if ($request->isMethod('get')) {
            $news = News::where('slug', $slug)->first();
            $categories = Category::select('name', 'id')->get();
            return view($this->path . 'news.edit', compact('news', 'categories'));
        }
        if ($request->isMethod('post')) {
            try {
                $data = News::where('slug', $slug)->first();
                $data['category_id'] = $request->category_id;
                $data['author'] = $request->author;
                $data['title'] = $request->title;
                if ($request->hasFile('thumbnail')) {
                    $file = $request->file('thumbnail');
                    $uploadPath = public_path('uploads/news/thumbnail/');
                    File::delete($uploadPath.$data->thumbnail);
                    $data['thumbnail'] = $this->fileUpload($file, $uploadPath);
                }
                $data['summary'] = $request->summary;
                $data['body'] = $request->body;
                $data['publish_date'] = $request->publish_date;
                $data->update();
                return redirect()->route('news.list')->with('success', 'News Edited Successfully!');
            }catch (\Exception $e){
                return redirect()->back()->with('error', 'Make Sure All Required Fields are Filled!');
            }

        }
    }

    public function newsDelete(Request $request){
        $news = News::where('slug', $request->slug)->first();
        $news->delete();
        return redirect()->route('news.list')->with('warning', 'Category Deleted Successfully!');
    }

    public function indexCategory(){
        $categories = Category::all();
        return view($this->path.'category.list', compact('categories'));
    }

    public function categoryCreate(Request $request){
        if ($request->isMethod('get')){
            $category = null;
            return view($this->path.'category.create', compact('category'));
        }
        if ($request->isMethod('post')) {
            try {
                $data = new Category();
                $data['name'] = $request->name;
                $data['caption'] = $request->caption;
                $data->save();
                return redirect()->route('category.list')->with('success', 'Category Created Successfully!');
            }catch (\Exception $e){
                return redirect()->back()->with('error', 'Make Sure All Required Fields are Filled!');
            }
        }
    }

    public function categoryEdit(Request $request, $cat){
        if ($request->isMethod('get')){
            $category = Category::where('id',$cat)->first();
            return view($this->path.'category.edit', compact('category'));
        }
        if ($request->isMethod('post')) {
            try {
                $data = Category::findOrFail($cat);
                $data['name'] = $request->name;
                $data['caption'] = $request->caption;
                $data->update();
                return redirect()->route('category.list')->with('success', 'Category Updated Successfully!');
            }catch (\Exception $e){
                return redirect()->back()->with('error', 'Unexpected Error!');
            }
        }
    }

    public function categoryDelete(Request $request){
        $category = Category::findOrFail($request->id);
        $gets = News::select('id')->where('category_id', $category->id)->get();
        foreach ($gets as $get){
            $news = News::findOrFail($get->id);
            $news->delete();
        }
        $category->delete();
        return redirect()->route('category.list')->with('warning', 'Category Deleted Successfully!');
    }

    public function indexVideo(){
        $videos = Videos::all();
        return view($this->path.'video.list', compact('videos'));
    }

    public function videoCreate(Request $request){
        if ($request->isMethod('get')){
            $video = null;
            return view($this->path.'video.create', compact('video'));
        }
        if ($request->isMethod('post')) {
            try {
                $data = new Videos();
                $data['title'] = $request->title;
                $data['caption'] = $request->caption;
                $data['url'] = $request->url;
                $data['publish_date'] = $request->publish_date;
                $data->save();
                return redirect()->route('video.list')->with('success', 'Video Created Successfully!');
            }catch (\Exception $e){
                return redirect()->back()->with('error', 'Make Sure All Required Fields are Filled!');
            }
        }
    }

    public function videoEdit(Request $request, $vid){
        if ($request->isMethod('get')){
            $video = Videos::where('id',$vid)->first();
            return view($this->path.'video.edit', compact('video'));
        }
        if ($request->isMethod('post')) {
            try {
                $data = Videos::findOrFail($vid);
                $data['title'] = $request->title;
                $data['caption'] = $request->caption;
                $data['url'] = $request->url;
                $data['publish_date'] = $request->publish_date;
                $data->update();
                return redirect()->route('video.list')->with('success', 'Video Updated Successfully!');
            }catch (\Exception $e){
                return redirect()->back()->with('error', 'Unexpected Error!');
            }
        }
    }

    public function videoDelete(Request $request){
        $video = Videos::findOrFail($request->id);
        $video->delete();
        return redirect()->route('video.list')->with('warning', 'video Deleted Successfully!');
    }

    public function addFeatured(Request $request, $slug){
        $request->validate([
            'till' => 'required'
        ]);
        $news_id = News::select('id')->where('slug', $slug)->first();
        $data = new Featured();
        $data['news_id'] = $news_id->id;
        $data['till'] = $request->till;
        $data->save();
        return redirect()->back()->with('success','Added To Featured Section');
    }

    public function removeFeatured($slug){
        $news_id = News::select('id')->where('slug', $slug)->first();
        $data = Featured::where('news_id', $news_id->id)->first();
        $data->delete();
        return redirect()->back()->with('warning','Removed From Featured Section');
    }

    public function fileUpload($file, $path){
        $ext = $file->getClientOriginalExtension();
        $imageName = md5(microtime()) . '.' . $ext;
        if (!$file->move($path, $imageName)) {
            return redirect()->back();
        }
        return $imageName;
    }
}
