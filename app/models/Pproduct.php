<?php

class Pproduct extends \Eloquent {
	protected $fillable = [];

	public function Products(){
		$this->belongsToMany('Product');
	}
}