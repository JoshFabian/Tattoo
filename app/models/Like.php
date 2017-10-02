<?php
class Like extends Eloquent {

	protected $guarded = array();
	public $timestamps = false;
	
	public function user() {
        return $this->belongsTo('User')->first();
    }

}