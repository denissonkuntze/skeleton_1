<?php

namespace AppSamples\Controller\Abs;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Http\Response;

abstract class AbstractSamplesController extends AbstractActionController
{

    public function __construct() {

//        $response = new Response();
//        $response->setStatusCode(Response::STATUS_CODE_404);
//        $response->getHeaders()->addHeaderLine('X-Token: JKLF54353DJKLDFD');
//        $response->getHeaders()->addHeaderLine('Content-Type: text/html');

        if (APP_ENV != 'development') {

            header('X-MSG: bloqueado');
            header('HTTP/1.0 404 Not Found');

            exit;

        }

    }

}
