<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDO;

class MailController extends Controller
{
    function sendMail(){
        $user = Auth::user();
        $getDataInfoCart = DB::table('info_carts')->select('*')->orderBy('updated_at', 'desc')->get();
        $getDataFood = DB::table('carts')->where('id_user', $user->id)->where('id_info_cart', '=',$getDataInfoCart[0]->id)->get();
        $body = "Chúng tôi gửi mail xác nhận các sản phẩm mà bạn đã đặt: \n";
        foreach($getDataFood as $value){
            $body .= $value->name_food . " " . $value->quantity . "\n";
        }

        $mailData = [
            'title' => 'Mail from test',
            'body' => $body,
        ];
        Mail::to('monkeyhoai@gmail.com')->send(new DemoMail($mailData));
        return redirect()->route('index');
    }
}
