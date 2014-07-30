<?php
class User_order_address extends Eloquent
{
	protected $table = 'user_order_address';
	
	protected $primaryKey = 'orderid';
	
	public $timestamps = false;
}