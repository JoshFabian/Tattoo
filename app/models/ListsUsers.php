<?php
class ListsUsers extends Eloquent {

	protected $guarded = array();
	public $timestamps = false;
		
	public function user() {
        return $this->belongsTo('User')->first();
    }
	
	public function users() {
        return $this->hasMany('Lists')->orderBy('id','desc');
    }
	
	public function members() {
        return $this->hasMany('ListsUsers','lists_id')->orderBy('id','desc');
    }
	
}