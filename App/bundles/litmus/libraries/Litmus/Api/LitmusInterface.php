<?php namespace Litmus\Api;

interface LitmusInterface
{
	public function set_scale_id($scale_id);
	public function set_sample_url($image);
	public function set_control_url($image);
	public function analyze($data = array());
}// end interface Litmus_i