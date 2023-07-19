<?php

namespace App\Http\Controllers\Api\links;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditLinkRequest;
use App\Http\Requests\LinkRequest;
use App\Models\link;
use Illuminate\Http\Request;
use Exception;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        try{
            $query =link::query();
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

    public function Insert(LinkRequest $request){
        // dd($request);
        try{
            $task =new link();
            $task ->Title=$request->Title;
            $task ->Link=$request->Link;
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

    public function Update(EditLinkRequest $request ,link $link){
        try{
            // $task = contactUs::find($id);
            // // dd($id);
            $link->Title = $request->Title;
            $link->Link = $request->Link;
            $link->banner = $request->banner;
            $link->save();
            return response()->json([
                'status_code'=>200,
                'status_message'=>'done',
                'data'=>$link
            ]);
        }catch(Exception $exeption){
            return response()->json($exeption);
                }
    }
    public function Delete(link $link){
        try{
            $link ->delete();
            return response()->json([
                'status_code'=>200,
                'status_message'=>'done',
                'data'=>$link
            ]);
        }catch(Exception $exeption){
            return response()->json($exeption);
                }
    }
    }
