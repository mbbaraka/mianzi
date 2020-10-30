<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mianzi\Product;
use App\Models\Mianzi\Category;
use App\Models\Mianzi\ProductImage;
use App\Models\Mianzi\Attribute;
use App\Models\Mianzi\AttributeProduct;
use Carbon\Carbon;
use Alert;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::latest()->get();
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'type' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp',
            'qty' => 'required',
            'description' => 'nullable',
            'information' => 'nullable',
            'date' => 'nullable',
            'status' => 'required',
            'featured' => 'nullable',
            'sale_price' => 'nullable',
            'category' => 'required',
            'price' => 'required',

        ]);


         $file = $request->file('image');
         if (isset($file)) {
           $curentdate = Carbon::now()->toDateString();
                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                
              
                $file->move(public_path('app\public\product'), $imagename);
         }else{
          $imagename = "default.png";
         }

        if (isset($request->featured)) {
            $featured = '1';
        }else{
            $featured = '0';
        }

       $product = new Product();
       $product->title = $request->title;
       $product->type = $request->type;
       $product->cover = $imagename;
       $product->sale_price = $request->sale_price;
       $product->qty = $request->qty;
       $product->description = $request->description;
       $product->information = $request->information;
       $product->publish_date = $request->date;
       $product->price = $request->price;
       $product->status = $request->status;
       $product->featured = $featured;
       $product->sku =  Str::random($length = 10);
       $product->save();

       $pdt_slug = Product::findOrFail($product->id);
       $pdt_slug->slug = Str::slug($request->title.'-'.$product->id);
       $pdt_slug->save();

       if ($request->category > 0) {
         // foreach ($request->category as $categories) {
         //     $category = new CategoryProduct();
         //     $category->product_id = $product->id;
         //     $category->category_id = $categories;
         //     $category->save();
         // }
        $product->category()->sync($request->input('category',[]));
       }

       if ($request->file('images') > 0) {
          foreach ($request->images as $image) {
                $curentdate = Carbon::now()->toDateString();
                $imagenames = $product->subtitle . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('app\public\product\gallery'), $imagenames);

                $product_image = new Productimage();
                $product_image->product_id = $product->id;
                $product_image->image = $imagenames;
                $product_image->save();
                 
            }
       }
       toast('Product created Successfully','success');
       return redirect()->route('products.index');
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
        $product = Product::find($id);
        $categories = Category::get();
        $image = ProductImage::where('product_id', $id)->get();
        return view('admin.product.edit', compact('product', 'image', 'categories'));
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
        $this->validate($request,[
            'title' => 'required',
            'type' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,webp',
            'qty' => 'required',
            'description' => 'nullable',
            'information' => 'nullable',
            'date' => 'nullable',
            'status' => 'required',
            'featured' => 'nullable',
            'sale_price' => 'nullable',
            'category' => 'required',
            'price' => 'required',

        ]);

         if (isset($request->featured)) {
            $featured = '1';
        }else{
            $featured = '0';
        }
        $product = Product::find($id);

         if (!empty($request->image)) {
               $file = $request->file('image');
               if (isset($file)) {
                 $curentdate = Carbon::now()->toDateString();
                      $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                      
                      if (file_exists('app/product/'.$product->cover)) {
                        unlink('app/product/'.$product->cover);
                      }
                      $file->move(public_path().'/app/product/', $imagename);
               }
        }else{
            $imagename = $product->cover;
        }

       $product->title = $request->title;
       $product->type = $request->type;
       $product->cover = $imagename;
       $product->sale_price = $request->sale_price;
       $product->qty = $request->qty;
       $product->description = $request->description;
       $product->information = $request->information;
       $product->publish_date = $request->date;
       $product->price = $request->price;
       $product->status = $request->status;
       $product->featured = $featured;
       $product->slug = Str::slug($product->title.'-'.$product->id);
       $product->save();


       if ($request->category > 0) {
         // foreach ($request->category as $categories) {
         //     $category = new CategoryProduct();
         //     $category->product_id = $product->id;
         //     $category->category_id = $categories;
         //     $category->save();
         // }
        $product->category()->sync($request->input('category',[]));
       }

       if (!empty($request->images)) {
          if ($request->file('images') > 0) {
              foreach ($request->images as $image) {
                    $curentdate = Carbon::now()->toDateString();
                    $imagenames = $product->subtitle . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                    $image->move(public_path('app/product/gallery'), $imagenames);

                    $product_image = new Productimage();
                    $product_image->product_id = $product->id;
                    $product_image->image = $imagenames;
                    $product_image->save();
                     
                }
           }
       }
       toast('Product updated Successfully','success');
       return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $delete = $product->delete();

        if ($delete) {
            if (file_exists('app/product/'.$product->cover)) {
                unlink('app/product/'.$product->cover);
            } 
            toast('Product deleted Successfully', 'success');
            return redirect()->back();
        }else{
            toast('Product failed to be deleted', 'error');
            return redirect()->back();
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /// Remove image ///

    public function removeImage($id)
    {
        $image = ProductImage::findOrFail($id);
        $delete = $image->delete();
        if ($delete) {
            if (file_exists('app/product/gallery/'.$image->image)) {
                unlink('app/product/gallery/'.$image->image);
            }
            toast('Image deleted Successfully', 'success');
            return redirect()->back();
        }else{
            toast('Image failed to be deleted', 'error');
            return redirect()->back();
        }
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    ///////////// Managing Product attributes ////////////////////////////////////////////////////////////////////////////////

    public function attributes($id)
    {

        $attributes = Attribute::latest()->get();
        $item = AttributeProduct::where('product_id', $id)->get();
        return view('admin.product.attributes', compact('id', 'attributes', 'item'));
    }

    public function productAttributeStore(Request $request){
      $this->validate($request,[
            'attributeValue' => 'required',
            'product_id' => 'required',

        ]);

       foreach ($request->attributeValue as $attributeValue) {
            $check = AttributeProduct::where('attribute_value_id', $attributeValue)->where('product_id', $request->product_id)->first();
              if ($check) {
                    toast('Attribute value already exists','warning');
                    return redirect()->back();
                }else{
                    $value = new AttributeProduct();
                    $value->attribute_value_id = $attributeValue;
                    $value->product_id = $request->product_id;
                    $value->save();

                }
        }
        
        toast('Attribute value created Successfully','success');
        return redirect()->back();
       
    }

    public function productAttributeDestroy($id)
    {
        $value = AttributeProduct::findOrFail($id);
        if ($value->delete()) {
          toast('Attribute value deleted Successfully','success');
          return redirect()->back();
        }
    }
}
