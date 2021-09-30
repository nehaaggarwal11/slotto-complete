<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;

class MenuController extends Controller
{
	public function index()
    {
		$menus = Menu::all();
		$current_menu = Menu::find(request('menu'));
		return view('admin.menu.index', compact('menus', 'current_menu'));
	}

	public function update(Request $request, Menu $menu)
	{
		$menu->data = $request->data;
		$menu->save();
		return back();
	}
	
}


