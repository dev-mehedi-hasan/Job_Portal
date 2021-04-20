<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = User::latest()->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit genric-btn primary radius"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
                        $button .= '&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete genric-btn danger radius"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.user');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'phone_number' => ['required', 'string',  'max:11'],
            'date_of_birth' => ['required', 'date','before:2002-12-31'],
            'address' => ['required', 'string'],
            'pic' => ['required', 'image', 'dimensions:min_width=300,min_height=300','max:100']
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $image = $request->file('pic');
        $new_name = $request->name.$request->phone_number. '.' . $image->getClientOriginalExtension();
        $image->move(public_path('image/user'), $new_name);
        $image_src = "/../Job_Portal/public/image/user/".$new_name;

        $form_data = array(
            'name'         =>  $request->name,
            'email'        =>  $request->email,
            'password'=> bcrypt('123456'),
            'is_admin'         =>  $request->role,
            'phone_number'         =>  $request->phone_number,
            'date_of_birth'         =>  $request->date_of_birth,
            'address'         =>  $request->address,
            'pic'             =>  $image_src
        );

        User::create($form_data);
        return response()->json(['success' => 'A user has been added successfully.']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = User::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
        $image_src = $request->hidden_image;
        $pic = $request->file('pic');
            if ($pic != '')
            {
                $rules = array(
                    'pic' =>  ['required', 'image', 'dimensions:min_width=300,min_height=300','max:100'],
                );
                $error = Validator::make($request->all(), $rules);
                if ($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }
                File::delete($image_src);
                $new_name = $request->name.$request->phone_number . '.' . $pic->getClientOriginalExtension();
                $pic->move(public_path('image/user'), $new_name);
                $image_src = "/../Job_Portal/public/image/user/".$new_name;
            }
        $rules = array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required'],
            'phone_number' => ['required', 'string',  'max:11'],
            'date_of_birth' => ['required', 'date','before:2002-12-31'],
            'address' => ['required', 'string'],
        );

        $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

        $form_data = array(
            'name'         =>  $request->name,
            'email'        =>  $request->email,
            'is_admin'         =>  $request->role,
            'phone_number'         =>  $request->phone_number,
            'date_of_birth'         =>  $request->date_of_birth,
            'address'         =>  $request->address,
            'pic'             =>  $image_src
        );
        User::whereId($request->hidden_id)->update($form_data);
        return response()->json(['success' => 'A user has been successfully updated']);
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
    }
}
