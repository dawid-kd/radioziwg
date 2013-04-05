<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/* --------------------------------------------------------------------------
 * Customizing the Pagination
 * --------------------------------------------------------------------------
 * 
 * The following is a list of all the preferences you can pass to the initialization function to tailor the display.
 * 
 * 'per_page' = The number of items you intend to show per page.
 * 'uri_segment' = The pagination function automatically determines which segment of your URI contains the page number.
 * 'num_links' = The number of "digit" links you would like before and after the selected page number.
 * 'use_page_numbers' = By default, the URI segment will use the starting index for the items you are paginating. If you prefer to show the the actual page number, set this to TRUE.
 * 'page_query_string' = By default, the pagination library assume you are using URI Segments.
 */

$config['per_page'] = 20;
$config['uri_segment'] = 3;
$config['num_links'] = 2;
$config['use_page_numbers'] = FALSE;
$config['page_query_string'] = FALSE;

/* --------------------------------------------------------------------------
 * Adding Enclosing Markup
 * --------------------------------------------------------------------------
 * 
 * If you would like to surround the entire pagination with some markup you can do it with these two prefs:
 * 
 * 'full_tag_open' = The opening tag placed on the left side of the entire result.
 * 'full_tag_close' = The closing tag placed on the right side of the entire result.
 */

$config['full_tag_open'] = '<div class="pagination">';
$config['full_tag_close'] = '<div class="clr"></div></div>';

/* --------------------------------------------------------------------------
 * Customizing the First Link
 * --------------------------------------------------------------------------
 * 
 * 'first_link' = The text you would like shown in the "first" link on the left. If you do not want this link rendered, you can set its value to FALSE.
 * 'first_tag_open' = The opening tag for the "first" link.
 * 'first_tag_close' = The closing tag for the "first" link.
 */

$config['first_link'] = '&lt;&lt;';
$config['first_tag_open'] = '<div class="fl first">';
$config['first_tag_close'] = '</div>';

/* --------------------------------------------------------------------------
 * Customizing the Last Link
 * --------------------------------------------------------------------------
 * 
 * 'last_link' = The text you would like shown in the "last" link on the right. If you do not want this link rendered, you can set its value to FALSE.
 * 'last_tag_open' = The opening tag for the "last" link.
 * 'last_tag_close' = The closing tag for the "last" link.
 */

$config['last_link'] = '&gt;&gt;';
$config['last_tag_open'] = '<div class="fl last">';
$config['last_tag_close'] = '</div>';

/* --------------------------------------------------------------------------
 * Customizing the "Next" Link
 * --------------------------------------------------------------------------
 * 
 * 'next_link' = The text you would like shown in the "next" page link. If you do not want this link rendered, you can set its value to FALSE.
 * 'next_tag_open' = The opening tag for the "next" link.
 * 'next_tag_close' = The closing tag for the "next" link.
 */

$config['next_link'] = '&gt;';
//$config['next_link'] = '';
$config['next_tag_open'] = '<div class="fl next">';
$config['next_tag_close'] = '</div>';

/* --------------------------------------------------------------------------
 * Customizing the "Previous" Link
 * --------------------------------------------------------------------------
 * 
 * 'prev_link' = The text you would like shown in the "previous" page link. If you do not want this link rendered, you can set its value to FALSE.
 * 'prev_tag_open' = The opening tag for the "previous" link.
 * 'prev_tag_close' = The closing tag for the "previous" link.
 */

$config['prev_link'] = '&lt;';
//$config['prev_link'] = '';
$config['prev_tag_open'] = '<div class="fl previous">';
$config['prev_tag_close'] = '</div>';

/* --------------------------------------------------------------------------
 * Customizing the "Current Page" Link
 * --------------------------------------------------------------------------
 * 
 * 'cur_tag_open' = The opening tag for the "current" link.
 * 'cur_tag_close' = The closing tag for the "current" link.
 */

$config['cur_tag_open'] = '<div class="fl current"><a>';
$config['cur_tag_close'] = '</a></div>';

/* --------------------------------------------------------------------------
 * Customizing the "Digit" Link
 * --------------------------------------------------------------------------
 * 
 * 'num_tag_open' = The opening tag for the "digit" link.
 * 'num_tag_close' = The closing tag for the "digit" link.
 */

$config['num_tag_open'] = '<div class="fl digit">';
$config['num_tag_close'] = '</div>';

/* --------------------------------------------------------------------------
 * Hiding the Pages
 * --------------------------------------------------------------------------
 * 
 * If you wanted to not list the specific pages (for example, you only want "next" and "previous" links), you can suppress their rendering.
 */

$config['display_pages'] = TRUE;

/* --------------------------------------------------------------------------
 * Adding a class to every anchor
 * --------------------------------------------------------------------------
 * 
 * If you want to add a class attribute to every link rendered by the pagination class, you can set the config "anchor_class" equal to the classname you want.
 */

$config['anchor_class'] = 'page';

/* End of file pagination.php */
/* Location: ./application/config/pagination.php */