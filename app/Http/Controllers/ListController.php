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

   public function delete(Request $request)
   {
   		Item::where('id', $request->id)->delete();
   		return $request->id;
   }

   public function update(Request $request)
   {
   		$item = Item::find($request->id);
   		 $item->item = $request->value;
   	 	$item->save();
   		return $request->all();
   }


}
