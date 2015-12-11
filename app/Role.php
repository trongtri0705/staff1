<?php namespace App;

use App\Custom\Active\ActiveModel;

class Role extends ActiveModel{

	//
	public $timestamps = false;
	public $owners = false;
	public $alias = false;
	protected $table = 'roles';
	protected $fillable = ['name','alias'];
	function level()
	{
		return $this->hasMany('App\Level');
	}

}
