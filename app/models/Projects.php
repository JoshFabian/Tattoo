<?php
class Projects extends Eloquent {

	protected $guarded = array();
	public   $timestamps = false;
		
	public function user() {
        return $this->belongsTo('User')->first();
    }
	
	public function shots() {
        return $this->hasMany('Shots','id_project')->where('status',1)->orderBy('created_project','desc');
    }		
}