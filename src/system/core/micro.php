<?php

namespace Superfast\Micro;

defined('SUPERFAST') OR exit('Direct access denied');

class MicroApplication
{
	private $methods = Array();
	private $preloaders = Array();
	private $config;

	public $db = NULL;
	public $response;
	public $request;

	public function __construct($config)
	{
		$this->config = $config;

		$this->response = new \Superfast\SF_Response();
		$this->request = new \Superfast\SF_Request();
		
		if (isset($config['db']))
		$this->db = new \Superfast\SF_Database($config['db']);
	}

	public function method($url, $callback)
	{
		$this->methods[] = Array(
			'url' => $url,
			'callback' => $callback
		);
	}

	public function preload($callback)
	{
		$this->preloaders[] = $callback;
	}

	public function run()
	{
		$url = $this->request->uri;

		foreach ($this->preloaders as $method)
		{
			$method($this->request, $this->response, $this);
		}

		foreach ($this->methods as $method)
		{
			if ($method['url'] == $url)
			{
				$method['callback']($this->request, $this->response, $this);
				break;
			}
		}
	}
}