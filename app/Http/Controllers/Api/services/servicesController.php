<?php

namespace App\Http\Controllers\Api\services;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditServicesRequest;
use App\Http\Requests\ServicesRequest;
use App\Models\Services;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class servicesController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Services::query();
            $perPage = 2;
            $page = $request->input('page', 1);
            $search = $request->input('search');
            if ($search) {
                $query->where("Paragraph", "like", '%' . $search . '%');
            }
            $total = $query->count();
            $result = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
            return response()->json([
                'status_code' => 200,
                'status_message' => 'list of the contact Us',
                // 'data'=>contactUs::all()
                'current_page' => $page,
                'last_page' => ceil($total / $perPage),
                'items' => $result
            ]);
        } catch (Exception $exeption) {
            return response()->json($exeption);
        }
    }

    public function Insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'parent_id' => 'nullable',
            'Paragraph' => 'required',
            'banner' => 'nullable',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $service = Services::create([

            'title' => $request->title,
            'parent_id' => $request->parent_id,
            'Paragraph' => $request->Paragraph,
            'banner' => $request->banner,
        ]);

        return response()->json([
            'status_code' => 200,
            'status_message' => 'done',
            'data' => $service
        ]);
    }

    public function Update(EditServicesRequest $request, Services $Services)
    {
        try {
            // $task = contactUs::find($id);
            // // dd($id);
            $Services->title = $request->title;
            if ($request->parent_id != "0") {
                $Services->parent_id  =  $request->parent_id;
            }
            $Services->Paragraph = $request->Paragraph;
            $Services->banner = $request->banner;
            $Services->save();
            return response()->json([
                'status_code' => 200,
                'status_message' => 'done',
                'data' => $Services
            ]);
        } catch (Exception $exeption) {
            return response()->json($exeption);
        }
    }
    public function Delete(Services $Services)
    {
        try {
            $Services->delete();
            return response()->json([
                'status_code' => 200,
                'status_message' => 'done',
                'data' => $Services
            ]);
        } catch (Exception $exeption) {
            return response()->json($exeption);
        }
    }
}
