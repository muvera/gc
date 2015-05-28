<?php

class Style extends \Eloquent {
	protected $fillable = [];


		public function products()
	{
		return $this->belongsToMany('Product');
	}

		public function designs()
	{
		return $this->belongsToMany('Design');
	}

}