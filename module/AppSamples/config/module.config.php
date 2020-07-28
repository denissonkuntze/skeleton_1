<?php

namespace AppSamples;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router'       => [
        'routes' => [

            'appsamples-index' => [
                'type'          => Literal::class,
                'options'       => [
                    'route'    => '/samples',
                    'defaults' => [
                        'controller' => Controller\Samples\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes'  => [

                    'basic' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/zend-framework/[:action]',
                            'defaults' => [
                                'controller' => Controller\Samples\ZendFrameworkController::class,
                            ],
                        ],
                    ],

                    'js' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/js/[:action/]',
                            'defaults' => [
                                'controller' => Controller\Samples\JsController::class,
                            ],
                        ],
                    ],

                    'layout' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/layout/[:action]',
                            'defaults' => [
                                'controller' => Controller\Samples\LayoutController::class,
                            ],
                        ],
                    ],

                    'form' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/form/[:action]',
                            'defaults' => [
                                'controller' => Controller\Samples\FormController::class,
                            ],
                        ],
                    ],

                    'table' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/table/[:action]',
                            'defaults' => [
                                'controller' => Controller\Samples\TableController::class,
                            ],
                        ],
                    ],

                    'listform' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/listform/[:action]',
                            'defaults' => [
                                'controller' => Controller\Samples\ListFormController::class,
                            ],
                        ],
                    ],

                    'upload' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/uploads/[:action]',
                            'defaults' => [
                                'controller' => Controller\Samples\UploadsController::class,
                            ],
                        ],
                    ],

                    'sendfile' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/sendfiles/[:action]',
                            'defaults' => [
                                'controller' => Controller\Samples\SendFilesController::class,
                            ],
                        ],
                    ],

                    'viewhelper' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/view-helper/[:action/]',
                            'defaults' => [
                                'controller' => Controller\Samples\ViewHelperController::class,
                            ],
                        ],
                    ],

                ],
            ],

        ],
    ],
    'controllers'  => [
        'factories' => [

            Controller\Samples\IndexController::class         => InvokableFactory::class,
            Controller\Samples\ZendFrameworkController::class => InvokableFactory::class,
            Controller\Samples\JsController::class         => InvokableFactory::class,
            Controller\Samples\LayoutController::class     => InvokableFactory::class,
            Controller\Samples\FormController::class       => InvokableFactory::class,
            Controller\Samples\TableController::class      => InvokableFactory::class,
            Controller\Samples\ListFormController::class   => InvokableFactory::class,
            Controller\Samples\UploadsController::class    => InvokableFactory::class,
            Controller\Samples\SendFilesController::class  => InvokableFactory::class,
            Controller\Samples\ViewHelperController::class => InvokableFactory::class,

        ],
    ],
    'view_manager' => [
        #'display_not_found_reason' => true,
        #'display_exceptions'       => true,
        #'doctype'                  => 'HTML5',
        #'not_found_template'       => 'error/404',
        #'exception_template'       => 'error/index',
        'template_map'        => [
            #'layout/layout'           => __DIR__ . '/../view/layout/layout_app.phtml',
            #'app/index/index' => __DIR__ . '/../view/app/index/index.phtml',
            #'error/404'               => __DIR__ . '/../view/error/404.phtml',
            #'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
