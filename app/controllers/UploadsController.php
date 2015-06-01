
<?php

class UploadsController extends \BaseController {




	public function category_upload(){

		$input = Input::get();
		$image = Input::file('img');
		$folder = public_path('/uploads/categories/'.$input['category_id']);

		if(!file_exists($folder)){
			mkdir($folder);
		}
		$new_name = rand(700,0).'.png';
		$upload = $image->getClientOriginalName();

		$image->move(public_path('/uploads/categories/' . $input['category_id']), $new_name);

		
		// Find the Category
		$category = Category::findOrFail($input['category_id']);
		$category->img = $new_name;
		$category->save();


		return Redirect::back()->with('notification','Image has been uploaded');

	}

		// Product Upload
		public function product_upload(){

		$input = Input::get();
		$image = Input::file('img');
		$folder = public_path('/uploads/products/'.$input['product_id']);

		if(!file_exists($folder)){
			mkdir($folder);
		}
		$new_name = rand(700,0).'.png';
		$upload = $image->getClientOriginalName();

		$image->move(public_path('/uploads/products/' . $input['product_id']), $new_name);

		
		// Find the Category
		$category = Product::findOrFail($input['product_id']);
		$category->img = $new_name;
		$category->save();


		return Redirect::back()->with('notification','Image has been uploaded');

	}


		// Product Upload
		public function product_style_upload(){


		// UPLOAD AND SAVE IMAGE
		$input = Input::get();
		$product_id = $input['product_id'];
		$style_id = $input['style_id'];

		$image = Input::file('img');

		$folder = public_path('uploads/products/'.$product_id.'/');
		$destination = public_path('uploads/products/'.$product_id.'/'.$style_id. '/');
		if(!file_exists($folder)){
		// First Folder
			mkdir($folder);
		}

		if(!file_exists($destination)){
		// First Folder
			mkdir($destination);
		}

		$new_name = rand(700,0).'.png';
		$upload = $image->getClientOriginalName();

		$image->move($destination, $new_name);

		
		// SAVE THE IMAGE IN DATABASE
		$design =  new Design;
		$design->img = $new_name;
		$design->save();

		// ATTACH IMAGE TO PRODUCT
		$product = Product::find($product_id);
		$product->designs()->attach($design->id);

		// Atach Design to Style
		$styles = Style::find($style_id);
		$styles->designs()->attach($design->id);


		return Redirect::back()->with('notification','Design has been added to the product');

	}

#CLIENT UPLOADS
		// Rectangle Upload
		public function rectangle_upload(){


		$input = Input::get();
		$image = Input::file('img');
		$folder = public_path('/uploads/temp');

		$name = $image->getClientOriginalName();
		$ext = Input::file('img')->getClientOriginalExtension();

		$image->move($folder, $name.$ext);


		return Redirect::back()->with('notification','Image has been uploaded');

	}


		// PREVIEW DESIGNS
		public function preview_design(){

		
		session_start();
		if(isset($_SESSION['avatar'])){
		$avatar = $_SESSION['avatar'];
		}else{
			dd('Please Upload Image');
		}

		$input = Input::get();
		$design_id = $input['design_id'];
		$design = $input['design'];


		$realpath = public_path();
		$path = public_path('uploads/');

		// Transparencies
		$transparent_cricle = $realpath.'/transparent/circle-8inch.png';

		$preview_name = rand(10,10000);
		
		// Make the Sticker Canvas white
		$canvas = Image::canvas(1100, 850, '#ffffff');
		$canvas->insert($realpath.$avatar, 'center');
		//$canvas->insert($transparent_cricle, 'center');
		$canvas->insert($realpath.$design, 'center');
		$canvas->save($path.'temp/'.$preview_name. '.jpg');

		// Put the file name in to a session
		Session::put('preview', '/uploads/temp/'.$preview_name. '.jpg');
		$preview = Session::get('preview');


		$design = Design::findOrFail($design_id);
			

		return View::make('designs.preview')
					->with('preview',$preview)
					->with('design', $design);
					->with('notification','Design was generated');

	}



}
