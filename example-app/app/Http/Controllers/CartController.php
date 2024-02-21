<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CartController extends Controller
{
    function createCart($data)
    {
        $user = Auth::user();
        return Cart::create([
            'id_user' => $user->id,
            'name_food' => $data->name,
            'price_food' => $data->price,
            'img_food' => $data->img_food,
            'quantity' => 1,
            'status' => 0,
            'id_info_cart' => null,
        ]);
    }
    function createCartWithQuantity(Request $request)
    {
        $user = Auth::user();
        $getData = DB::table('foods')->select('*')->where('id', $request->id)->get();
        return Cart::create([
            'id_user' => $user->id,
            'name_food' => $request->name,
            'price_food' => $request->price,
            'img_food' => $request->img_food,
            'quantity' => $request->quantity,
            'status' => 0,
            'id_info_cart' => null,
        ]);
    }

    function registerCart($id)
    {
        $user = Auth::user();
        $getData = DB::table('foods')->select('*')->where('id', $id)->get();
        $data = $getData->all();
        $this->createCart($data[0]);
        return redirect()->route('index');
    }

    function showCart()
    {
        $user = Auth::user();
        $getDataCart = DB::table('carts')->select('*')->where('id_user', '=', $user->id)->where('status', '=', 0)->get();
        $totalPrice = 0;
        foreach ($getDataCart as $value) {
            $totalPrice += ($value->price_food * $value->quantity);
        }
        return view('pages.cart.detailcart', ['getDataCart' => $getDataCart, 'totalPrice' => $totalPrice]);
    }

    function showCreateInfoCart()
    {
        $user = Auth::user();
        $totalPrice =  $this->getTotalPrice($user->id);
        return view('pages.cart.infocart', ['totalPrice' => $totalPrice]);
    }

    function getTotalPrice($id)
    {
        $getDataCart = DB::table('carts')->select('*')->where('id_user', '=', $id)->where('status', '=', 0)->get();
        $totalPrice = 0;
        foreach ($getDataCart as $value) {
            $totalPrice += ($value->price_food * $value->quantity);
        }
        return $totalPrice;
    }

    function deleteItemCart(Request $request)
    {
        $id = $request->id;
        DB::table('carts')->where('id', '=', $id)->delete();
        return redirect()->route('showCart');
    }

    function showInfoCartConfirmed()
    {
        $getDataInfoCartConfirmed = $this->getDataInfoCartConfirmed();
        return view('pages.cart.detailcartconfirmed', ['getDataInfoCartConfirmed' => $getDataInfoCartConfirmed]);
    }

    function getDataInfoCartConfirmed()
    {
        $user = Auth::user();
        $getDataCart = DB::table('info_carts')->select('*')->where('id_user', '=', $user->id)->where('status', '=', 1)->get();
        return $getDataCart;
    }
    
    function showInfoCartDone()
    {
        $getDataInfoCartDone = $this->getDataInfoCartDone();
        return view('pages.cart.detailcartdone', ['getDataInfoCartDone' => $getDataInfoCartDone]);
    }

    function getDataInfoCartDone()
    {
        $user = Auth::user();
        $getDataCart = DB::table('info_carts')->select('*')->where('id_user', '=', $user->id)->where('status', '=', 2)->get();
        return $getDataCart;
    }

    function getDataItemCartById(Request $request){
        $user = Auth::user();
        $getDataItemCart = DB::table('carts')->select('*')->where('id_user', '=', $user->id)->where('id', '=', $request->id)->get();
        return view('pages.cart.updateitemcart',['getDataItemCart' => $getDataItemCart]);
    }

    function updateItemCart(Request $request){
        $user = Auth::user();
        DB::table('carts')->where('id_user', '=', $user->id)->where('id', $request->id_item)->update([
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('showCart');
    }

    function getDataItemInfoCartConfirmed($id_info_cart){
        $user = Auth::user();
        $totalPrice = 0;
        $getDataItemCart = DB::table('carts')->select('*')->where('id_user', '=', $user->id)->where('status', '=', 1)->where('id_info_cart', '=', $id_info_cart)->get();
        foreach($getDataItemCart as $value){
            $totalPrice += $value->price_food;
        }
        return view('pages.cart.detailiteminfocart', ['getDataItemCart' => $getDataItemCart, 'totalPrice' => $totalPrice]);
    }
    function getDataItemInfoCartDone($id_info_cart){
        $user = Auth::user();
        $totalPrice = 0;
        $getDataItemCart = DB::table('carts')->select('*')->where('id_user', '=', $user->id)->where('status', '=', 2)->where('id_info_cart', '=', $id_info_cart)->get();
        foreach($getDataItemCart as $value){
            $totalPrice += $value->price_food;
        }
        return view('pages.cart.detailiteminfocart', ['getDataItemCart' => $getDataItemCart, 'totalPrice' => $totalPrice]);
    }

}
