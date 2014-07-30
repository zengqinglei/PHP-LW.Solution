<?php

return array(
	'custom' => array(
		'usermail' => array(
			'required' => '请填写您的 email 地址。',
			'email' => '请填写正确的 email 地址',
			'unique' => '您注册的邮箱已存在。',
			'exists' => '该账户不存在。'
		),
		'password' => array(
				'required' => '请填写您的密码。',
				'alpha_num' => '请填写正确的字母和数字。',
				'min' => '密码不能少于 :min 位。',
				'max' => '密码不能多于 :max 位。'
		),
		'validcode' => array(
			'required' => '请填写验证码。',
			'numeric' => '验证码只能为数字。',
			'in' => '验证码输入不正确。'
		),
		'pid' => array(
			'required' => '很抱歉,您选择的商品信息丢失。',
			'numeric' => '很抱歉,商品ID不正确。',
			'exists' => '很抱歉,您选择商品不存在或已被下架。'
		),
		'buy_count' => array(
			'required' => '很抱歉,您购买的总数不正确。',
			'numeric' => '很抱歉,您填写的数量不正确。',
			'min' => '很抱歉,您至少购买一个商品。'
		)
	),
);