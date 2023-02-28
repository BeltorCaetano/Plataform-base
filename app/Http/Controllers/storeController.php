<?php

namespace App\Http\Controllers;

use App\Models\fileModel;
use App\Models\lojaModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\throwException;

class storeController extends Controller
{
    function store(Request $request){
      
        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('txt')) {

            $request->validate([
                'txt' => 'mimes:txt|max:5128' // Only allow .jpg, .bmp and .png file types.
            ]);

            $filename =  $request->file('txt')->getClientOriginalName();
            $new_file = $request->file('txt')->storeAs('public/'.$filename); // store the file from the request

         
            
         
           
           // stores theb file locally in images folder
          
           if( fileModel::create(['file_path' => $filename]))
           {    
          
           // return view('converter',compact('filename'));
           }
         else{
            throw new Exception('something went terrible wrong');
         }
        }else{
            throw new Exception('no files');
        }
      
      
      
    }
  
}
