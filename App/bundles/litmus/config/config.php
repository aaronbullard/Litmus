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
		
	),
	
	
	'scale'   => array(
						array('red'=>255, 'green'=>0, 'blue'=>0),
						array('red'=>0, 'green'=>255, 'blue'=>0),
						array('red'=>0, 'green'=>0, 'blue'=>255),
						array('red'=>190, 'green'=>200, 'blue'=>219),
	),

);//end bundles/litmus/config/config.php