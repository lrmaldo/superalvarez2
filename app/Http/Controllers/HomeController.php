<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        if(Auth::user()->hasRole('admin')){ //busca el roll de usuario si es admin o user
         return redirect('sucursal');
        }else{
            return redirect('productos');
        }
    }
}
