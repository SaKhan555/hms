<?php

namespace App\Http\Controllers;
use App\Country;
use Validator;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    $countries = Country::where('status','=','1')->orderBy('country','asc')->get();
    $countryList = Country::where('status','=','1')->pluck('country','id');
    return view('admin.country.index',compact('countries','countryList'));
}

public function load_data()
{
    $countries = Country::where('status','=','1')->orderBy('country','asc')->get();
    return view('admin.country.reload',compact('countries'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{


}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
        $validator = Validator::make($request->all(), [
            'country' => 'required|unique:countries|max:20',
        ]);

        if ($validator->fails()) {
            $json_obj  = ['error_msg' => 'check your validation or duplicate value'];
                return $json_obj;
        }

        // Store the blog post...


    $country = new Country;
    $country->user_id = Auth::user()->id;
    $country->country = $request->country;
    $country->save();
    if($country->save()){
        $json_obj = ['success' => true , 'id' => $country->id, 'name' => ucfirst($country->country)];
        return $json_obj;
    }else{
        $json_obj = ['success' => false];
        return $json_obj;
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



}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request)
{
        $validator = Validator::make($request->all(), [
            'country' => 'required|unique:countries|max:20',
        ]);

        if ($validator->fails()) {
            $json_obj  = ['error_msg' => 'check your validation or duplicate value'];
                return $json_obj;
        }
        // Store the blog post...
         $country = Country::where(['id'=>$request->id]
        )->first();
        $country->user_id = Auth::user()->id;
        $country->country = $request->country;
    $country->save();
    if($country->save()){
        $json_obj = ['success' => true , 'id' => $country->id, 'name' => ucfirst($country->country)];
        return $json_obj;
    }else{
        $json_obj = ['success' => false];
        return $json_obj;
    }

}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Request $request)
{
       // Store the blog post...
         $country = Country::where(['id'=>$request->id]
        )->first();
        $country->status = 0;
    $country->save();
    if($country->save()){
        return 'success';
    }else{
        return 'failed';
    }


}
}
