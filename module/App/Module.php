<?php

namespace App;

use Laminas\ModuleManager\ModuleManager;
use Laminas\EventManager\EventInterface as Event;

class Module
{
    const VERSION = '3.0.0';

    public function init(ModuleManager $moduleManager)
    {

        $events = $moduleManager->getEventManager();
        $events->attach('loadModules.post', [$this, 'modulesLoaded']);

    }

    public function modulesLoaded(Event $e)
    {

        // executa depois que os modeulos são iniciados

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

}
