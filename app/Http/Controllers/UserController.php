<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = DB::table('users')->get();

        return view('admin.user.user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = DB::table('users')->get();

        return view ('admin.user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required',

        ]);


{

        // Save the data to the database
        $user = new user();
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();

        // Redirect to the desired page
        return redirect()->route('user.index')->with('success', 'Data Users berhasil ditambahkan');
    

        // Redirect back if the required files are not uploaded
        return back()->with('error', 'Lengkapi Data');
}
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            // Handle case when kecamatan is not found
            return redirect()->back()->with('error', 'users not found.');
        }


        return view('admin.user.edit', compact('user', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required',
        // Add validation rules for other fields as needed
        ]);

        // Find the record to be updated
        $user = User::findOrFail($id);

        // Update the record with the new values
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->email = $request->input('email');
        $user->role = $request->input('role');


        // Update other fields as needed
        

        // Save the updated record
        if ($user->save()) {
            return redirect()->route('user.index')->with('success', 'Data users has been updated successfully.');
        } else {
            return redirect()->route('user.index')->with('error', 'Failed to update data users.');
        }
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // DB::table('users')->where('id', $id)->delete();
        // return redirect('/user');

        $user = user::find($id);

        if (!$user) {
            // Handle case when kecamatan is not found
            return redirect()->back()->with('error', 'user not found.');
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'users deleted successfully.');
    }
    
}
