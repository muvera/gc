<?php

class Img extends \Eloquent {
	protected $fillable = [];

	public function Learnings(){
		return $this->belongsToMany('Learning');
	}
}