<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mianzi\Attribute;
use App\Models\Mianzi\AttributeValue;
use Carbon\Carbon;
use Alert;
use Auth;
use Str;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attribute = Attribute::orderBy('id', 'DESC')->get();
        return view('admin.attribute.index', compact('attribute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribute.create');
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
            'name' => 'required|unique:attributes',
        ]);

        $attribute = new Attribute();
        $attribute->name = $request->name;
        $save = $attribute->save();
        if ($save) {
            toast('Successfully created attribute', 'success');
            return redirect()->route('attributes.index');
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
        $attribute = Attribute::where('id', $id)->first();
        return view('admin.attribute.edit', compact('attribute'));
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

       
        $attribute = Attribute::findOrFail($id);
        $attribute->name = $request->name;
        $save = $attribute->save();
        if ($save) {
            toast("$attribute->title was updated successfully", 'success');
            return redirect()->route('attributes.index');
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
        $attribute = Attribute::findOrFail($id);
        if ($attribute->delete()) {
           toast("Attribute was deleted successfully", 'success');
           return redirect()->back();           
        }else{

            toast("Attribute failed to delete", 'error');
            return redirect()->back();
        }
    }




////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Managing subscategories
///////////////////////////////////////////////////////////////////////////////////////////////////////

    public function values($title, $id)
    {
        $values = AttributeValue::where('attribute_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.attribute.values', compact('values', 'id', 'title'));
    }

    public function storeValue(Request $request)
    {
        $this->validate($request, [
            'value' => 'required|unique:attribute_values',
        ]);

        $value = new AttributeValue();
        $value->attribute_id = $request->attribute;
        $value->value = $request->value;
        $save = $value->save();
        if ($save) {
            toast("Attribute value was created successfully", 'success');
            return redirect()->back();
        }
    }

    public function destroyValue($id)
    {
        $attribute = AttributeValue::findOrFail($id);
        if ($attribute->delete()) {
           toast("Value was deleted successfully", 'success');
           return redirect()->back();           
        }else{

            toast("Value failed to delete", 'error');
            return redirect()->back();
        }
    }
}
