<?php

namespace App\Http\Controllers;

use App\Models\partServices;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;


class ServicesController extends Controller
{

    public function index(Request $request)
    {
        $services = Services::with('parent')->orderBy('id', 'desc')->get();
        return view('pages.tableServices', compact('services'));
    }


    public function tableServices(){
        $services=Services::get();
        return view('pages.tableServices',compact('services'));
      }
      public function start(){
        return view("pages.services");
      }

      public function create()
      {
          $main_services = Services::whereNull('parent_id')->get(['id', 'title']);
          return view('pages.partServices',compact('main_services'));
      }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'Paragraph' => 'required',
            // 'banner'=> 'required|image|size:1024'
            'banner'=> 'required|image'

        ]);
        $service = new Services;
        $service->title = $request->input('title');
        $service->Paragraph = $request->input('Paragraph');
        if ($request->parent_id != "0") {
            $service->parent_id  =  $request->parent_id ;
        }
        if ($banner = $request->file('banner')) {
            $file_name = Str::slug($request->Title) . '.' . $banner->getClientOriginalExtension();
            $path = public_path('/assets/images/services/' . $file_name);
            Image::make($banner->getRealPath())->resize(202, 182, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $service->banner =  $file_name;
        }
        $service->save();
        return redirect()->route('service.services.tableServices');
    }

    public function DeleteAllTruncate(){
        DB::table('services')->truncate();
           return redirect()->route('service.services.tableServices');
       }
       public function Delete($id){
        DB::table('services')->where('id',$id)->delete();
           return redirect()->route('service.services.tableServices');
       }
       public function Edit(Request $request,$id)
       {

             $service = Services::findOrFail($id);
           $main_services = Services::whereNull('parent_id')->get(['id', 'title']);
           return view('pages.editServices',compact('service','main_services'));
       }

       public function Update(Request $request, $id)
       {
           $service = Services::findOrFail($id);
           $service->update([
               'title' => $request->title,
               'Paragraph' => $request->Paragraph,
               'parent_id' => $request->parent_id,
           ]);
           if ($banner = $request->file('banner')) {
               $file_name = Str::slug($request->Title) . '.' . $banner->getClientOriginalExtension();
               $path = public_path('/assets/images/services/' . $file_name);
               Image::make($banner->getRealPath())->resize(202, 182, function ($constraint) {
                   $constraint->aspectRatio();
               })->save($path, 100);
               $service->banner =  $file_name;
           }
           $service->save();
           return redirect()->route('service.services.tableServices');
       }

    }
