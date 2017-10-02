<?php
class Notifications extends Eloquent {

	protected $guarded = array();
	public $timestamps = false;
		
	public function user() {
        return $this->belongsTo('User')->first();
    }
	
	public static function send( $destination, $session_id, $type, $target ){
		
		DB::table('notifications')->insert(
		    	array(
		    		'destination' => $destination, 
		    		'author' => $session_id,
		    		'type' => $type,
		    		'target' => $target
			)
		);

	}

}