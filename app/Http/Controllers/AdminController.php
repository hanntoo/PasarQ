<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/dashboard');
    }
}