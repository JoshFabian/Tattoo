<?php
class Visits extends Eloquent {

	protected $guarded = array();
	public $timestamps = false;
	
	public function user() {
        return $this->belongsTo('User')->first();
    }
			
	public function shots(){
		return $this->belongsTo('Shots')->first();
	}

}