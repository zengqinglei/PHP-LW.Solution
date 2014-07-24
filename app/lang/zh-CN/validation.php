<?php

return array(
	'custom' => array(
		'usermail' => array(
			'required' => '请填写您的 email 地址。',
			'email' => '请填写正确的 email 地址'
		),
		'password' => array(
				'required' => '请填写您的密码。',
				'alpha_num' => '请填写正确的字母和数字。',
				'min' => '密码不能少于 :min 位。',
				'max' => '密码不能多于 :max 位。'
		),
	),
);