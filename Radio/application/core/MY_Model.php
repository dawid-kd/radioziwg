<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * @package wybierampl
 * @copyright Copyright (c) 2012, Global4Net
 * @link http://www.global4net.com/
 */
class MY_Model extends CI_Model
{
	/**
	 * @var int $counter
	 */
	private $counter = 0;

	/**
	 * @var string $table_name
	 */
	private $table_name = '';

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @return int
	 */
	public function get_counter()
	{
		return $this->counter;
	}

	/**
	 * @return int
	 */
	public function get_counter_all()
	{
		$this->db->from($this->get_table_name());
		$this->db->where('isActive', 1);

		return $this->db->count_all_results();
	}

	/**
	 * @param array $args
	 * @return array
	 */
	public function get_data($args = array())
	{
		$id = isset($args['id']) ? $args['id'] : 0;
		$order_by = isset($args['orderBy']) ? $args['orderBy'] : 'id';
		$order_dir = isset($args['orderDir']) ? $args['orderDir'] : 'DESC';
		$limit = isset($args['limit']) ? $args['limit'] : 0;
		$offset = isset($args['offset']) ? $args['offset'] : 0;

		$this->db->select();
		$this->db->from($this->get_table_name());
		$this->db->where('isActive', 1);

		$sql_cnt = "SELECT COUNT(1) AS quantity FROM " . $this->get_table_name();
		$sql_cnt .= " WHERE isActive = 1";

		if ($id > 0)
		{
			$this->db->where('id', $id);
			$sql_cnt .= " AND id = " . $id;
		}

		$this->db->order_by($order_by, $order_dir);

		if ($limit > 0)
		{
			$this->db->limit($limit, $offset);
		}

		$query = $this->db->get();
		$result = array();

		if ($query->num_rows() == 1 && $id > 0)
		{
			$result = $query->row();
			$this->prepare_row($result);
		}
		elseif ($query->num_rows() > 0)
		{
			$result = $query->result();

			foreach ($result as $row)
			{
				$this->prepare_row($row);
			}
		}

		$cnt = $this->db->query($sql_cnt);
		$row_cnt = $cnt->row_array(0);
		$this->set_counter(intval($row_cnt['quantity']));

		return $result;
	}

	/**
	 * @return string
	 */
	protected function get_table_name()
	{
		return $this->table_name;
	}

	/**
	 * @param object $row
	 */
	protected function prepare_row(&$row)
	{
		$row->id = (int)$row->id;

		if (isset($row->addDate))
		{
			$row->addDate = new DateTime($row->addDate);
		}
	}

	/**
	 * @param int $val
	 */
	public function set_counter($val)
	{
		$this->counter = $val;
	}

	/**
	 * @param array $args
	 * @return int
	 */
	public function set_data($args = array())
	{
		if (count($args) == 0)
		{
			return 0;
		}

		$id = isset($args['id']) ? $args['id'] : 0;

		if ($id > 0)
		{
			$this->db->where('id', $id);
			$this->db->update($this->get_table_name(), $args);
		}
		else
		{
			$this->db->insert($this->get_table_name(), $args);
			$id = $this->db->insert_id();
		}

		return $id;
	}

	/**
	 * @param string $val
	 */
	protected function set_table_name($val)
	{
		$this->table_name = $val;
	}
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */