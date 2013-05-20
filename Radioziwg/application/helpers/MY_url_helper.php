<?php

if(!function_exists('render_url')){
    function render_url($link, $radio = ''){
        if(empty($radio)){
            if(isset($_GET['radio'])){
                $radio = $_GET['radio'];
            }else{
                $radio = 'none';
            }
        }
        return base_url($link).(strpos($link, '?') === FALSE?'?radio=':'&radio=').$radio;
    }
}
?>
