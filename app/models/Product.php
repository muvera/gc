<?php

class Product extends \Eloquent {
	protected $fillable = [];

		public function categories()
	{
		return $this->belongsToMany('Category');
	}

		public function styles()
	{
		return $this->belongsToMany('Style');
	}

		public function sizes()
	{
		return $this->belongsToMany('Size');
	}

		public function designs()
	{
		return $this->belongsToMany('Design');
	}

		public function Pproducts()
	{
		return $this->belongsToMany('Pproduct');
	}

}