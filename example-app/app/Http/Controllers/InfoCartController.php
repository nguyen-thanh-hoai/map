<?php

namespace App\Http\Controllers;

use App\Models\InfoCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InfoCartController extends Controller
{
    function createInfoCart(array $data){
        $user = Auth::user();
        return InfoCart::create([
            'id_user' => $user->id,
            'email' => $data['email'],
            'number_phone' => $data['number_phone'],
            'address' => $data['address'],
            'status' => 1,
        ]);
    }
    function registerInfoCart(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'number_phone' => 'required',
            'address' => 'required|min:6',
        ]);
        $data = $request->all();
        $this->createInfoCart($data);
        $user = Auth::user();
        $getData = DB::table('info_carts')->select('*')->orderBy('updated_at', 'desc')->get();
        DB::table('carts')->where('id_user', $user->id)->where('status', '=',0)->update([
            'id_info_cart' => $getData[0]->id,
            'status' => 1,
        ]);
        return redirect()->route('send-mail');
    }
}
