<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tableHome()
    {
        $homes = home::get();
        return view('pages.tableHome', compact('homes'));
    }
    public function home(){
        return view('pages.home');
    }
    public function Insert(Request $request)
    {
        $request->validate([
            'Title' => 'required',
            'Paragraph' => 'required'
        ]);
        $homes = new home;
        $homes->Title = $request->input('Title');
        $homes->Paragraph = $request->input('Paragraph');
        if ($banner = $request->file('banner')) {
            $file_name = Str::slug($request->Title) . '.' . $banner->getClientOriginalExtension();
            $path = public_path('/assets/images/homes/' . $file_name);
            Image::make($banner->getRealPath())->resize(202, 182, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $homes->banner =  $file_name;
        }
        $homes->save();
        return redirect()->route('home.content.tableHome');
    }

    public function Delete($id)
    {
        DB::table('homes')->where('id', $id)->delete();
        return redirect()->route('home.content.tableHome');
    }

    public function DeleteAllTruncate()
    {
        DB::table('homes')->truncate();
        return redirect()->route('home.content.delete.all.truncate');
    }
}
