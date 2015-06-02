<?php

class CartController extends \BaseController {



		public function checkout(){
//
		$items = Session::get('items');
		return View::make('payments.paypal')
				->with('items', $items);

		}

		public function add_item(){
			$input = Input::get();
			$design = Design::findOrfail($input['design_id']);
			// Load the details on the sesion
			Session::push('items', 
				['id'=>$design->id, 
				'name'=> $design->name,
				'preview'=>$input['preview']
				]);

			return Redirect::back()->with('notification',' Item has been added');

		}

		public function remove(){

		}

		public function delete_items(){

			Session::forget('items');
			return Redirect::back()->with('notification', 'Cart is Empty');

		}








}