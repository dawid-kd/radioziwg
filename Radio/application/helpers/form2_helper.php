<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * @param array $position
 * @return string
 */
if (!function_exists('form_pos'))
{

	function form_pos($position = array())
	{
		$form = '';

		switch ($position['type'])
		{
			case 'email':
			case 'text':
				{
					$form .= '<div class="formPos">';
					$form .= '<div>' . form_label($position['label'], $position['name']) . '</div>';
					unset($position['label']);
					$form .= '<div class="fl">' . form_input($position) . '</div>';
					$form .= '<div class="fl">' . form_error($position['name']) . '</div>';
					$form .= '<div class="clr"></div>';
					$form .= '</div>';

					break;
				}
			case 'textarea':
				{
					$form .= '<div class="formPos">';
					$form .= '<div>' . form_label($position['label'], $position['name']) . '</div>';
					unset($position['label']);
					$form .= '<div class="fl">' . form_textarea($position) . '</div>';
					$form .= '<div class="fl">' . form_error($position['name']) . '</div>';
					$form .= '<div class="clr"></div>';
					$form .= '</div>';

					break;
				}
			case 'password':
				{
					$form .= '<div class="formPos">';
					$form .= '<div>' . form_label($position['label'], $position['name']) . '</div>';
					unset($position['label']);
					$form .= '<div class="fl">' . form_password($position) . '</div>';
					$form .= '<div class="fl">' . form_error($position['name']) . '</div>';
					$form .= '<div class="clr"></div>';
					$form .= '</div>';

					break;
				}
			case 'checkbox':
				{
					$form .= '<div class="formPos">';
					$label = form_label($position['label'], $position['name']);
					unset($position['label']);
					$form .= '<div class="fl">' . form_checkbox($position) . $label . '</div>';
					$form .= '<div class="fl">' . form_error($position['name']) . '</div>';
					$form .= '<div class="clr"></div>';
					$form .= '</div>';

					break;
				}
			case 'dropdown':
				{
					$form .= '<div class="formPos">';
					$form .= '<div>' . form_label($position['label'], $position['name']) . '</div>';
					$form .= '<div class="fl">' . form_dropdown($position['name'], $position['select'], $position['value']) . '</div>';
					$form .= '<div class="fl">' . form_error($position['name']) . '</div>';
					$form .= '<div class="clr"></div>';
					$form .= '</div>';

					break;
				}
			case 'file':
				{
					$form .= '<div class="formPos">';
					$form .= '<div>' . form_label($position['label'], $position['name']) . '</div>';
					$form .= '<div><img src="' . base_url($position['src']) . '" /></div>';
					$form .= '<div class="fl">' . form_upload($position['name']) . '</div>';
					$form .= '<div class="fl">' . form_error($position['name']) . '</div>';
					$form .= '<div class="clr"></div>';
					$form .= '<small>dozwolone rozszerzenia: <b>' . $position['extensions'] . '</b></small>';
					$form .= '</div>';

					break;
				}
			case 'submit':
				{
					$form .= '<div class="submitDiv">' . form_submit($position) . '</div>';

					break;
				}
			case 'hidden':
				{
					$form .= form_hidden($position);

					break;
				}
		}

		return $form;
	}
}

/* End of file form2_helper.php */
/* Location: ./application/helpers/form2_helper.php */