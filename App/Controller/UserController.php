<?php


use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;
use Interop\Container\Exception\ContainerException;


class UserController
{

    protected $view;

    public function __construct(Container $container)
    {
        try {
            $this->view = $container->get('renderer');
        } catch (ContainerException $e) {
            die();
        }
    }

    public function index(Request $request, Response $response)
    {


        return $this->view->render($response, 'register.phtml');
    }

    public function create(Request $request, Response $response)
    {

        $userName = $request->getParsedBodyParam('userName');
        $password = $request->getParsedBodyParam('password');
        $email = $request->getParsedBodyParam('email');
        $firstName = $request->getParsedBodyParam('firstName');
        $lastName = $request->getParsedBodyParam('lastName');

        $user = new User($userName,$password, $email, $firstName, $lastName);

        $user->save();

        return $response->withRedirect('/');
    }
}