<?php

namespace App\Http\Controllers;

use App\User;
use App\Photo;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::paginate(25);

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {   
        $user= new User;

        if($user->isAdmin()){
            return view('admin.user.create');
        }else{
            return abort(404);
        }

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|string',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required',
            'gender' => 'required|string'
        ]); 
           
        $user = User::create([
            'name'=> ucfirst($request->get('name')),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'phone' => $request->get('phone'),
            'gender' => ucfirst($request->get('gender')),
            'checkbox' => $request->get('checkbox') ? 1 : 0
        ]);

        if($user){
            return redirect()->back()->with('success', 'User has been added successfully');
        }else{
             return redirect()->back()->with('errors', 'Something went wrong, Please check the fields again.');
        }
    }


    public function show(User $user)
    {
        $user = User::findOrFail($user->id);
        return view('admin.user.show', compact('user'));
    }


    public function edit(User $user)
    {
        if($user->isAdmin()){
            $user = User::findOrFail($user->id);
            return view('admin.user.edit', compact('user')); 
        }else{
            return abort(404, 'Page not found');
        }
         
    }

    public function update(Request $request, User $user)
    {

       $this->validate($request,[
            'name'=> 'required',
            'password' => 'nullable|string|min:6|confirmed',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'birthDate' => 'required|date'
        ]);

        $user = User::findOrFail($user->id);
        $image = $request->imageUpload;
        $password = $request->get('password');
        $newPassword = $password ? Hash::make($password) : $user->password;

        if ($image) {
            $imageName = $image->getClientOriginalName();
            $FinalImageName = $user->name . '-' . $imageName;
            $imageFile = $image->move('images/user_img' , $FinalImageName);

            Photo::create(['path' => $imageFile,
                            'name' => $imageName,
                            'user_id' => $user->id
                            ]);

        }else if (!$image){
            $imageFile = $user->image;
        }


        $user->update(['name'=> ucfirst($request->get('name')),
                        'password' => $newPassword,
                        'phone' => $request->get('phone'),
                        'gender' => ucfirst($request->get('gender')),
                        'address' => ucfirst($request->get('address')),
                        'birthDate' => $request->get('birthDate'),
                    ]);


        if($user){
            return redirect()->back()->with('success', 'User has been updated successfully');
        }else{
             return redirect()->back()->with('errors', 'Something went wrong, Please check the fields again.');
        }

    }


    public function destroy(User $user)
    {
        if($user->isAdmin()){
            $user = User::findOrFail($user->id);
            $user->photo()->delete();
            $user->delete();
            return back()->with('success', 'User Has Been Deleted Successfully.');
        }else{
            return abort(404, 'Page not found');
        }

    }
}
