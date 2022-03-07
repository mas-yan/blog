<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
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
}
