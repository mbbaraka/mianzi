<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mianzi\Shipping;
use App\Models\Mianzi\ShippingPrice;
use App\Models\Mianzi\District;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippings = Shipping::orderBy('id', 'DESC')->get();
        return view('admin.shipping.index', compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shipping.create');
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
            'name' => 'required|unique:shippings',
            'status' => 'required',
        ]);

        $shipping = new Shipping();
        $shipping->name = $request->name;
        $shipping->status = $request->status;
        $save = $shipping->save();
        if ($save) {
            toast('Successfully created shipping', 'success');
            return redirect()->route('shipping.index');
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
        $shipping = Shipping::where('id', $id)->first();
        return view('admin.shipping.edit', compact('shipping'));
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
            'name' => 'required|unique:shippings',
            'status' => 'required',
        ]);

        $shipping = Shipping::findOrFail($id);
        $shipping->name = $request->name;
        $shipping->status = $request->status;
        $save = $shipping->save();
        if ($save) {
            toast('Successfully updated shipping', 'success');
            return redirect()->route('shipping.index');
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
        $shipping = Shipping::findOrFail($id);
        if ($shipping->delete()) {
           toast("Shipping was deleted successfully", 'success');
           return redirect()->back();           
        }else{

            toast("Shipping failed to delete", 'error');
            return redirect()->back();
        }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // managing shipping prices
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function shippingPrice($title, $id)
    {
        $station = District::get();
        $price = ShippingPrice::where('shipping_id', $id)->latest()->get();
        return view('admin.shipping.shippingprice', compact('price', 'id', 'title', 'station'));
    }

    public function shippingPriceStore(Request $request)
    {
        $this->validate($request, [
            'station' => 'required',
            'fee' => 'required',
        ]);

        $price = new ShippingPrice();
        $price->fee = $request->fee;
        $price->station_id = $request->station;
        $price->shipping_id = $request->shipping;
        $save = $price->save();
        if ($save) {
            toast('Successfully created shipping price', 'success');
            return redirect()->back();
        }
    }

    public function shippingPriceDelete($id)
    {
        $price = ShippingPrice::find($id);

        if ($price->delete()) {
            toast('Successfully deleted shipping price', 'success');
            return redirect()->back();
        }
    }
}
