<?php

use Helpers\Util;

use Litmus\Entities\Rgba;
use Litmus\Entities\Subject;
use Litmus\Entities\Control;

use Litmus\Contexts\ComparisonCtx;

use Litmus\Factories\CreateSwatchComparison;

use Litmus\Services\LitmusHandler;


class LitmusController extends BaseController{
	

	public $restful = true;

	protected $litmus;
	protected $account;
	protected $rgba;

	protected $control_captured;
	protected $control_actual;

	public function __construct(LitmusHandler $litmus, AccountInterface $account){
		$this->litmus  	= $litmus;
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

				$sample;
				$control;

				//Get average color of sample
				if( Input::has('sample') ){
					$sample	= new Subject( Input::get('sample') );
				}

				//Get analysis for control
				if( Input::has('control') ){
					$control = new Control( Input::get('control') );
				}

				// Use CreateSwatchComparison
				$control = new CreateSwatchComparison( $control, $sample );

return Util::dump($control, 0);
				
				//If scale set, get colors from scale
				if( Input::has('scale_id') ){
					$scale_id	= Input::get('scale_id');
					$scale		= Palette::find($scale_id)->colors()->get();
					foreach($scale as $c){
						$clr 	= new Rgba($c->red, $c->green, $c->blue, 1, $c->name);
						$swatch = new Swatch;
						$swatch->setColor($clr);
						$swatch = new ComparisonCtx( $sample, $swatch );
					}
				}
/*//				
				usort($data['scale'], function($a, $b){
					return strcmp($a['magnitude'], $b['magnitude']);
				});


				$data['ambient']['color'] = $this->litmus->adjust_ambient(
						$data['sample']['color'],
						$this->control_captured,
						$this->control_actual
					);
*/

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