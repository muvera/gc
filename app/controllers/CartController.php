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
				'greetings' => $input['greetings'],
				'preview'=>$input['preview']
				]);

			return Redirect::to('/checkout')->with('notification',' Item has been added');

		}

		public function remove(){

		}

		public function delete_items(){

			Session::forget('items');
			return Redirect::to('/')->with('notification', 'Your Cart is Empty');

		}


		public function return_url($id){
				$items = Session::get('items');
				$data = serialize($items);
				$input = Input::get();
				$order = new Order;
				// Start new Order
				$order->invoice = $input['invoice'];
				$order->items = $data;
				$order->mc_gross = $input['mc_gross'];
				$order->protection_eligibility = $input['protection_eligibility'];
				$order->address_status = $input['address_status'];
				$order->payer_id = $input['payer_id'];
				$order->tax = $input['tax'];
				$order->address_street = $input['address_street'];
				$order->payment_date = $input['payment_date'];
				$order->payment_status = $input['payment_status'];
				$order->address_zip = $input['address_zip'];
				$order->mc_handling = $input['mc_handling'];
				$order->first_name = $input['first_name'];
				$order->address_country_code = $input['address_country_code'];
				$order->address_name = $input['address_name'];
				$order->payer_status = $input['payer_status'];
				$order->address_country = $input['address_country'];
				$order->num_cart_items = $input['num_cart_items'];
				$order->address_city = $input['address_city'];
				$order->payer_email = $input['payer_email'];
				$order->verify_sign = $input['verify_sign'];
				$order->payment_type = $input['payment_type'];
				$order->last_name = $input['last_name'];
				$order->address_state = $input['address_state'];
				$order->receiver_email = $input['receiver_email'];
				$order->residence_country = $input['residence_country'];
				$order->payment_gross = $input['payment_gross'];
				$order->auth = $input['auth'];
				$order->save();

				Session::remove('items');

				return View::make('orders.thankyou')
						->with('invoice', $order->invoice)
						->with('email', $order->payer_email)
						->with('notification', 'Thank you, Your order #'. $order->invoice . ' is printing! :)'. ' Please check your email' . $order->payer_email. ' for tracking at the end of the day.');

		}


}