<?php

namespace AppSamples;

use Laminas\ModuleManager\ModuleManager;
use Laminas\EventManager\EventInterface as Event;
use Laminas\Mvc\MvcEvent;

use Fw\Lib\FwConfigInit;
use Laminas\Router\Http\Literal;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {

//        $router = $e->getApplication()->getServiceManager()->get('router');
//
//        $route = Literal::factory([
//            'route'    => '/cron/',
//            'defaults' => [
//                'controller' => \App\Controller\IndexController::class,
//                'action'     => 'cron'
//            ],
//        ]);
//        $router->addRoute('app-cron', $route, null);

        /*
        $matches = $e->getRouteMatch();
        $route   = $matches->getMatchedRouteName();

        $controller     = $e->getTarget();
        $controllerName = $e->getRouteMatch()->getParam('controller', null);
        $actionName     = $e->getRouteMatch()->getParam('action', null);
        */

    }

    public function init(ModuleManager $moduleManager)
    {

        $events = $moduleManager->getEventManager();
        $events->attach('loadModules.post', [$this, 'modulesLoaded']);

    }

    public function modulesLoaded(Event $e)
    {

        // executa depois que os modulos são iniciados

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

}
