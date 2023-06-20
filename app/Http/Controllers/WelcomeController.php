<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Event;
use App\Models\Team;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $news = Berita::get();
        $events = Event::get();
        $teams = Team::get();
        return view('welcome', compact('news','events','teams'));
    }
}
