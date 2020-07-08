<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
class UsersController extends Controller
{
    public function __construct(){
        //create read update delete
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');

    }//end of constructor

    public function index(Request $request){
        // $users = User::whereRoleIs('admin')->where(function ($q) use ($request) {
        $users = User::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->search . '%')
                   ;
            });
        })->latest()->paginate(5);
        return view('dashboard.users.index', compact('users'));
    }//end of index

    public
    function create(){
        $roles=Role::all();
        return view('dashboard.users.create',compact('roles'));
    }//end of create

    public
    function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'required|confirmed',
            'role' => 'required'
        ]);
        $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
        $request_data['password'] = Hash::make($request->password);
        if ($request->image) {
            Image::make($request->image)
                ->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user_images/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }//end of if
        $user = User::create($request_data);
        $user->attachRole($request->role);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.users.index');
    }//end of store








    public
    function edit(User $user){
        $roles=Role::all();
        return view('dashboard.users.edit',compact('roles','user'));
    }//end of user

    public
    function update(Request $request, User $user){
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id),],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'role' => 'required'
        ]);
        $request_data = $request->except(['image']);
        if ($request->image) {
            if ($user->image != 'default.png') {
                Storage::disk('public_uploads')->delete('/user_images/' . $user->image);
            }//end of inner if
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user_images/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();

        }//end of external if
        $user->update($request_data);
        $user->detachRole($request->role);
        $user->attachRole($request->role);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.users.index');

    }//end of update

    public
    function destroy(User $user){
        if ($user->image != 'default.png') {
            Storage::disk('public_uploads')->delete('/user_images/' . $user->image);
        }//end of if
        $user->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.users.index');

    }//end of destroy
}//end of Class
