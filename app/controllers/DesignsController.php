<?php

class DesignsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /designs
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /designs/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /designs
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /designs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
				$design = Design::findOrFail($id);
				$product = $design->products()->first();

				return View::make('designs.show')
				->with('active',4)
				->with('product', $product)
				->with('design', $design);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /designs/{id}/edit
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
	 * PUT /designs/{id}
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
	 * DELETE /designs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}