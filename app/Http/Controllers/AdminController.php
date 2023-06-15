<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Date;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.dashboard', compact('user'));
    }
    public function search(Request $request){
        $keyword = $request->cari_user;
        if($request->has('cari_user')) {
            $user = User::where('name','LIKE','%'.$keyword.'%')
            ->orWhere('email','LIKE','%'.$keyword.'%')
            ->orWhere('role','LIKE','%'.$keyword.'%')
            ->get();
        }
        else{
            $user = User::all();
        }
        return view('admin.dashboard',['user' => $user]);
    }
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string',
            'email_user' => 'required|email',
            'password_user' => 'required|string|min:8',
            'role_user' => 'required|in:penjual,pembeli'
        ], [
            'required' => 'Kolom :attribute harus diisi',
            'string' => 'Kolom :attribute harus berupa huruf ataupun angka (minimal 8 karakter)',
            'in' => 'Nilai field :attribute harus berupa penjual atau pembeli.',
            'email' => 'email tidak valid'
        ]);
        $user = new user;
        $user->name = $request->nama_user;
        $user->email = $request->email_user;
        $passwordMurni = $request->password_user;
        $user->password = Hash::make($passwordMurni);
        $user->role = $request->role_user;
        $user->email_verified_at = Date::now();
        $user->remember_token = $request->session()->token();
        $user->save();
        return redirect('/admin');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit',compact(['user']));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string',
            'email_user' => 'required|email',
            'password_user' => 'required|string|min:8',
            'role_user' => 'required|in:penjual,pembeli'
        ], [
            'required' => 'Kolom :attribute harus diisi',
            'string' => 'Kolom :attribute harus berupa huruf ataupun angka (minimal 8 karakter)',
            'in' => 'Nilai field :attribute harus berupa penjual atau pembeli.',
            'email' => 'email tidak valid'
        ]);
        $user = User::find($id);
        $user->name = $request->nama_user;
        $user->email = $request->email_user;
        $passwordMurni = $request->password_user;
        $user->password = Hash::make($passwordMurni);
        $user->role = $request->role_user;
        $user->email_verified_at = Date::now();
        $user->remember_token = $request->session()->token();
        $user->save();
        return redirect('/admin');
    }
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/admin');
    }
}