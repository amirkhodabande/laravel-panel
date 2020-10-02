<?php

namespace App\Http\Controllers\Admin;

use App\Tab;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;

class TabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tabs = Tab::search($request->all());
        $all = Tab::all();
        return view('admin.tabs.index', compact('tabs', 'all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tabs = Tab::all();
        return view('admin.tabs.create', compact('tabs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user()->user_type;
        if ($user == 'boss' || $user  == 'admin') {
            $request->validate([
                'title' => 'required',
                'url' => 'required',
            ]);
            Tab::create($request->all());

            $t = 's';
            $m = "ساخت سر صفحه";
            $l = 'tab.index';
            return  view('admin.alert', compact('m', 'l', 't'));
        } else {
            $t = 'f';
            $m = "مهدودیت دسترسی شما";
            $l = 'tab.index';
            return  view('admin.alert', compact('t', 'm', 'l'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function edit(Tab $tab)
    {
        $user = auth()->user()->user_type;
        if ($user == 'boss' || $user  == 'admin') {
            $tabs = Tab::all();
            return view('admin.tabs.edit', compact('tab', 'tabs'));
            $t = 's';
            $m = "ویرایش سر صفحه";
            $l = 'tab.index';
            return  view('admin.alert', compact('m', 'l', 't'));
        } else {
            $t = 'f';
            $m = "مهدودیت دسترسی شما";
            $l = 'tab.index';
            return  view('admin.alert', compact('t', 'm', 'l'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tab $tab)
    {
        $user = auth()->user()->user_type;
        if ($user == 'boss' || $user  == 'admin') {
            $request->validate([
                'title' => 'required',
                'url' => 'required',
            ]);
            $tab->update($request->all());

            $t = 's';
            $m = "ویرایش سر صفحه";
            $l = 'tab.index';
            return  view('admin.alert', compact('m', 'l', 't'));
        } else {
            $t = 'f';
            $m = "مهدودیت دسترسی شما";
            $l = 'tab.index';
            return  view('admin.alert', compact('t', 'm', 'l'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tab $tab)
    {
        $user = auth()->user()->user_type;
        if ($user == 'boss' || $user  == 'admin') {
            $tab->delete();

            $t = 's';
            $m = "حذف سر صفحه";
            $l = 'tab.index';
            return  view('admin.alert', compact('m', 'l', 't'));
        } else {
            $t = 'f';
            $m = "مهدودیت دسترسی شما";
            $l = 'tab.index';
            return  view('admin.alert', compact('t', 'm', 'l'));
        }
    }
}
