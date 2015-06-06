<?php

class VidcategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /vidcategories
	 *
	 * @return Response
	 */
	public function index()
	{
		//
			$categories = Vidcategory::get();
			return View::make('vidcategories.index')
						->with('categories', $categories);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vidcategories/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('vidcategories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vidcategories
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input = Input::get();
				if(!$input['name']) dd('You need a name');
				$category = new Vidcategory;
				$category->name = $input['name'];
				$category->description = $input['description'];
				$category->save();
		
				return Redirect::to('/vidcategories');
	}

	/**
	 * Display the specified resource.
	 * GET /vidcategories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
				$category = Vidcategory::findOrFail($id);
		
				return View::make('vidcategories.show')
					->with('category',$category);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /vidcategories/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
			$category = Vidcategory::findOrFail($id);
		
				return View::make('vidcategories.edit')
						->with('category',$category);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /vidcategories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
				$input = Input::get();
				 $category = Vidcategory::findOrFail($id);
				 $category->name = $input['name'];
				 $category->description = $input['description'];
				 $category->save();
		
				return Redirect::to('/vidcategories');

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /vidcategories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
			$category = Vidcategory::findOrFail($id);
			$category->delete();
				return Redirect::to('/vidcategories');
	}

}