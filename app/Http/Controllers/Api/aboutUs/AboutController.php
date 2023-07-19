<?php

namespace App\Http\Controllers\Api\aboutUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Http\Requests\EditAboutUsRequest;
use App\Models\aboutUs;
use Exception;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        try{
            $query =aboutUs::query();
            $perPage=2;
            $page=$request->input('page',1);
            $search=$request->input('search');
            if($search){
                $query->where("Title","like",'%'.$search.'%');
            }
            $total=$query->count();
            $result=$query->offset(($page - 1) * $perPage)->limit($perPage)->get();
            return response()->json([
                'status_code'=>200,
                'status_message'=>'list of the contact Us',
                // 'data'=>contactUs::all()
                'current_page'=>$page,
                'last_page'=>ceil($total/$perPage),
                'items'=>$result
            ]);
        }catch(Exception $exeption){
            return response()->json($exeption);
                }
    }

    public function Insert(AboutUsRequest $request){
        // dd($request);
        try{
            $task =new aboutUs();
            $task ->Title=$request->Title;
            $task ->Paragraph=$request->Paragraph;
            $task ->Logo=$request->Logo;
            $task->save();
            return response()->json([
                'status_code'=>200,
                'status_message'=>'done',
                'data'=>$task
            ]);
        }catch(Exception $exeption){
            return response()->json($exeption);
                }
    }

    public function Update(EditAboutUsRequest $request ,aboutUs $aboutUs){
        try{
            // $task = contactUs::find($id);
            // // dd($id);
            $aboutUs->Title = $request->Title;
            $aboutUs->Paragraph = $request->Paragraph;
            $aboutUs->Logo = $request->Logo;
            $aboutUs->save();
            return response()->json([
                'status_code'=>200,
                'status_message'=>'done',
                'data'=>$aboutUs
            ]);
        }catch(Exception $exeption){
            return response()->json($exeption);
                }
    }
    public function Delete(aboutUs $aboutUs){
        try{
            $aboutUs ->delete();
            return response()->json([
                'status_code'=>200,
                'status_message'=>'done',
                'data'=>$aboutUs
            ]);
        }catch(Exception $exeption){
            return response()->json($exeption);
                }
    }
    }


