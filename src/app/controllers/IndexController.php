<?php
use Phalcon\Mvc\Controller;
use Phalcon\Security\JWT\Token\Parser;
use Phalcon\Security\JWT\Validator;

class IndexController extends Controller
{
    public function indexAction()
    {
        // redirected to index view
    }

    public function jwtAction()
    {
        $token = $_POST['token'];
        $payload = decode($token);
        echo "<pre>";
        print_r($payload);
        die;
        $this->view->data = json_encode($payload);
    }
}
function decode($token)
{
    $parser = new Parser();
    $tokenObject = $parser->parse($token);
    return $tokenObject->getClaims()->getPayload();
}