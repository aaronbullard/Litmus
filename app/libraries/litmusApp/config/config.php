<?php

return array(

	'app_name'	=> 'Virtual Litmus Test',

	'dimension'	=> array(
						'target'	=> array(
											array(0.1, 0.1),
											array(0.5, 0.9)
											),
						'control'	=> array(
											array(0.5, 0.1),
											array(0.9, 0.9)
											),
	),
	
	'private_key'	=> 'reset_this_key',
	
	'form'		=> array(
						'user'		=>array(
											array(
												'name'	=> 'email',
												'label'	=> 'Email',
												'type'	=> 'text',
												'rule'	=> 'unique:users|required|email',
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
						'image'		=> array(
											array(
												'name'	=> 'account',
												'label'	=> 'Account',
												'type'	=> 'text',
												'rule'	=> 'required|size:32|exists',
											),
											array(
												'name'	=> 'token',
												'label'	=> 'Token',
												'type'	=> 'text',
												'rule'	=> 'required|size:32',
											),
											array(
												'name'	=> 'sample',
												'label'	=> 'Sample Image',
												'type'	=> 'file',
												'rule'	=> 'required|image',
											),
											array(
												'name'	=> 'control',
												'label'	=> 'Control Image',
												'type'	=> 'file',
												'rule'	=> 'image',
											),
											array(
												'name'	=> 'scale_id',
												'label'	=> 'Palettes',
												'type'	=> 'select',
												'rule'	=> 'integer',
											),
						),
						'palette'	=> array(
											array(
												'name'	=>	'title',
												'label'	=>	'Palette Name',
												'type'	=>	'text',
												'rule'	=>	'required',
											),
											array(
												'name'	=>	'description',
												'label'	=>	'Brief Description',
												'type'	=>	'textarea',
												'rule'	=>	'size:200',
											),
						),
						'color'		=> array(
											array(
												'name'	=>	'name',
												'label'	=>	'Color\'s Name',
												'type'	=>	'text',
												'rule'	=>	'required',
											),
											array(
												'name'	=>	'red',
												'label'	=>	'Red',
												'type'	=>	'number',
												'rule'	=>	'required|integer|min:0|max:255',
											),
											array(
												'name'	=>	'green',
												'label'	=>	'Green',
												'type'	=>	'number',
												'rule'	=>	'required|integer|min:0|max:255',
											),
											array(
												'name'	=>	'blue',
												'label'	=>	'Blue',
												'type'	=>	'number',
												'rule'	=>	'required|integer|min:0|max:255',
											),
											array(
												'name'	=>	'alpha',
												'label'	=>	'Alpha',
												'type'	=>	'number',
												'rule'	=>	'integer|min:0|max:255',
											),
									/*		array(
												'name'	=>	'hex',
												'label'	=>	'Hex',
												'type'	=>	'text',
												'rule'	=>	'match:/^[#][0-9A-F]+$/',
											), */
						),
		
	),
	
	
	'scale'   => array(
						array('red'=>255, 'green'=>0, 'blue'=>0),
						array('red'=>0, 'green'=>255, 'blue'=>0),
						array('red'=>0, 'green'=>0, 'blue'=>255),
						array('red'=>190, 'green'=>200, 'blue'=>219),
	),

);//end bundles/litmus/config/config.php