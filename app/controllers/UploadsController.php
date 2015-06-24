
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
		// Watermark and resize the image
		$watermark = public_path('watermark.png');

		$image = public_path('/uploads/products/' . $input['product_id']) .'/'.$new_name;

		$img = Image::make($image);
		$img->insert($watermark, 'bottom-right', 10, 10);
		$img->resize(300, null, function ($constraint) {
    	$constraint->aspectRatio();
    	});
		$img->save($image);

	
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

		// Resize and watermar the image
		$watermark = public_path('watermark.png');

		$image = $destination . $new_name;
		$resized = $destination .'r'.$new_name;

		$img = Image::make($image);
		$img->insert($watermark, 'bottom-right', 10, 10);
		$img->resize(400, null, function ($constraint) {
    	$constraint->aspectRatio();
    	});
		$img->save($resized);

		
		// SAVE THE IMAGE IN DATABASE
		$design =  new Design;
		$design->name = $input['name'];
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

		// Styles
		// 1 Rectangle
		// 2 Round Circle
		// 3 Cupcakes - Make 12 per Sheet

				session_start();
		if(isset($_SESSION['avatar'])){
		$avatar = $_SESSION['avatar'];
		}else{
			dd('Please Upload Image');
		}


		$input = Input::get();
if($input['style_id'] == 3){
		$design_id = $input['design_id'];
		$style_id = $input['style_id'];
		$design = $input['design'];


		$realpath = public_path();
		$path = public_path('uploads/');

		$preview_name = rand(10,10000);
		
		// Make the Sticker Canvas white
		$canvas = Image::canvas(1100, 850, '#ffffff');
		// Client Image
		$canvas->insert($realpath.$avatar, 'center');
		// Server Image
		$canvas->insert($realpath.$design, 'center');
		// Save Image on Temp folder
		$canvas->save($path.'temp/'.$preview_name. '.jpg');


# Make 12 Process
		// Grab Image
		// Resize it
		// Crop image
		// Save cropped Image

		// Make Canvas
		// Insert 12 times
		// save new Image
		// Put image on Session

		// Put the file name in to a session


		// Grab Image
		$image = $path.'temp/'.$preview_name. '.jpg';
		// Resize it
		$img = Image::make($image);
		$img->resize(295, null, function ($constraint) {
    	$constraint->aspectRatio();
		});
		// Crop image
		$img->fit(200);
		// Save cropped Image
		$img->save($image);
		// Make Canvas
		$canvas = Image::canvas(1100, 850, '#ffffff');
		// Insert 12 times -----------Colum-Row
		$canvas->insert($img, 'null', 61, 67);
		$canvas->insert($img, 'null', 320, 67);
		$canvas->insert($img, 'null', 580, 67);
		$canvas->insert($img, 'null', 839, 67);

		$canvas->insert($img, 'null', 61, 326);
		$canvas->insert($img, 'null', 320, 326);
		$canvas->insert($img, 'null', 580, 326);
		$canvas->insert($img, 'null', 839, 326);

		$canvas->insert($img, 'null', 61, 585);
		$canvas->insert($img, 'null', 320, 585);
		$canvas->insert($img, 'null', 580, 585);
		$canvas->insert($img, 'null', 839, 585);

		// save new Image
		$canvas->save($path.'temp/'.$preview_name. '.jpg');
		// Put image on Session

		// Put the file name in to a session
		Session::put('preview', '/uploads/temp/'.$preview_name. '.jpg');
		$preview = Session::get('preview');


		$design = Design::findOrFail($design_id);

		$product = $design->products()->first();

		$active = 0;
		return View::make('designs.preview')
					->with('preview',$preview)
					->with('design', $design)
					->with('product', $product)
					->with('active', $active)
					->with('notification','Design was generated');

		}

		
// DEFAULT PROCESS Make one regular Sheet
		$input = Input::get();
		$design_id = $input['design_id'];
		$style_id = $input['style_id'];
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

		$product = $design->products()->first();

		$active = 0;
		return View::make('designs.preview')
					->with('preview',$preview)
					->with('design', $design)
					->with('product', $product)
					->with('active', $active)
					->with('notification','Design was generated');

	}


	public function learnings_upload(){

		$input = Input::get();
		$image = Input::file('img');
		$folder = public_path('/uploads/learnings/'.$input['learning_id']);

		if(!file_exists($folder)){
			mkdir($folder);
		}
		$new_name = rand(700,0).'.png';
		$upload = $image->getClientOriginalName();

		$image->move(public_path('/uploads/learnings/' . $input['learning_id']), $new_name);

		$image = Image::make($folder.'/'.$new_name);
		$image->fit(300);
		$image->save($folder.'/c'. $new_name);


		// Save the image name in to the img database
		$img = new Img;
		$img->name = $input['name'];
		$img->img = $new_name;
		$img->save();
		
		// Attach the Image
		$learning = Learning::findOrFail($input['learning_id']);
		$learning->imgs()->attach($img->id);


		return Redirect::back()->with('notification','Image has been uploaded');

	}




}
