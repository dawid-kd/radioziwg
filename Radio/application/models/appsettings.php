<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * @package wybierampl
 * @copyright Copyright (c) 2012, Global4Net
 * @link http://www.global4net.com/
 */
class AppSettings extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getData($args = array())
	{
		$key = isset($args['key']) ? $args['key'] : '';

		$this->db->select('key, value');
		$this->db->from('appSettings');

		if (!empty($key))
		{
			$this->db->where('key', $key);
		}

		$query = $this->db->get();
		$result = array();

		if ($query->num_rows() == 1)
		{
			$result = $query->row();
		}
		elseif ($query->num_rows() > 0)
		{
			$result = $query->result();

			foreach ($result as $row)
			{
				$result[$row->key] = $row->value;
			}
		}

		return $result;
	}

	public function setData($args = array())
	{
		$this->db->update_batch('appSettings', $args, 'key');
	}
}

/* End of file appsettings.php */
/* Location: ./application/models/appsettings.php */