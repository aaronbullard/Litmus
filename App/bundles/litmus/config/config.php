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
	
	'form'		=> array(
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
												'label'	=> 'Scale ID',
												'type'	=> 'text',
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
											array(
												'name'	=>	'account',
												'label'	=>	NULL,
												'type'	=>	'hidden',
												'rule'	=>	'size:32',
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
												'type'	=>	'text',
												'rule'	=>	'required',
											),
											array(
												'name'	=>	'green',
												'label'	=>	'Green',
												'type'	=>	'text',
												'rule'	=>	'required',
											),
											array(
												'name'	=>	'blue',
												'label'	=>	'Blue',
												'type'	=>	'text',
												'rule'	=>	'required',
											),
											array(
												'name'	=>	'alpha',
												'label'	=>	'Alpha',
												'type'	=>	'text',
												'rule'	=>	'',
											),
											array(
												'name'	=>	'hex',
												'label'	=>	'Hex',
												'type'	=>	'text',
												'rule'	=>	'',
											),
						),
		
	),
	
	
	'scale'   => array(
						array('red'=>255, 'green'=>0, 'blue'=>0),
						array('red'=>0, 'green'=>255, 'blue'=>0),
						array('red'=>0, 'green'=>0, 'blue'=>255),
						array('red'=>190, 'green'=>200, 'blue'=>219),
	),

);//end bundles/litmus/config/config.php