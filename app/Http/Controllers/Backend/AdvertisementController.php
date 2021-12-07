<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use File;

class AdvertisementController extends Controller
{
    public $path = 'backend.pages.';

    public function index(){
        $ads = Advertisement::all();
        return view($this->path.'advertisement.list', compact('ads'));
    }

    public function adCreate(Request $request){
        if ($request->isMethod('get')) {
            $ad = null;
            return view($this->path . 'advertisement.create', compact('ad'));
        }
        if ($request->isMethod('post')) {
            try {
                $data = new Advertisement();
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $uploadPath = public_path('uploads/ads/image/');
                    $data['image'] = $this->fileUpload($file, $uploadPath);
                }
                $data['url'] = $request->url;
                $data['caption'] = $request->caption;
                $data['status'] = $request->status;
                $data->save();
                return redirect()->route('ad.list')->with('success', 'Advertisement Created Successfully!');
            }catch (\Exception $e){
                return redirect()->back()->with('error', 'Make Sure All Required Fields are Filled!');
            }

        }
    }

    public function adEdit(Request $request, $id){
        if ($request->isMethod('get')) {
            $ad = Advertisement::where('id', $id)->first();
            return view($this->path . 'advertisement.edit', compact('ad'));
        }
        if ($request->isMethod('post')) {
            try {
                $data = Advertisement::where('id', $id)->first();

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $uploadPath = public_path('uploads/ads/image/');
                    File::delete($uploadPath.$data->image);
                    $data['image'] = $this->fileUpload($file, $uploadPath);
                }
                $data['url'] = $request->url;
                $data['caption'] = $request->caption;
                $data['status'] = $request->status;
                $data->update();
                return redirect()->route('ad.list')->with('success', 'Advertisement Edited Successfully!');
            }catch (\Exception $e){
                return redirect()->back()->with('error', 'Make Sure All Required Fields are Filled!');
            }

        }
    }

    public function adDelete(Request $request){
        $ad = Advertisement::where('id', $request->id)->first();
        File::delete(public_path('uploads/ads/image/').$ad->image);
        $ad->delete();
        return redirect()->route('ad.list')->with('warning', 'Advertisement Deleted Successfully!');
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
