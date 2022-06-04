<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Exception;

class DataController extends Controller
{
    public function getByCategory($category){
        try {
            $data = Data::where('category',$category)->get();
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'msg' => $e->getMessage()
            ], 500);
        }


        if (count($data) > 0) {
            return response()->json([
                'status' => false,
                'msg' => 'Data dengan category ' . $category,
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Data dengan category ' . $category . ' tidak di temukan'
            ], 404);
        }
    }
}
