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
    private $opentok_apikey = "45947752";
    private $opentok_secret = "a6663c33deec1bba20ed0ebc02a29c1460e7f0a1";
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
        if ($token == null || $sessionId == null)
        {
            $data["success"] = 0;
            $data["error"] = "Opentok session create error";
            echo json_encode($data);
            exit();
        }
        $data['opentok_session_id'] = $sessionId;
        $data['opentok_token'] = $token;
        var_dump($this->opentok);
    }
}

$opentok = new MyOpentokApi();
$opentok->createNewSessionAndToken();
