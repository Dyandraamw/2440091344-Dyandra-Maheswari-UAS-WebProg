<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function addCart(Request $request)
    {
        DB::table('cartlists')->insert([
            'account_id'=> $request->account_id,
            'item_id'=> $request->item_id
        ]);

        return redirect("/home");
    }

    public function showCart(){
        if($locale = session('locale')){
            app()->setlocale($locale);
        }
        $id = Auth::user()->id;
        $cart = Cart::join('item','cartlists.item_id','=','item.id')
        ->where('account_id','LIKE',$id)->get(['cartlists.id AS cid','item.item_name','item.price','item.id AS iid','cartlists.account_id as aid']);
        $total = Cart::join('item','cartlists.item_id','=','item.id')
        ->where('account_id','LIKE',$id)->sum('item.price');



        return view('cart',compact('cart','total'));
    }

    public function success(){
        if($locale = session('locale')){
            app()->setlocale($locale);
        }
        return view('success');
    }

    public function deleteCart($id){
        $cart = Cart::find($id);
        $cart->delete();

        return redirect('/cart');
    }

    public function addOrder()
    {
        $id = Auth::user()->id;
        $cart = Cart::join('item','cartlists.item_id','=','item.id')
        ->where('account_id','LIKE',$id)->get(['cartlists.id AS cid','item.item_name','item.price','item.id AS iid','cartlists.account_id as aid']);

        foreach ($cart as $request) {
            DB::table('order')->insert([
                'account_id'=> $request->aid,
                'item_id'=> $request->iid,
                'price'=>  $request->price
            ]);
            $clear = Cart::find($request->cid);
            $clear->delete();

        }

        return redirect("/success");
    }
}
