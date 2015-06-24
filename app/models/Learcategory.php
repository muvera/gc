<?php

class Learcategory extends \Eloquent {
	protected $fillable = [];

		public function Learnings(){
	return $this->belongsToMany('Learning');
	}
}