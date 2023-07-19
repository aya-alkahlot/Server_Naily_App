<?php

namespace App\Http\Controllers\Api\home;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeRequest;
use App\Models\home;
use Illuminate\Http\Request;
use Exception;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        try{
            $query =home::query();
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

    public function Insert(HomeRequest $request){
        // dd($request);
        try{
            $task =new home();
            $task ->Title=$request->Title;
            $task ->Paragraph=$request->Paragraph;
            $task ->banner=$request->banner;
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


    public function Delete(home $home){
        try{
            $home ->delete();
            return response()->json([
                'status_code'=>200,
                'status_message'=>'done',
                'data'=>$home
            ]);
        }catch(Exception $exeption){
            return response()->json($exeption);
                }
    }
    }
