<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index(){
        return view('pages.dashboard');
    }
    public function tableLink(){
        $links=link::get();
        return view('pages.tableLink',compact('links'));
      }
    public function add(Request $request)
    {
        $request->validate([
            'Title' => 'required',
            'Link' => 'required|url'
        ]);
        $link = new link;
        $link->Title = $request->input('Title');
        $link->Link = $request->input('Link');
        if ($banner = $request->file('banner')) {
            $file_name = Str::slug($request->Title) . '.' . $banner->getClientOriginalExtension();
            $path = public_path('/assets/images/setting/' . $file_name);
            Image::make($banner->getRealPath())->resize(202, 182, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $link->banner =  $file_name;
        }
        $link->save();
        return redirect()->route('dashboard.link.tableLink');
    }

    public function DeleteAllTruncate(){
        DB::table('links')->truncate();
           return redirect()->route('dashboard.link.tableLink');
       }
       public function Delete($id){
        DB::table('links')->where('id',$id)->delete();
           return redirect()->route('dashboard.link.tableLink');
       }


       public function Edit($id)
       {
           $link = DB::table('links')->where('id', $id)->first();
           return view('pages.editLink', compact('link'));
       }

       public function Update(Request $request, $id)
       {
           $link = link::findOrFail($id);
           $link->update([
            'Title' => $request->Title,
            'Link' => $request->Link,
           ]);
           if ($banner = $request->file('banner')) {
               $file_name = Str::slug($request->Title) . '.' . $banner->getClientOriginalExtension();
               $path = public_path('/assets/images/setting/' . $file_name);
               Image::make($banner->getRealPath())->resize(202, 182, function ($constraint) {
                   $constraint->aspectRatio();
               })->save($path, 100);
               $link->banner =  $file_name;
           }
           $link->save();
           return redirect()->route('dashboard.link.tableLink');
       }


}
