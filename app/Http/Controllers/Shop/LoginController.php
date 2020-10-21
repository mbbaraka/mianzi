<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use ShoppingCart;
use App\Models\Mianzi\Cart;
use App\UserLoginLog;
use App\Events\UserEvent;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showCustomerLogin()
    {
        return view('home.auth.login');
    }

    public function customerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {

            if (count(ShoppingCart::all()) > 0) {
                foreach (ShoppingCart::all() as $items) {
                $check = Cart::where('product_id', $items->id)->where('customer_id', Auth::guard('customer')->id())->first();
                if ($check) {
                    $cart = Cart::find($check->id);
                    $cart->customer_id = Auth::guard('customer')->id();
                    $cart->product_id = $items->id;
                    $cart->qty = $items->qty + $cart->qty;
                    $cart->price = $items->price;
                    $cart->save();

                }else{
                    $cart = new Cart();
                    $cart->customer_id = Auth::guard('customer')->id();
                    $cart->product_id = $items->id;
                    $cart->qty = $items->qty;
                    $cart->price = $items->price;
                    $cart->save();
                }
                    
                }
            }
            return redirect()->intended();
        }else{
            return redirect()->back()->withInput($request->only('email'))->with('error', 'Incorrect login details');
        }
    }

    function authenticated(Request $request, $user){        
        if(!Auth::check()){
            return view('errors.404');
        }
        event(new UserEvent($request,$user));      
    }
}
