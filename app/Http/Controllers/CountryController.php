<?php

namespace App\Http\Controllers;

use App\Models\CountryModel;
use validator;

use Illuminate\Http\Request;
use LDAP\Result;

class CountryController extends Controller
{

    public function countryapi()
    {
        // $count=CountryModel::all();
        // return response()->json($count,200);

        return response()->json(CountryModel::get(), 200);
    }

    public function countryapi_id($id)
    {
        $country=CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message"=>"Record not found"],404);
        }
        return response()->json(CountryModel::find($id), 200);
    }

    public function countrysave(Request $request)
    {

        $rules=[
            'name'=>'required|min:3',
            'iso'=>'required|min:2',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }


        $country = new CountryModel();
        $country->iso = $request->iso;
        $country->name = $request->name;
        $country->dname = $request->dname;
        $country->iso3 = $request->iso3;
        $country->position = $request->position;
        $country->numcode = $request->numcode;
        $country->phonecode = $request->phonecode;
        $country->created = $request->created;
        $country->register_by = $request->register_by;
        $country->modified = $request->modified;
        $country->modified_by = $request->modified_by;
        $country->save();

        return response()->json($country, 201);

    }

    public function countryedit(Request $request, $id)
    {
        $country=CountryModel::find($id);
        if(is_null($country)){//for validation
            return response()->json(["message"=>"Record not found"],404);
        }
        $country->update($request->all());
        return response($country, 201);
    }

    public function countrydelete(Request $request, $id)
    {
        $country=CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message"=>"Record not found"],404);
        }
        $country->delete();
        return response($country, 204);
    }
}
