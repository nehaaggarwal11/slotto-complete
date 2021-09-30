<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Menu;
use App\Casino;
use App\LayoutPage;
use App\Software;
use App\News;
use App\Game;
use App\StaticPage;

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


	public function ajax(Request $request){
		$table = $request->type.'s';
		if ($request->type == "StaticPage") {
			$data = StaticPage::distinct('page')->get('page');
		}
		else{
			$data = DB::table($table)->get(['id','slug']);
		}

		return $data;
	}

}
