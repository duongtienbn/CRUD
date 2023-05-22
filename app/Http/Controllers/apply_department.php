<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class apply_department extends Controller
{
    public function index(){
        $department = DB::table('apply_departments')->get();
        return response()->json($department);
    }
    public function store_department(Request $request){
        $data = $request->input('newApply');
        DB::table('apply_departments')->insert(['departments'=> $data,]);
    
    return response()->json([
        'data' => $data
    ]);
    }

    

}