<?php

namespace App\Http\Controllers\Api\contactUs;

use App\Http\Requests\ContactUsRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditContactUsRequest;
use App\Models\contactUs;
use Exception;
use Illuminate\Http\Request;

class TaskContactController extends Controller
{

    public function index(Request $request)
    {
        try{
            $query =contactUs::query();
            $perPage=2;
            $page=$request->input('page',1);
            $search=$request->input('search');
            if($search){
                $query->where("FullName","like",'%'.$search.'%');
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

    public function Insert(ContactUsRequest $request){
        // dd($request);
        try{
            $task =new contactUs();
            $task ->FullName=$request->FullName;
            $task ->Email=$request->Email;
            $task ->Massage=$request->Massage;
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

    public function Update(EditContactUsRequest $request ,contactUs $contactUs){
        try{
            // $task = contactUs::find($id);
            // // dd($id);
            $contactUs->FullName = $request->FullName;
            $contactUs->Email = $request->Email;
            $contactUs->Massage = $request->Massage;
            $contactUs->save();
            return response()->json([
                'status_code'=>200,
                'status_message'=>'done',
                'data'=>$contactUs
            ]);
        }catch(Exception $exeption){
            return response()->json($exeption);
                }
    }
    public function Delete(contactUs $contactUs){
        try{
            $contactUs ->delete();
            return response()->json([
                'status_code'=>200,
                'status_message'=>'done',
                'data'=>$contactUs
            ]);
        }catch(Exception $exeption){
            return response()->json($exeption);
                }
    }
    }
