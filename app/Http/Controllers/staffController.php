<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class staffController extends Controller
{
    public function index()
    {
        $staffName = DB::table('interv_staffs')->get();
        return response()->json($staffName);
    }

    function storeStaff(Request $request)
    {
        $data = $request->input('newStaff');
        DB::table('interv_staffs')->insert([
            'name' => $data
        ]);
    
    return response()->json([
        'data' => $data
    ]);
}
}
