<?php
class TeamMembers extends Eloquent {
	
	protected $guarded = array();
	public   $timestamps = false;
		
	public function users() {
        return $this->belongsTo('User')->first();
    }

}