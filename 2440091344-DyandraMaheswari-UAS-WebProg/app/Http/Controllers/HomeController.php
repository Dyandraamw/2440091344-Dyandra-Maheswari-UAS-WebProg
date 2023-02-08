<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function home()
    {
        if($locale = session('locale')){
            app()->setlocale($locale);
        }
        $items = Item::paginate(10);
        return view('home',compact('items'));
    }

    public function showDetail($id){
        if($locale = session('locale')){
            app()->setlocale($locale);
        }
        $details = Item::where('id','LIKE',$id)->get();

        return view('detail',compact('details'));
   }

}
