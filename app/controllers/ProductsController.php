<?php

class ProductsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /products
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /products/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//

		$categories = Category::get();
		$styles = Style::get();
		$sizes = Size::get();
	
		return View::make('products.create')
				->with('categories', $categories)
				->with('styles', $styles)
				->with('sizes', $sizes)
				->with('active', 0);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /products
	 *
	 * @return Response
	 */
	public function store()
	{
		//

		$input = Input::get();
		if(!['name']) dd('You need a name');
		$product = new Product;
		$product->name = $input['name'];
		$product->category_id = $input['category_id'];
		$product->style_id = $input['style_id'];
		$product->size_id = $input['size_id'];
		$product->description = $input['description'];
		$product->save();

		// Attach Category
		$product->categories()->attach($input['category_id']);
		// Attach Style
		$product->styles()->attach($input['style_id']);
		// Attach Size
		$product->sizes()->attach($input['size_id']);
		// Create Product Folder
		

		return Redirect::to('/admin_products')->with('notification', 'Product has been added');
	}

	/**
	 * Display the specified resource.
	 * GET /products/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//

		$product = Product::findOrFail($id);
				return View::make('products.show')
				->with('active',3)
					->with('product', $product);
	
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /products/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /products/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /products/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//

		$product = Product::findOrFail($id);

		$designs = $product->designs()->get();
		// Delete All Designs from this Product
		foreach ($designs as $design) {
			$design->delete();
		}

		$product->delete();


		return Redirect::back()->with('notification', 'Product and Designs where deleted.');

	}

}