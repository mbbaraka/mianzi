<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Mianzi\Product;
use App\Models\Mianzi\Wishlist;;
use App\Models\Mianzi\Compare;
use App\Models\Mianzi\Review;
use App\Models\Mianzi\ProductImage;
use App\Models\Mianzi\AttributeProduct;
use App\Models\Mianzi\RecentlyViewed;
use Alert;

class ProductController extends Controller
{
    public function index($slug)
    {
        $session = "";
    	$product = Product::where('slug', $slug)->first();
    	$category = $product->category()->get();
    	$image= ProductImage::where('product_id', $product->id)->get();
    	$attributes = AttributeProduct::where('product_id', $product->id)->get();
        $review =  Review::where('status', '1')->where('product_id', $product->id)->paginate(5);
    	foreach ($category as $categories) {
    	    $relatedproducts = $categories->product()->latest()->paginate(6);
    	}
        if (Auth::guard('customer')->check()) {
            $check = RecentlyViewed::where('product_id', $product->id)->where('customer_id', Auth::guard('customer')->id())->first();
            if (empty($check)) {
                $recent = new RecentlyViewed();
                $recent->product_id = $product->id;
                $recent->customer_id = Auth::guard('customer')->id();
                $recent->save();
            }
        }else{

            $session = Session::getId();
            Session::put('session_id',$session);
            $check = RecentlyViewed::where('product_id', $product->id)->where('customer_id', Session()->get('session_id'))->first();
            if (empty($check)) {

                $recent = new RecentlyViewed();
                $recent->product_id = $product->id;
                $recent->customer_id = Session()->get('session_id');
                $recent->save();
            }
            $session = Session()->get('session_id');
        }
        
    	return view('home.product.index', compact('product', 'image', 'attributes', 'relatedproducts', 'review', 'session'));
    }

    /// Add to wishlist
    public function addToWishlist(Request $request, $id)
    {
        if (!Auth::guard('customer')->check()) {
            toast('You must be logged in to add to wishlist', 'warning');
            return redirect()->route('login.html');
        }else{
            $wishlist = new Wishlist();
            $wishlist->product_id = $id;
            $wishlist->customer_id = Auth::guard('customer')->id();
            $save = $wishlist->save();

            if ($save) {
               toast('Successfully added to wishlist', 'success');
               return redirect()->back();
            }
        }
        
    }

    /// Add to compare
    public function addToCompare(Request $request, $id)
    {   
        if (!Auth::guard('customer')->check()) {
            toast('You must be logged in to add to wishlist', 'warning');
            return redirect()->route('login.html');
        }else{
            $check = Compare::where('product_id', $id)->first();
            if ($check) {
                toast('Product already in compare list', 'info');
                return redirect()->back();

            }else{
                $compare = new Compare();
                $compare->customer_id = Auth::guard('customer')->id();
                $compare->product_id = $id;
                $save = $compare->save();
            }
            toast('Product successfully added to compare list', 'success');
            return redirect()->back();

        }
    }

    public function compare()
    {
        $attribute = "";
        $compare = Compare::where('customer_id', Auth::guard('customer')->id())->get();
        foreach ($compare as $compares) {
            $attribute = AttributeProduct::where('product_id', $compares->product_id)->get();
        }
        return view('home.account.compare', compact('compare', 'attribute'));
    }

    public function destoyCompare($id)
    {
        $compare = Compare::find($id);
        if ($compare->delete()) {
            toast('Product successfully removed from compare list', 'success');
            return redirect()->back();
        }
    }
    /// Write Review
    public function addReview(Request $request)
    {
        $this->validate($request, [
            'review' => 'required|min:25',
        ]);

        $review = new Review();
        $review->customer_id = Auth::guard('customer')->id();
        $review->product_id = $request->product_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $save = $review->save();

        if ($save) {
            toast('Successfully added product review. Review will apear after approval', 'success');
            return redirect()->back();
        }
    }
}
