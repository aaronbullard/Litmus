<?php

use Helpers\Util;

use Litmus\Entities\Rgba;
use Litmus\Entities\RemoteImage;
use Litmus\Roles\Swatch;

use Litmus\Contexts\CreateVarianceCtx;

use Litmus\Services\LitmusHandler;


class LitmusController extends BaseController{
	

	public $restful = true;

	protected $litmus;
	protected $account;
	protected $rgba;

	protected $control_captured;
	protected $control_actual;

	public function __construct(AccountInterface $account){

		$this->account 	= $account;

		$this->control_captured = array(
				'red'	=> 5,
				'green'	=> 5,
				'blue'	=> 201
			);

		$this->control_actual = array(
				'red'	=> 10,
				'green'	=> 10,
				'blue'	=> 200
			);

		$request = 'http://localhost:8888/litmus/laravel/public/litmus/analysis?subject=http%3A%2F%2Flocalhost%3A8888%2Flitmus%2Flaravel%2Fpublic%2Fcolormatch%2Fimage%2Fsample.jpg&palette_id=1&account=a8ccd1d9c62d4ceddf1939f6407cb3b7&token=973324ef8bb9ee932e33185e9e136a84';

	}
	
	
	/**
	 * Route to analyze images and get a JSON result.  This is the main doorway
	 * for clients to submit their images for analysis.
	 * 
	 * @return json
	 */
	public function get_analysis(){

		//Validate account
		$account	= Input::get('account');
		$token		= Input::get('token');

		$validate	= true; //$this->account->validateCredentials($account, $token);

		$rest		= (object) 'Rest';
	
		if( ! $validate ){
			
			//Login failed.
			$rest->status  = 'error';
			$rest->message = 'Login credentials are not valid.';
			
		}else{
			
			try{
				//collect results
				$data = array();

				//Get average color of sample
				if( Input::has('subject') ){
					$sample	= RemoteImage::create( Input::get('subject') );
					$data['origin'] = $sample->getRgba()->toArray();
				}

				//If scale set, get colors from scale
				if( Input::has('palette_id') ){
					$palette = Palette::find( Input::get('palette_id') )->colors()->get();
					foreach($palette as $color)
					{
						$data['palette'][] = array(
								'color'		=> $color->getRgba()->toArray(),
								'variance'	=> CreateVarianceCtx::create($color->getRgba() ,$sample->getRgba())
													->execute()->toArray()
							);
					}
					unset($color);
				}
//*				
				usort($data['palette'], function( $a, $b ){
					return strcmp($a['variance']['magnitude'], $b['variance']['magnitude']);
				});

/*
				$data['ambient']['color'] = $this->litmus->adjust_ambient(
						$data['sample']['color'],
						$this->control_captured,
						$this->control_actual
					);
//*/

				//return result object
				$time			= date('M d, Y H:i:s');
				$rest->status	= 'success';
				$rest->data		= $data;
				$rest->message	= 'Account: '.$account.' @ '.$time;
			
			}catch(Exception $e){
				
				$rest->status = 'error';
				$rest->message = $e->getMessage();
				
			}// end try/catch  
		}//end if/else

		return Response::json($rest);
	}// end Litmus_Image_Controller::get_analysis()
	
	
	/**
	 * Address for third parties to incorporate an image upload form.
	 * 
	 * @return html
	 */
	public function get_form(){

		$data = array();
		
		$data['fields'] = Config::get('litmus::config.form.image');
		
		unset($data['fields'][0]);
		unset($data['fields'][1]);
		
		foreach( Palette::all() as $palette){
			$id		= $palette->id;
			$title	= $palette->title;
			$data['fields'][4]['values'][$id] = $title;
		}
		
		$data['url']	= Input::has('url') ? Input::get('url') : '';
		$form			= View::make('litmus::partials.form', $data)->render();
		
		return $form;
		
	}

}// end Litmus_Image_Controller