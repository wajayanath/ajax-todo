<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ListController extends Controller
{
   public function index()
   {
   	  $items = Item::all();
   	  // return $items;
   	  return view('list', compact('items'));
   }
   
   public function store(Request $request)
   {
   	 $item = new Item;
   	 $item->item = $request->text;
   	 $item->save();
   	 return 'done';
   }
}
