<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:menu_show', ['only' => 'index']);
        $this->middleware('permission:menu_create', ['only' => 'create', 'store']);
        $this->middleware('permission:menu_update', ['only' => 'update', 'edit']);
        $this->middleware('permission:menu_delete', ['only' => 'destroy']);
    }

    public function index()
    {
        $menus = Menu::paginate('5');
        return view('admin.menu.index', ['menus' => $menus]);
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'menu' => 'required|unique:menus,menu',
            'link' => 'required'
        ]);

        Menu::create([
            'menu' => $request->menu,
            'link' => $request->link,
            'slug' => str()->slug($request->menu),
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu Success Added');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Menu $menu, Request $request)
    {
        $this->validate($request, [
            'menu' => [
                'required',
                Rule::unique('menus')->ignore($menu->id)
            ],
            'link' => 'required'
        ]);

        $menu->update([
            'menu' => $request->menu,
            'link' => $request->link,
            'slug' => str()->slug($request->menu),
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu Success Added');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu Success Added');
    }
}
