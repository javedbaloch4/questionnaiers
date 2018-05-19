<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
	protected $guarded = []; // I won't do this in production :p

	public function subject() {
		return $this->belongsTo( Questionnaire::class );
	}

	public function choices() {
		return $this->hasMany( Choice::class );
	}

}
