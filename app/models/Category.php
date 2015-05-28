<?php

class Category extends \Eloquent {
	protected $fillable = [];

	public function products()
	{
		return $this->belongsToMany('Product');
	}

}