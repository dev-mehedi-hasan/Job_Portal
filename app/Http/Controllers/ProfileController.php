<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = User::where('id',Auth::user()->id)->first();
        return view('pages.user-profile.profile', compact('user'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.user-profile.edit-profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone_number' => ['required', 'string', 'max:11'],
            'date_of_birth' => ['required', 'date','before:2002-12-31'],
            'address' => ['required', 'string'],
        ]);

            if($request->file('pic') != null)
            {
                $validatedData = $request->validate([
                    'pic' => ['image', 'mimes:jpeg,jpg,png,gif', 'dimensions:min_width=300,min_height=300','max:100'],
                ]);
                $new_name = $request->input('name').$request->input('phone_number').rand(1,10). '.' .$request->file('pic')->getClientOriginalExtension();
                $request->file('pic')->move(public_path('image/user'),$new_name);
                $image_src = "/../Job_Portal/public/image/user/".$new_name;
            }

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->address = $request->input('address');
            if($request->file('pic') != null)
            {
                $user->pic = $image_src;
            }
        $user->save();
        return redirect()->back()->withErrors(['update' => 'Information Updated Successfully']);

    }

    public function destroy($id)
    {
        //
    }
}
