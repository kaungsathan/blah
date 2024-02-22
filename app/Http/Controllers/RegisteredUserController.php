<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\RegisteredUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class RegisteredUserController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $users = RegisteredUser::query();
            return Datatables::of($users)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('registered-users.index');
    }

    public function create()
    {
        return view("registered-users.create");
    }

    public function store(RegisterUserRequest $request)
    {
        if ($request->ajax()) {
            RegisteredUser::create($request->validated());

            return response()->json(["message" => "Registered Successfully"]);
        }

        throw ValidationException::withMessages(["only ajax requests are allowed"]);
    }
}
