<?php
class Messages extends Eloquent {

	protected $guarded = array();
	public $timestamps = false;
	
	public function from() {
        return $this->belongsTo('User', 'from_user_id')->first();
    }
	
	public function to() {
        return $this->belongsTo('User', 'to_user_id')->first();
    }
	
	public static function markSeen() {
		$this->status = 'readed';
        $this->save();
	}

}