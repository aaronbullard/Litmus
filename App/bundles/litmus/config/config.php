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

);//end bundles/litmus/config/config.php