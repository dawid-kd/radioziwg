<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/*
 * -------------------------------------------------------------------------
 * Profiler Sections
 * -------------------------------------------------------------------------
 * This file lets you determine whether or not various sections of Profiler
 * data are displayed when the Profiler is enabled.
 * Please see the user guide for info:
 *
 * http://codeigniter.com/user_guide/general/profiling.html
 *
 * Available sections and the array key used to access them:
 *
 * 'benchmarks' = Elapsed time of Benchmark points and total execution time.
 * 'config' = CodeIgniter Config variables.
 * 'controller_info' = The Controller class and method requested.
 * 'get' = Any GET data passed in the request
 * 'http_headers' = The HTTP headers for the current request.
 * 'memory_usage' = Amount of memory consumed by the current request, in bytes.
 * 'post' = Any POST data passed in the request.
 * 'queries' = Listing of all database queries executed, including execution time.
 * 'uri_string' = The URI of the current request.
 * 'query_toggle_count' = The number of queries after which the query block will default to hidden.
 */

$config['benchmarks'] = TRUE;
$config['config'] = TRUE;
$config['controller_info'] = TRUE;
$config['get'] = TRUE;
$config['http_headers'] = TRUE;
$config['memory_usage'] = FALSE;
$config['post'] = TRUE;
$config['queries'] = TRUE;
$config['uri_string'] = TRUE;
$config['query_toggle_count'] = 25;

/* End of file profiler.php */
/* Location: ./application/config/profiler.php */