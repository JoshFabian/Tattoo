<?php
class MembersReported extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 
	 protected $table = 'members_reported';
	 protected $guarded = array();
	 public $timestamps = false;
	
	 public function user(){
		return $this->belongsTo('User')->first();
	}
	 
	 public function user_reported(){
		return $this->belongsTo('User','id_reported')->first();
	}

}