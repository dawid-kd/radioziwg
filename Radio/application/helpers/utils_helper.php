<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

if (!function_exists('getInt'))
{

	function getInt($val)
	{
		$val = '' . $val;

		if (strpos($val, ',') > 0)
		{
			$val = substr($val, 0, strpos($val, ',')) . '.' . substr($val, strpos($val, ',') + 1);
		}

		if (!is_numeric($val))
		{
			return 0;
		}

		return (0 + $val);
	}
}

if (!function_exists('var_dump_html'))
{

	function var_dump_html($var)
	{
		echo "<pre style='border: 1px solid black; background-color: lightgrey; margin: 20px 0; overflow: auto;'>";
		var_dump($var);
		echo "</pre>";
	}
}

/* End of file utils_helper.php */
/* Location: ./application/helpers/utils_helper.php */