<?php

class VideosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /vidcategories
	 *
	 * @return Response
	 */
	public function index()
	{
		//
			$videos = Video::get();
			return View::make('videos.index')
						->with('active', 0)
						->with('videos', $videos);
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
		$categories = Vidcategory::get();
		return View::make('videos.create')
				->with('active', 0)
				->with('categories', $categories);
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
		$category_id = $input['category_id'];

				if(!$input['name']) dd('You need a name');
				$video = new Video;
				$video->name = $input['name'];
				$video->description = $input['description'];
				$video->order = $input['order'];
				$video->level = $input['level'];
				$video->video = $input['video'];
				$video->save();
				 // Attch the category with the video
				 $video->vidcategories()->attach($category_id);	
		
				return Redirect::to('/videos');
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
				$video = Video::findOrFail($id);
		
				return View::make('videos.show')
					->with('video',$video);
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
			$video = Video::findOrFail($id);
			$categories = Vidcategory::get();
		
				return View::make('videos.edit')
						->with('categories', $categories)
						->with('video',$video);
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
				
				$category_id = Vidcategory::find($input['category_id']);

				 $video = Video::findOrFail($id);
				 $video->name = $input['name'];
				 $video->description = $input['description'];
				 $video->video = $input['video'];
				 $video->level = $input['level'];
				 $video->order = $input['order'];
				 $video->save();

				 // Find Old Category
				 $old_category = $video->vidcategories()->first()->id;
				 
				 // Detach Old Category
				 $video->vidcategories()->detach($old_category);
				 // Attch the category with the video	
				 $video->vidcategories()->attach($category_id->id);	


				return Redirect::to('/videos')->with('notification', 'Vide Updated!');

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
			$category = Video::findOrFail($id);
			$category->delete();
				return Redirect::to('/videos');
	}

}