<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    function getDataShowIndex()
    {
        $role = 2;
        $getDataStore = DB::table('users')->select('*')->where('role', $role)->get();
        $getDataFoodsRandom = Food::inRandomOrder()->limit(5)->get();
        return view('pages.custommer.index', ['getDataStore' => $getDataStore, 'getDataFoods' => $getDataFoodsRandom,]);
    }

    function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

    function createUser(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'role' => $data['role'],
        ]);
    }
    function registerUser(Request $request)
    {
        $request->validate([
            'email' => 'required:unique|min:6',
            'password' => 'required|min:6',
            'username' => 'required|min:6',
            'role' => 'required',
        ]);
        $data = $request->all();
        $this->createUser($data);
        return redirect()->route('login')->with('Success', 'Signup Success');
    }
    function createStore(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'role' => $data['role'],
        ]);
    }
    function registerStore(Request $request)
    {

        $file = $request->file('img_store');
        $path = 'uploads';
        $fileName = $file->getClientOriginalName();
        $file->move($path, $fileName);
        $role = 2;

        DB::table('users')->where('id', $request->id)->update([
            'namestore' => $request->namestore,
            'img_store' => $fileName,
            'role' => $role,
        ]);

        return redirect()->route('login')->with('Success', 'Signup Success');
    }
    function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required:unique|min:6',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 2) {
                $getData = DB::table('foods')->select('*')->where('id_store', $user->id)->get();
                return view('pages.store.dashboardstore', compact('getData'));
            }
            else if($user->role == 1){
                $getDataStore = DB::table('users')->select('*')->where('role', 2)->get();
                return view('pages.admin.dashboardadmin', compact('getDataStore'));
            }
            return redirect()->route('index')->withSuccess('Signed in');
        }
        return redirect("register");
    }

    function listUser()
    {
        $users = DB::table('user')->paginate(4);
        return view('pages.dashboarduser', compact('users'));
    }

    function getUserById($id)
    {
        $getData = DB::table('users')->select('*')->where('id', $id)->get();
        return view('pages.store.registerstore', ['getDataById' => $getData,]);
    }
    function listFoodShowDashboard()
    {
        $user = Auth::user();
        $getData = DB::table('foods')->select('*')->where('id_store', $user->id)->get();
        return view('pages.store.dashboardstore', compact('getData'));
    }
}
