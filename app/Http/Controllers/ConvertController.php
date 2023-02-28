<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Mail\DemoMail;
use App\Models\fileModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;


class ConvertController extends Controller
{
    public function convertDocToPDF(Request $request){
      
        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('txt')) {

          $request->validate([
              'txt' => 'mimes:txt|max:5128' // Only allow .jpg, .bmp and .png file types.
          ]);

          $filename =  $request->file('txt')->getClientOriginalName();
          $new_file = $request->file('txt')->storeAs('public/'.$filename); // store the file from the request

       
          
       
         
         // stores theb file locally in images folder
        
         if( fileModel::create(['file_path' => $filename]) == false)
         {    
          throw new Exception('something went terrible wrong');
        
         // return view('converter',compact('filename'));
         }
     
      }else{
          throw new Exception('no files');
      }
    
    
    

 // from controller storeController above
 
        $domPdfPath = base_path('vendor/dompdf/dompdf');
      
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);//location of external libraries to use for Rendering PDF files
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');  //identify the external library to use for rendering Pdf files
        $pw = new \PhpOffice\PhpWord\PhpWord();
        $section = $pw->addSection(); // add a section that will be used to write the html content
        $out = Blade::render('template',[
          'body' =>  Storage::get('public/'.$filename)
        ]); 
       //Storage reads any file and converts it to string , for instance
       // render converts a blade template into a stringo  - the now string inside the body variable is being sent to the template and the template that has now the content of the file
       //is going to be later sent to to the html-pdf converter ( converting a txt file into html and then converting the html into pdf)
      // the same thing as doing this :  return view('template',['body' =>  Storage::get('public/'.$request->file_path)]); with the exception that it will no send an htttp request
        \PhpOffice\PhpWord\Shared\Html::addHtml($section,$out,false,false);     
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($pw,'PDF');
  $filename =       str_replace('.txt','.pdf',$filename);
        $PDFWriter->save('storage/'.$filename);
      
      $title = 'Mail from ItSolutionStuff.com';
      $body = 'This is for testing email using smtp.';
  
   
  Mail::to('caetanobeltor@gmail.com')->send(new DemoMail($title,$body,$filename));
     
  dd("Email is sent successfully.");
   }
}
