<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kecamatan;
use App\Models\Role;
use App\Models\SubDistrictProfile;
use App\Models\ContactPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UsersController extends Controller
{
    public function indexLogin()
    {
        return view('login');
    }

    public function indexRegis()
    {
        return view('register');
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

        $userFind = User::where('email', $request->email)->first();
        if(!$userFind){
            return redirect('/')->with('error', 'Harap ulangi login! Email atau password anda salah.');
        }
        if (!Hash::check($request->password, $userFind->password)) {
            return redirect('/')->with('error', 'Harap ulangi login! Email atau password anda salah.');
        }

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
        $kecamatan = Kecamatan::where('id_kota', 114)->orderBy('nama_kecamatan')->get();
        return view('register', compact('kecamatan'));
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
            'email'     => $request->email,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
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

    public function indexUser()
    {
        $user = DB::table('users')->select('*', 'users.id as id_user','users.created_at as user_created_at','users.updated_at as user_updated_at')
        ->join('roles','users.id_role','=','roles.id')->get();
        $role = Role::all();
        return view('admin.indexuser', compact('user'));
    }
    public function indexCreateuser()
    {
        $role = Role::all();
        return view('admin.createuser', compact('role'));
    }

    public function CreateUser(Request $request){
        $user = User::create([
            'id_role'   => $request->id_role,
            'name'      => $request->name,
            'password'  => Hash::make($request->password),
            'email'     => $request->email,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/user');
    }

    public function editUser(User $user)
    {
        $role = Role::all();
        return view('admin.edituser', compact('user','role'));
    }

    public function updateUser(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect('user')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        if(!$user->id){
            return redirect('user')->with('error', 'Data gagal dihapus.');
        }
        return redirect('user')->with('success', 'Data berhasil dihapus');
    }
}
