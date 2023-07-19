<?php

namespace App\Http\Controllers;

use App\Models\contactUs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class contactUsController extends Controller
{
    public function tableContactUs(){
        $contact_us=contactUs::get();
        return view('pages.tableContactUs',compact('contact_us'));
      }
    public function index(){
        return view('pages.contactUs');
    }

    public function Insert(Request $request){
         $request->validate([
            'FullName' => 'required',
            'Email' => 'required|email',
            'Massage' => 'required'
        ]);
       DB::table('contact_us')->insert([
        'FullName'=>$request->FullName,
         'Email'=>$request->Email,
         'Massage'=>$request->Massage
       ]);

       return redirect()->route('admin.contact.tableContactUs');
    }

    public function Delete($id){
        DB::table('contact_us')->where('id',$id)->delete();
           return redirect()->route('admin.contact.tableContactUs');
       }


    public function DeleteAll(){
        DB::table('contact_us')->delete();
           return redirect()->route('admin.contact.tableContactUs');
       }


       public function DeleteAllTruncate(){
        DB::table('contact_us')->truncate();
           return redirect()->route('admin.contact.tableContactUs');
       }


}
