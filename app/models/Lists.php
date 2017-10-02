<?php
class Lists extends Eloquent {

	protected $guarded = array();
	public $timestamps = false;
		
	public function user() {
        return $this->belongsTo('User')->first();
    }
	
	public function users() {
        return $this->hasMany('ListsUsers')->orderBy('id','desc');
    }	
	
	public function shots() {
        return $this->hasMany('Shots','id')->orderBy('id','desc');
    }
	
}