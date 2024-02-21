<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
class AdminController extends Controller
{
    function showDashboardAdmin()
    {
        $getDataStore = DB::table('users')->select('*')->where('role', 2)->get();
        return view('pages.admin.dashboardadmin', compact('getDataStore'));
    }

    function getStoreById(Request $request)
    {
        $id = $request->id;
        $getDataStoreById = DB::table('users')->select('*')->where('id', '=', $id)->get();
        return view('pages.admin.updatestore', ['getDataStore' => $getDataStoreById]);
    }

    function updateStore(Request $request)
    {
        if ($request->file('img_store') != null && $request->password != null) {
            $file = $request->file('img_store');
            $path = 'uploads';
            $fileName = $file->getClientOriginalName();
            $file->move($path, $fileName);

            DB::table('users')->where('id', $request->id)->update([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'namestore' => $request->namestore,
                'img_store' => $request->$fileName,
                'role' => $request->role,
            ]);
        } else if ($request->file('img_store') == null && $request->password != null) {
            DB::table('users')->where('id', $request->id)->update([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'namestore' => $request->namestore,
                'role' => $request->role,
            ]);
        } else if ($request->file('img_store') != null && $request->password == null) {
            $file = $request->file('img_store');
            $path = 'uploads';
            $fileName = $file->getClientOriginalName();
            $file->move($path, $fileName);
            DB::table('users')->where('id', $request->id)->update([
                'email' => $request->email,
                'username' => $request->username,
                'namestore' => $request->namestore,
                'img_store' => $request->$fileName,
                'role' => $request->role,
            ]);
        } else if ($request->file('img_store') == null && $request->password == null) {

            DB::table('users')->where('id', $request->id)->update([
                'email' => $request->email,
                'username' => $request->username,
                'namestore' => $request->namestore,
                'role' => $request->role,
            ]);
        }
        return redirect()->route('dashboardadmin');
    }
    function deleteStore(Request $request)
    {
        $id = $request->id;
        $store = DB::table('users')->where('id', '=', $id)->get();
        if ($store != null) {
            DB::table('users')->where('id', '=', $id)->delete();
            DB::table('foods')->where('id_store', '=', $id)->delete();
            $imagePath = './uploads/'.$store[0]->img_store;
            unlink($imagePath);
        }
        return redirect()->route('dashboardadmin');
    }

    function searchStoreByEmail(Request $request)
    {
        $keyword = $request->keyword;
        $getDataStore = DB::table('users')->select('*')->where('email', 'LIKE', '%' . $keyword . '%')->where('role', '=', 2)->get();
        return view('pages.admin.dashboardadmin', compact('getDataStore'));
    }
}
