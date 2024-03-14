<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('User.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roleOption = [
            'admin' => 'Admin',
            'petugas' => 'Petugas'
        ];
        return view('User.create', compact('roleOption'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' =>'required|unique:users,email',
            'alamat' => 'required',
            'telepon' => 'required',
            'password' => 'required|min:5 ',
            'role' =>'required'
        ]);
        User::create($validateData);
        return redirect()->route('user.index')->with('success','Berhasil membuat user baru');
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
        $user = User::findOrFail($id);
        $roleOption = [
            'admin' => 'Admin',
            'petugas' => 'Petugas'
        ];
        return view('User.edit', compact('user','roleOption'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,User $user)
    {
        $validateData = $request->validate([
            'name' =>'required',
            'email' => 'required|email|unique:users,email,' .$user->id,
            'alamat' => 'required',
            'telepon' => 'required',
            'password' => 'required',
            'role' =>'required'
        ]);

        if ($request->filled('password')) {
            $validateData['password'] = Hash::make($validateData['password']);
        } else {
            $validateData['password'] = $user->password;
        }
        $user->update($validateData);
        return redirect()->route('user.index')->with('success','Berhasil memperbarui user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success','Berhasil menghapus user');
    }
}
