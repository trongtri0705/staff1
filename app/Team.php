<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $table = 'teams';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id','avatar','address'];
	protected $hidden = ['password'];
	public $timestamps = false;
	public function detail()
	{
		return $this->hasMany('App\TeamDetail');
	}
}
