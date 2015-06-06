<?php

class Video extends \Eloquent {
	protected $fillable = [];

	public function Vidcategories(){
	return $this->belongsToMany('Vidcategory');
	}
}