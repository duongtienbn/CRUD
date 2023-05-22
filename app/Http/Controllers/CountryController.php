<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;
use App\Models\Countries;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function index()
    {
        $countries = DB::table('countries')->get();
        return response()->json($countries);
    }



    public function storeCountry(Request $request)
    {
        $data = $request->input('newCountry');
        // $country = new Countries();
        // $country->name = $data;
        // $country->save();

        DB::table('countries')->insert([
            'name' => $data,
        ]);   

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }
    
    public function destroy(Request $request){
        $data = $request->input('delCountry');
        $countries = DB::table('countries')->where('name','=',$data);
        $countries->delete();
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
}
}