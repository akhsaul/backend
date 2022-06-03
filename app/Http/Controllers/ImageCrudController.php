<?php

namespace App\Http\Controllers;

use App\Models\ImageCrud;
use Illuminate\Http\Request;

class ImageCrudController extends Controller
{
    public function create(Request $request)
    {
        $images=new ImageCrud();
        $request->validate([
            'title'=>'required',
            'image'=>'required|max:1024'
        ]);

        $images->title=$request->title;
        $images->image=$request->image;
        $result=$images->save();   
        if($result){
            return response()->json(['succes'=>true]);
        }else{
            return response()->json(['succes'=>false]);
        } 
    }
}
