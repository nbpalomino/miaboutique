<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class OrderItem extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'order_item';

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
	public function product()
	{
		return $this->belongsTo("Product");
	}

	/**
	 * Get order items
	 *
	 * @return OrderItem
	 */
	public function order()
	{
		return $this->belongsTo("Order");
	}

}