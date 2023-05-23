<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $role = Auth()->user()->role;
    
            if($role === 'admin'){
                return view('admin.home');
            }elseif($role === 'penjual'){
                return view('penjual.home');
            }else{
                return view('home');
            }
        }else{
            return view('home');
        }
    }    
}
