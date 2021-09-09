<?php

if (!function_exists('formatUserData')) {
    function formatUserData($data) {
    	$res = array();
    	if($data != null){
    		$res = array(
						"fullname"=> $data->name.' ',
						"photo"=> if($data->photo != null){$data->photo}else{ "defaultUser.png"} ,

			);
    	}
        return $res;
    }
}