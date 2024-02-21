<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    function showDetailStore($id){
        $getData = DB::table('foods')->select('*')->where('id_store', $id)->get();
        return view('pages.store.detailstore',['getDataFoods' => $getData]);
    }

    function create(array $data)
    {
        return Store::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'role' => $data['role'],
        ]);
    }
    function registerUser(Request $request)
    {
        $request->validate([
            'email' => 'required:unique|min:6',
            'password' => 'required|min:6',
            'name' => 'required|min:6',
            'role' => 'required',
        ]);
        $data = $request->all();
        $this->create($data);
        return redirect()->route('loginstore')->with('Success', 'Signup Success');
    }
    function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required:unique|min:6',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboardstore')->withSuccess('Signed in');
        }
        return redirect("registerstore");
    }

    function listFoods()
    {
        $user = Auth::user();
        //$users = DB::table('foods')->paginate(4);
        $getData = DB::table('foods')->select('*')->where('id_store', $user->id)->get();
        return view('pages.store.dashboardstore', compact('getData'));
    }


    function createFood(array $data)
    {
        $user = Auth::user();
        return Food::create([
            'id_store' => $user->id,
            'name' => $data['name'],
            'description' => $data['description'],
            'category' => $data['category'],
            'price' => $data['price'],
            'img_food' => $data['img_food'],
        ]);
    }
    function registerFood(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'description' => 'required|min:6',
            'category' => 'required',
            'price' => 'required',
            'img_food' => 'required',
        ]);
        $file = $request->file('img_food');
        $path = 'uploads';
        $fileName = $file->getClientOriginalName();
        $file->move($path, $fileName);
        $data = $request->all();
        $data['img_food'] = $fileName;
        $this->createFood($data);
        return redirect()->route('dashboardstore');
    }

    function getFoodById(Request $request)
    {
        $id = $request->id;
        $getData = DB::table('foods')->select('*')->where('id', $id)->get();
        return view('pages.store.updatefood', ['getDataProductById' => $getData]);
    }

    function updateFood(Request $request)
    {

        if ($request->file('img_food') != null) {
            $file = $request->file('img_food');
            $path = 'uploads';
            $fileName = $file->getClientOriginalName();
            $file->move($path, $fileName);

            DB::table('foods')->where('id', $request->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'category' => $request->category,
                'price' => $request->price,
                'img_food' => $fileName,
            ]);
        } else {
            DB::table('foods')->where('id', $request->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'category' => $request->category,
                'price' => $request->price,
            ]);
        }

        return redirect()->route('dashboardstore');
    }
    function deleteFood(Request $request)
    {
        $id = $request->id;
        $getFood = DB::table('foods')->where('id', '=', $id)->get();
        DB::table('foods')->where('id', '=', $id)->delete();
        $img_path = './uploads/'.$getFood[0]->img_food;
        unlink($img_path);
        return redirect()->route('dashboardstore');
    }

    function searchFoodByName(Request $request)
    {
        $keyword = $request->keyword;
        $getData = DB::table('foods')->select('*')->where('name', 'LIKE', '%' . $keyword . '%')->get();
        return view('pages.store.dashboardstore', compact('getData'));
    }

    function getFoodByIdForDetailFood($id)
    {
        $getData = DB::table('foods')->select('*')->where('id', $id)->get();
        return view('pages.custommer.detailfood', ['getdata' => $getData]);
    }
}
