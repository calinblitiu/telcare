<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/19/2017
 * Time: 2:11 AM
 */

require "vendor/autoload.php";
use OpenTok\OpenTok;
use OpenTok\MediaMode;
use OpenTok\ArchiveMode;

//$opentok_apikey = "45927742";
//$opentok_secret = "0de4539fd865233ee03c7c9d7ff2b6bb19b3c9fc";
//$opentok = new OpenTok($opentok_apikey, $opentok_secret);
//$session = $opentok->createSession();
//$token = $session->generateToken();
//var_dump($opentok);
//var_dump($session);
//var_dump($token);

Class MyOpentokApi
{
    private $opentok_apikey = "45927742";
    private $opentok_secret = "0de4539fd865233ee03c7c9d7ff2b6bb19b3c9fc";
    private $opentok;

    public function createNewSessionAndToken()
    {
        $this->opentok = new OpenTok($this->opentok_apikey, $this->opentok_secret);
        $session = $this->opentok->createSession();
        $sessionId = $session->getSessionId();
        $token = $session->generateToken();
//        var_dump($opentok);
//        var_dump($session);
//        var_dump($token);
        $data['opentok_session_id'] = $sessionId;
        $data['opentok_token'] = $token;
        echo json_encode($data);
    }
}

$opentok = new MyOpentokApi();
$opentok->createNewSessionAndToken();
