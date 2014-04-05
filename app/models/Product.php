<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Product extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded 		= ["id"];

	protected $softDelete 	= true;

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function orders()
	{
		return $this->belongsToMany('Order', 'order_item');
	}

	public function orderItems()
	{
		return $this->hasMany('OrderItem');
	}

	public function category()
	{
		return $this->belongsTo('Category');
	}



}