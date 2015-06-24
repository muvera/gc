<?php

class LearningsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /learnings
	 *
	 * @return Response
	 */
	public function index()
	{
		//
			$categories = Learcategory::get();
				return View::make('learnings.index')
						->with('active', 0)
						->with('categories', $categories);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /learnings/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$learcategories = Learcategory::get();
		return View::make('learnings.create')
				->with('active', 0)
				->with('categories', $learcategories);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /learnings
	 *
	 * @return Response
	 */
	public function store()
	{
		//

			$input = Input::get();
			$category_id = $input['category_id'];
				if(!['title']) dd('You need a title');
				$learning = new Learning;
				$learning->title = $input['title'];
				$learning->description = $input['description'];
				$learning->category_id = $input['category_id'];
				$learning->body = $input['body'];
				$learning->save();

				// Attch to category
				$category = Learcategory::find($category_id);
				$learning->learcategories()->attach($category->id);
		
				return Redirect::to('/learnings');
	}

	/**
	 * Display the specified resource.
	 * GET /learnings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$learning = Learning::find($id);
		return View::make('learnings.show')
				->with('active', 0)
				->with('learning', $learning);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /learnings/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//

		$learning = Learning::findOrFail($id);
		
		return View::make('learnings.edit')
						->with('active', 0)
						->with('learning', $learning);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /learnings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//

		$input= Input::get();
			$learning = Learning::findOrFail($id);
			$learning->title = $input['title'];
			$learning->description = $input['description'];
			$learning->body = $input['body'];
			$learning->save();
		
				return Redirect::to('/learnings');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /learnings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//

		$learning = Learning::find($id);
		$learning->delete();

		return Redirect::back()->with('notification', 'Learning Article Deleted');
	}

}