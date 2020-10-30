<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mianzi\Category;
use Carbon\Carbon;
use Alert;
use Auth;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'title' => 'required|unique:categories',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp',
        ]);

        $file = $request->file('image');
         if (isset($file)) {
           $curentdate = Carbon::now()->toDateString();
                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
               
                $file->move(public_path('/app/category'), $imagename);
         }else{
          $imagename = "default.png";
         }

        $category = new Category();
        $category->title = $request->title;
        $category->root = '0';
        $category->slug = Str::slug($request->title);
        $category->thumbnail = $imagename;
        $save = $category->save();
        if ($save) {
            toast('Successfully created category', 'success');
            return redirect()->route('categories.index');
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
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
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
            'title' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,webp',
        ]);

        if (!empty($request->file('image'))) {
            $file = $request->file('image');
             if (isset($file)) {
               $curentdate = Carbon::now()->toDateString();
                    $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                    $file->move(public_path('/app/category'), $imagename);
             }else{
              $imagename = "default.png";
             }
         }else{
            $imagename = Category::where('id', $id)->first()->image_url;
         }


        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->root = '0';
        $category->slug = Str::slug($request->title);
        $category->thumbnail = $imagename;
        $save = $category->save();
        if ($save) {
            toast("$category->title was updated successfully", 'success');
            return redirect()->route('categories.index');
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
        $category = Category::findOrFail($id);
        if ($category->delete()) {
          
            if (file_exists('app/category/'.$category->thumbnail)) {
                unlink('app/category/'.$category->thumbnail);
                toast("category was deleted successfully", 'success');
                return redirect()->back();
            }else{
                toast("category was deleted successfully", 'success');
                return redirect()->back();
            }
        }else{

            toast("category failed to delete", 'error');
            return redirect()->back();
        }
    }




////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Managing subscategories
///////////////////////////////////////////////////////////////////////////////////////////////////////

    public function subcategories($title, $id)
    {
        $subcategory = Category::where('root', $id)->orderBy('id', 'DESC')->get();
        return view('admin.category.subcategories', compact('subcategory', 'id', 'title'));
    }

    public function storeSubcategories(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:categories',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp',
        ]);

        $file = $request->file('image');
         if (isset($file)) {
           $curentdate = Carbon::now()->toDateString();
                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
               
                $file->move(public_path('/app/category'), $imagename);
         }else{
          $imagename = "default.png";
         }

        $category = new Category();
        $category->title = $request->title;
        $category->root = $request->root;
        $category->slug = Str::slug($request->title);
        $category->thumbnail = $imagename;
        $save = $category->save();
        if ($save) {
            toast("category was created successfully", 'success');
            return redirect()->back();
        }
    }
}
