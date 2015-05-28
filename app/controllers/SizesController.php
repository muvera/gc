<?php

class SizesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /sizes
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /sizes/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//

		return View::make('sizes.create')
				->with('active', 0);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sizes
	 *
	 * @return Response
	 */
	public function store()
	{


		$input = Input::get();
		if(!['name']) dd('You need a name');
		$style = new Size;
		$style->name = $input['name'];
		$style->description = $input['description'];
		$style->save();

		return Redirect::to('/admin_sizes')->with('notification', 'Size has been added');

	}

	/**
	 * Display the specified resource.
	 * GET /sizes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /sizes/{id}/edit
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
	 * PUT /sizes/{id}
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
	 * DELETE /sizes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}