<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mianzi\Region;
use App\Models\Mianzi\District;
use App\Models\Mianzi\PickupStation;
use Str;
class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $region = Region::latest()->get();
        return view('admin.region.index', compact('region'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.region.create');
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
            'name' => 'required|unique:regions',
        ]);

        $region = new Region();
        $region->name = $request->name;
        $save = $region->save();
        if ($save) {
            toast('Successfully created region', 'success');
            return redirect()->route('regions.index');
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
        $region = Region::findOrFail($id);
        return view('admin.region.edit', compact('region'));
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
            'name' => 'required',
        ]);

        $region = Region::findOrFail($id);
        $region->name = $request->name;
        $save = $region->save();
        if ($save) {
            toast('Successfully updated region', 'success');
            return redirect()->route('regions.index');
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
        $region = Region::findOrFail($id);
        if ($region->delete()) {
            toast('Successfully deleted region', 'success');
            return redirect()->back();
        }
    }
    ////

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////Manage districts ///////////////////////////////////////////////////////////////////////////////////////////////
    public function districts($id)
    {
        $region = Region::find($id);
        $district = District::latest()->where('region_id', $id)->get();
        return view ('admin.region.districts', compact('district', 'id', 'region'));
    }


    public function districtStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:districts',
            'region' => 'required',
        ]);

        $district = new District();
        $district->region_id = $request->region;
        $district->name = $request->name;
        $save = $district->save();
        if ($save) {
            toast('Successfully created district', 'success');
            return redirect()->back();
        }
    }

    public function districtEdit($id)
    {
        $district = District::find($id);
        return view('admin.region.districtEdit', compact('district'));
    }

    public function districtUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'region' => 'required',
        ]);

        $district = District::findOrFail($id);
        $district->region_id = $request->region;
        $district->name = $request->name;
        $save = $district->save();
        if ($save) {
            toast('Successfully updated district', 'success');
            return redirect()->route('districts.index', $district->id);
        }
    }

    public function districtDelete($id){
        $district = District::find($id);
        if ($district->delete()) {
            toast('Successfully deleted district', 'success');
            return redirect()->back();
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Pickup Stations ///////////////////////////////////////////////////////////////////////////////////////////

    public function pickupIndex(){
        $pickup = PickupStation::latest()->get();
        return view('admin.region.listPickups', compact('pickup'));
    }

    public function pickupStation($id)
    {
        $district = District::find($id);
        $pickup = PickupStation::latest()->where('district_id', $id)->get();
        return view('admin.region.pickups', compact('pickup', 'id', 'district'));
    }

    public function pickupStationStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'close_to' => 'required',
        ]);

        $pickup = new PickupStation();
        $pickup->district_id = $request->district;
        $pickup->name = $request->name;
        $pickup->address = $request->address;
        $pickup->close_to = $request->close_to;
        $save = $pickup->save();
        if ($save) {
            toast('Successfully updated district', 'success');
            return redirect()->back();
        }        
    }

    public function pickupStationDelete($id)
    {
        $pickup = PickupStation::find($id);
        if ($pickup->delete()) {
            toast('Successfully deleted pickup station', 'success');
            return redirect()->back();
        } 
    }
}
