<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
    public function index()
    {
        // dd(auth()->user());
        // return auth()->user()->getRoleNames() . view('home');
        return  User::find(2)->getRoleNames() . view('home');

        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'user']);
        // auth()->user()->assignRole('admin');
        // auth()->user()->removeRole('user');

        // dd(Role::all());

        // Permission::create(['name' => 'edit-user']);
        // auth()->user()->givePermissionTo('delete');
        // auth()->user()->givePermissionTo('edit post');
        // auth()->user()->givePermissionTo('write');

        // dd(auth()->user()->getAllPermissions());

        // auth()->user()->revokePermissionTo('edit post');
    }
}
