<?php

return array(

	'private_key'	=> 'reset_this_key',
	
	'form'			=> array(
							array(
								'name'	=> 'email',
								'label'	=> 'Email',
								'type'	=> 'text',
								'rule'	=> 'unique:appapi_users|required|email',
							),
							array(
								'name'	=> 'firstname',
								'label'	=> 'First Name',
								'type'	=> 'text',
								'rule'	=> 'required',
							),
							array(
								'name'	=> 'lastname',
								'label'	=> 'Last Name',
								'type'	=> 'text',
								'rule'	=> 'required',
							),
							array(
								'name'	=> 'street',
								'label'	=> 'Street Address',
								'type'	=> 'text',
								'rule'	=> 'required',
							),
							array(
								'name'	=> 'city',
								'label'	=> 'City',
								'type'	=> 'text',
								'rule'	=> 'required',
							),
							array(
								'name'	=> 'state',
								'label'	=> 'State',
								'type'	=> 'text',
								'rule'	=> 'required|size:2|alpha',
							),
							array(
								'name'	=> 'zipcode',
								'label'	=> 'Zipcode',
								'type'	=> 'text',
								'rule'	=> 'required|min:5|numeric',
							),
							array(
								'name'	=> 'phone',
								'label'	=> 'Phone',
								'type'	=> 'text',
								'rule'	=> 'match:^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$^',
							),
							array(
								'name'	=> 'account',
								'rule'	=> 'unique:appapi_users',
							),
							array(
								'name'	=> 'token',
								'rule'	=> '',
							),
						),

);