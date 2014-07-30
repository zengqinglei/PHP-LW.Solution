<?php
class Giftcard extends Eloquent
{
	protected $table = 'giftcard';
	
	protected $primaryKey = 'card_id';
	
	public $timestamps = false;
}