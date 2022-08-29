<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    public function update( Request $request)
    {
        // //
        // echo "<pre>";
        // var_dump($_POST);
        
    
        
        Setting::create($request->all());
        dd($request ->all());

        $validatedData = $request ->validate([
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'facebook'=>'nullable | string',
            'instagram'=>'nullable | string',
            'phone'=>'nullable | numeric',
            'email'=>'nullable | email',
        ]);

        $name =$request->file('image')->getClientOriginalName();

        $path = $request ->file('image')->store('public/images');

        return redirect()->route('dashboard.settings');



    

    
    } 
}
 