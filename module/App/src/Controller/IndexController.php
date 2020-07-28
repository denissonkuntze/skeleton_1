<?php

namespace App\Controller;

use Fw\Lib\FwHelper;
use Laminas\Stdlib\RequestInterface as Request;
use Laminas\Stdlib\ResponseInterface as Response;
use Laminas\View\Model\ViewModel;
use Laminas\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractAppActionController
{

    public function dispatch(Request $request, Response $response = null)
    {

        $_ENV['IDC_SEARCH_IGNORE'] = true; // ignora a verificacao de subdomio
        $_ENV['APP_AUTH_IGNORE']   = true; // desativa a verificacao de autenticacao

        $this->verifyUrlWithSubdomain();

        return parent::dispatch($request, $response);

    }

    private function verifyUrlWithSubdomain()
    {

        $fwApp = \Fw\Lib\FwApp::getInstance();

        if ($fwApp->hasUrlSubdomainWidthIDC()) {

            $urls = FwHelper::getAppURLs();
            return $this->redirect()->toUrl($urls['URL_HOST']);

        }

    }

    public function indexAction()
    {

        return false;

    }

    public function emptyAction()
    {

        $this->getLayout()->setLayoutDisable();

        if (APP_ENV == 'development') {
            echo time();
        }

        return false;
        
    }

}
