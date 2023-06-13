<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Participant;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardAdmin()
    {
        $admin = count(User::where('id_role', '=', '1')->get());
        $camat = count(User::where('id_role', '=', '3')->get());
        $peserta = count(Participant::all());
        $sport = count(Sport::all());

        return view('dashboard.admin', compact('admin', 'camat', 'peserta', 'sport'));
    }
    
    public function adminCount()
    {
        $admin = count(User::where('id_role', '=', '1')->get());
        $camat = count(User::where('id_role', '=', '3')->get());
        $peserta = count(Participant::all());
        $sport = count(Sport::all());
        
        return view('dashboard.admin', compact('admin', 'camat', 'peserta', 'sport'));
    }
    
    public function camatCount()
    {
        // dd(Auth::user()->id_role);
        $admin = count(User::where('id_role', '=', '1')->get());
        $camat = count(User::where('id_role', '=', '3')->get());
        $peserta = count(Participant::all());
        $sport = count(Sport::all());

        return view('dashboard.camat', compact('admin', 'camat', 'peserta', 'sport'));
    }

}
