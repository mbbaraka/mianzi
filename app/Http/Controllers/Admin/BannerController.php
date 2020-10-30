<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mianzi\Banner;
use Carbon\Carbon;
use Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::get();
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png,webp',
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'nullable',
            'button' => 'nullable',
            'url' => 'nullable', 
        ]);


        $file = $request->file('image');
         if (isset($file)) {
           $curentdate = Carbon::now()->toDateString();
                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                
              
                $file->move(storage_path('app\public\banner'), $imagename);
         }else{
          $imagename = "default.png";
         }

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->image = $imagename;
        $banner->description = $request->description;
        $banner->button = $request->button;
        $banner->url = $request->url;
        $banner->status = $request->status;
        $banner->type = $request->type;
        $save = $banner->save();
        if ($save) {
            toast('Banner created successfully', 'success');
            return redirect()->route('banners.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::Find($id);
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png,webp',
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'nullable',
            'button' => 'nullable',
            'url' => 'nullable', 
        ]);


        $banner = Banner::find($id);
        $file = $request->file('image');

        if (!empty($request->image)) {
             if (isset($file)) {
               $curentdate = Carbon::now()->toDateString();
                    $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                    if (file_exists('app/banner/'.$banner->image)) {
                            unlink('app/banner/'.$banner->image);
                          }
                  
                    $file->move(public_path('/app/banner'), $imagename);
             }else{
              $imagename = "default.png";
             }
         }else{
            $imagename = $banner->image;
         }

        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->image = $imagename;
        $banner->description = $request->description;
        $banner->button = $request->button;
        $banner->url = $request->url;
        $banner->status = $request->status;
        $banner->type = $request->type;
        $save = $banner->save();
        if ($save) {
            toast('Banner updated successfully', 'success');
            return redirect()->route('banners.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $delete = $banner->delete();

        if ($delete) {
            if (file_exists('app/banner/'.$banner->image)) {
                unlink('app/banner/'.$banner->image);
            } 
            toast('Banner deleted Successfully', 'success');
            return redirect()->back();
        }else{
            toast('Banner failed to be deleted', 'error');
            return redirect()->back();
        }
    }
}
