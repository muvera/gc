<?php

class Vidcategory extends \Eloquent {
	protected $fillable = [];

	public function videos(){
	return $this->belongsToMany('Video');
	}
}