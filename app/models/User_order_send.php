<?php
class User_order_send extends Eloquent
{
	protected $table = 'user_order_send';
	
	protected $primaryKey = 'orderid';
	
	public $timestamps = false;
}