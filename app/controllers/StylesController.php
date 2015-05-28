<?php

class StylesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /styles
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /styles/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//

		return View::make('styles.create')
				->with('active', 0);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /styles
	 *
	 * @return Response
	 */
	public function store()
	{
		//

		$input = Input::get();
		if(!['name']) dd('You need a name');
		$style = new Style;
		$style->name = $input['name'];
		$style->description = $input['description'];
		$style->save();

		return Redirect::to('/admin_styles')->with('notification', 'Style has been added');


	}

	/**
	 * Display the specified resource.
	 * GET /styles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$product = Style::findOrFail($id);
				return View::make('styles.show')
				->with('active',4)
					->with('product', $product);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /styles/{id}/edit
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
	 * PUT /styles/{id}
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
	 * DELETE /styles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}