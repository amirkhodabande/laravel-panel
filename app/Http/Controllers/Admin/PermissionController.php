<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function giverole(Request $request, $name)
    {
        if (auth()->user()->can('edit-user')) {
            if ($name !== "nothing") {
                auth()->user()->removeRole($name);
            }

            auth()->user()->assignRole($request->name);
            return redirect()->back();
        } else {
            $t = 'f';
            $m = 'مهدودیت سطح دسترسی';
            $l = 'users.index';
            return view('admin.alert', compact('t', 'm', 'l'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('edit-user')) {
            auth()->user()->givePermissionTo($request->name);
        } else {
            $t = 'f';
            $m = 'مهدودیت سطح دسترسی';
            $l = 'users.index';
            return view('admin.alert', compact('t', 'm', 'l'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($permission)
    {
        if (auth()->user()->can('edit-user')) {
            auth()->user()->revokePermissionTo($permission);
        } else {
            $t = 'f';
            $m = 'مهدودیت سطح دسترسی';
            $l = 'users.index';
            return view('admin.alert', compact('t', 'm', 'l'));
        }
    }
}
