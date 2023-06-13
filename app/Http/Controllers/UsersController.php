<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kecamatan;
use App\Models\SubDistrictProfile;
use App\Models\ContactPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function indexLogin()
    {
        return view('login');
    }

    public function indexRegis()
    {
        return view('registration');
    }

    public function preLogin(){
        if(Auth::check()){
            if(Auth::user()->id_role == 1 ){
                return redirect('/dashboard/admin');
            }
            elseif(Auth::user()->id_role == 2 ){
                return redirect('/dashboard/ketupel');
            }
            else {
                return redirect('/dashboard/camat');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function postLogin(Request $request){
        $data = $request->only('email', 'password');
        // dd(Auth::attempt($data));
        if(Auth::attempt($data)){
            if(Auth::user()->id_role == 1 ){
                return redirect('/dashboard/admin');
            }
            elseif(Auth::user()->id_role == 2 ){
                return redirect('/dashboard/ketupel');
            }
            else {
                return redirect('/dashboard/camat');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function preRegister()
    {
        $kecamatan = Kecamatan::all();
        return view('registration', compact('kecamatan'));
    }

    public function postRegister(Request $request)
    {
        $this->validate($request,[
            'id_role'   =>'required',
            'name'      =>'required',
            'password'  =>'required|min:8',
            'email'     =>'required|email|unique:users',
            're_pass'   =>'required|same:password'
        ]);

        $user = User::create([
            'id_role'   => $request->id_role,
            'name'      => $request->name,
            'password'  => Hash::make($request->password),
            'email'     => $request->email
        ]);

        $profile = SubDistrictProfile::create([
            'id_user'           => $user->id,
            'id_kecamatan'      => $request->id_kecamatan,
            'kode_kecamatan'    => $request->kode_kecamatan,
            'email'             => $request->email
        ]);

        ContactPerson::create([
            'id_profile'   => $profile->id
        ]);

        return redirect('/');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
