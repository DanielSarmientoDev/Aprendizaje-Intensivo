<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        //Se guardan los datos en un variable
        $users = User::orderBy('id', 'ASC')->get();
        //Se retorna una vista
        return view('users.index',[
            //Se envia los datos a la vista
            'users' => $users
        ]);
    }
    public function store(Request $request)
    {
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
        ]);
        return back();
    }
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
