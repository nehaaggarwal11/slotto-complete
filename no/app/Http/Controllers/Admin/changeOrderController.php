<?php

namespace App\Http\Controllers\Admin;

use App\Casino;
use App\Game;
use App\homeSlider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class changeOrderController extends Controller
{
  public function cOrder(Request $request)
  {

         $id = $request->ids;
         $s = 0;
          //echo $request->type;
          switch($request->type){
             case 'casino':
              foreach ($id as $d) {
                  $name = Casino::Where('id', $d)->update(array('order_id' => ++$s));
              }
             break;
             case 'homeSilder':
              foreach ($id as $d) {
                  $name = homeSlider::Where('id', $d)->update(array('order_id' => ++$s));
              }
              break;
          }
  }
}
