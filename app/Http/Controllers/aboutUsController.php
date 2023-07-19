<?php

namespace App\Http\Controllers;

use App\Models\aboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;


// OfferRequest
class aboutUsController extends Controller
{
    public function tableAbouttUs()
    {
        $about_us = aboutUs::get();
        return view('pages.tableAboutUs', compact('about_us'));
    }
    public function about(){
        return view('pages.about');
    }

    public function add(Request $request)
    {
        $request->validate([
            'Title' => 'required',
            'Paragraph' => 'required'
        ]);
        $aboutUs = new aboutUs;
        $aboutUs->Title = $request->input('Title');
        $aboutUs->Paragraph = $request->input('Paragraph');
        if ($banner = $request->file('Logo')) {
            $file_name = Str::slug($request->Title) . '.' . $banner->getClientOriginalExtension();
            $path = public_path('/assets/images/offers/' . $file_name);
            Image::make($banner->getRealPath())->resize(202, 182, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $aboutUs->Logo =  $file_name;
        }
        $aboutUs->save();
        return redirect()->route('aboutUs.about.tableAbouttUs');
    }


    public function Delete($id)
    {
        DB::table('about_us')->where('id', $id)->delete();
        return redirect()->route('aboutUs.about.tableAbouttUs');
    }


    public function Edit($id)
    {
        $about = DB::table('about_us')->where('id', $id)->first();
        return view('pages.editAbout', compact('about'));
    }


    public function Update(Request $request, $id)
    {
        $about = aboutUs::findOrFail($id);
        $about->update([
            'Title' => $request->Title,
            'Paragraph' => $request->Paragraph,
        ]);
        if ($banner = $request->file('Logo')) {
            $file_name = Str::slug($request->Title) . '.' . $banner->getClientOriginalExtension();
            $path = public_path('/assets/images/offers/' . $file_name);
            Image::make($banner->getRealPath())->resize(202, 182, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $about->Logo =  $file_name;
        }
        $about->save();
        return redirect()->route('aboutUs.about.tableAbouttUs');
    }


    public function DeleteAllTruncate()
    {
        DB::table('about_us')->truncate();
        return redirect()->route('aboutUs.about.tableAbouttUs');
    }
}
