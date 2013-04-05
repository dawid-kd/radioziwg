<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of odtphp_gen
 *
 * @author Igor
 */
class Odtphp_gen extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

function populate_odt($vars,$tablevars,$doc_file,$title)
{
    require_once("system/helpers/odtphp/odf.php"); 
    $odf = new odf($doc_file);
    if(!$vars==null){
    foreach($vars as $key=>$value) {
    $odf->setVars($key, $value);
    }
    }
    $course = $odf->setSegment('courses');
    foreach($tablevars AS $newcourse) {
        foreach($newcourse AS $key=>$value) 
        $course->$key($newcourse[$key]);
    //$course->titlecourse($newcourse['title']);
    //$course->ectscourse($newcourse['ects']);
    $course->merge();
}
$odf->mergeSegment($course);
//export the file
$odf->saveToDisk('files/'.$title);
}
}
?>
