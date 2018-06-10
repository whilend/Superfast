<?php

namespace Superfast;

defined('SUPERFAST') OR exit('Direct access denied');

class SF_Response
{
	public $json;

	public function __construct()
	{
		$this->json = (object) Array();
	}

	public function write($data)
	{
		if (is_string($data))
		{
			echo $data;
		}
		elseif (is_array($data) || is_object($data))
		{
			$this->write_json($data);
		}
	}

	public function write_json($data = NULL)
	{
		if (!$data) $data = $this->json;

		header('Content-Type: text/json; Charset: UTF-8');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}
}

class SF_Request
{
	public $uri = '';

	public function __construct()
	{
		$this->uri = $_GET['_url'];
	}

	public function post($name)
	{
		return $this->_get_post($name, $_POST);
	}

	public function get($name)
	{
		return $this->_get_post($name, $_GET);
	}

	private function _get_post($name, $array)
	{
		if (isset($array[$name]))
		{
			return $array[$name];
		}
		else
		{
			return NULL;
		}
	}
}