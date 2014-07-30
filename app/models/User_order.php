<?php
class User_order extends Eloquent
{
	protected $table = 'user_order';
	
	protected $primaryKey = 'ordernmb';
	
	public $timestamps = false;
}