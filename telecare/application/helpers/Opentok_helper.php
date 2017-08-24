<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/19/2017
 * Time: 3:20 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
if (!function_exists("createNewOpentokSession"))
{
     function createNewOpentokSession()
    {
        //$opentok = new MyOpentokApi();
        //$opentok->index();
        $url = base_url()."opentok.php";
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$url);
        // Execute
        $result=curl_exec($ch);
        // Closing
        curl_close($ch);

        // Will dump a beauty json :3
        $result = json_decode($result, true);
        if ($result == null)
        {
            return false;
        }
        return $result;
    }
}
