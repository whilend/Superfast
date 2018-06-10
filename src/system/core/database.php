<?php

namespace Superfast;

defined('SUPERFAST') OR exit('Direct access denied');

use Medoo\Medoo;

class SF_Database_Result
{
	private $data;

	public $rows;

	public function __construct($data)
	{
		$this->data = $data;
		$this->rows = count($data);
	}

	public function result($type = 'object')
	{
		return $this->_output($this->data, $type);
	}

	public function first($type = 'object')
	{
		return $this->rows > 0 ? $this->_output($this->data[0], $type) : NULL;
	}

	private function _output($input, $type)
	{
		if ($type == 'object')
		{
			return json_decode(json_encode($input, JSON_UNESCAPED_UNICODE));
		}
		elseif ($type == 'array')
		{
			return $input;
		}
		else
		{
			return NULL;
		}
	}
}

class SF_Database extends Medoo
{
	function select($table, $join = '*', $columns = null, $where = null)
	{
		$result = parent::select($table, $join, $columns, $where);
		return new SF_Database_Result($result);
	}
}