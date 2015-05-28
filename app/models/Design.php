<?php

class Design extends \Eloquent {
	protected $fillable = [];

			public function products()
	{
		return $this->belongsToMany('Product');
	}


		public function styles()
	{
		return $this->belongsToMany('Style');
	}
}