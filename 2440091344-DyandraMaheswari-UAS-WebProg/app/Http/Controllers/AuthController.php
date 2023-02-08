<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login()
    {
        if($locale = session('locale')){
            app()->setlocale($locale);
        }
        return view('login');
    }

    public function index()
    {
        if($locale = session('locale')){
            app()->setlocale($locale);
        }
        return view('index');
    }

    public function register()
    {
        if($locale = session('locale')){
            app()->setlocale($locale);
        }
        $roles = DB::table('roles')->get();
        $genders = DB::table('genders')->get();
        return view('register',compact('roles','genders'));
    }

    public function storeRegister(Request $request)
    {

        $request->validate([
            'first_name'=> 'required|max:25|alpha',
            'last_name'=> 'required|max:25|alpha',
            'email' => 'required|email:dns|unique:account',
            'role_id'=> 'required',
            'gender_id'=> 'required',
            'display_picture_link'=> 'required|mimes:jpeg,jpg,png,gif',
            'password'=>'required|confirmed|min:1|max:8',
        ]);

        $display_picture = $request->file('display_picture_link');
        $imgname = $display_picture->getClientOriginalName();
        Storage::putFileAs('public/images',$display_picture,$imgname);
        $imgurl = 'images/'.$imgname;

        // $role = DB::table('roles')
        // ->where('role_name','LIKE',$request->role)
        // ->get();

        // $gender = DB::table('genders')
        // ->where('gender_desc','LIKE',$request->gender)
        // ->get();

        DB::table('account')->insert([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'email' => $request->email,
            'role_id'=> $request->role_id,
            'gender_id'=> $request->gender_id,
            'display_picture_link' => $imgurl,
            'password' => Hash::make($request->password)
        ]);

        return redirect("/login");
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email,'password' => $request->password],true)){

            $name = DB::table('account')->where('email','LIKE', $request->email)->get('first_name');
            session('usersession',['email' => $request->email,'password' => $request->password,'first_name'=>$name]);
            //Session::put('usersession',['email' => $request->email,'password' => $request->password,'first_name'=>$name]);
            return redirect('/home');
        }

        return redirect()->back()->withErrors('Wrong Email/Password. Please Check Again');
    }

    public function logout(){
        Auth::logout();
        session()->flush();
        return redirect('/logoutSuccess');
    }

    public function profile()
    {
        if($locale = session('locale')){
            app()->setlocale($locale);
        }
        $id = Auth::user()->id;
        $account = DB::table('account')->where('id','LIKE',$id)->get();
        $role = DB::table('roles')->where('id','LIKE',$account[0]->role_id)->get();
        $currgender = DB::table('genders')->where('id','LIKE',$account[0]->gender_id)->get();
        $genders = DB::table('genders')->get();
        return view('profile',compact('account','genders','role','currgender'));
    }

    public function editProfile(Request $request){
        $request->validate([
            'first_name'=> 'required|max:25|alpha',
            'last_name'=> 'required|max:25|alpha',
            'email' => 'required|email:dns',
            'gender_id'=> 'required',
            'display_picture_link'=> 'required|mimes:jpeg,jpg,png,gif',
            'password'=>'required|confirmed|min:1|max:8',
        ]);

        $id = Auth::user()->id;
        $display_picture = $request->file('display_picture_link');
        $imgname = $display_picture->getClientOriginalName();
        Storage::putFileAs('public/images',$display_picture,$imgname);
        $imgurl = 'images/'.$imgname;


        DB::table('account')->where('id','LIKE',$id)
        ->update([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'email' => $request->email,
            'gender_id'=> $request->gender_id,
            'display_picture_link' => $imgurl,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/saved');
    }

    public function saved(){
        if($locale = session('locale')){
            app()->setlocale($locale);
        }
        return view('saved');
    }


    public function logoutSuccess(){
        if($locale = session('locale')){
            app()->setlocale($locale);
        }
        return view('logoutSuccess');
    }


    public function showAcc(){
        if($locale = session('locale')){
            app()->setlocale($locale);
        }
        $data = DB::table('account')->join('roles','account.role_id','=','roles.id')
        ->get(['first_name','last_name','roles.id AS rid','account.id AS accid','role_name']);

        return view('accMaintenance',compact('data'));
    }

    public function deleteAcc($id){
        $cart = User::find($id);
        $cart->delete();

        return redirect('/showAcc');
    }

    public function showRole($id)
    {
        if($locale = session('locale')){
            app()->setlocale($locale);
        }
        $data = DB::table('account')->join('roles','account.role_id','=','roles.id')
        ->where('account.id','LIKE',$id)
        ->get(['roles.id AS rid','account.id AS accid','role_name','first_name','last_name']);
        $roles = DB::table('roles')->get();


        return view('showRole',compact('data','roles'));
    }

    public function editRole(Request $request){
        $request->validate([
            'role_id'=> 'required'
        ]);

        DB::table('account')->where('id','LIKE',$request->id)
        ->update([
            'role_id'=>$request->role_id
        ]);
        return redirect('/showAcc');
    }

    public function switchLang($locale){
        session()->put('locale',$locale);
        session()->save();
        return redirect()->back();
    }

}
