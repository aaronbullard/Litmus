<?php namespace Litmus\Api;

interface LitmusInterface
{
	public function set_palette_id($palette_id);
	public function set_subject_url($image_url);
	public function set_control_url($image_url);
	public function get($data = array());
}// end interface Litmus_i