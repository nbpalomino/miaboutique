<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Order extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'order';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded 	= ["id"];

	protected $softDelete 	= true;

	/**
	 * Get the account relation.
	 *
	 * @return Account
	 */
	public function account()
	{
		return $this->belongsTo("Account");
	}

	/**
	 * Get order items
	 *
	 * @return OrderItem
	 */
	public function orderItems()
	{
		return $this->hasMany("OrderItem");
	}

	public function products()
	{
		return $this->belongsToMany("Product", "order_item");
	}

}