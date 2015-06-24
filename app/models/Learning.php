<?php

class Learning extends \Eloquent {
	protected $fillable = [];

	public function Learcategories(){
	return $this->belongsToMany('Learcategory');
	}

	public function Imgs(){
	return $this->belongsToMany('Img');
	}
}