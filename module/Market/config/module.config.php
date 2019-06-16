<?php
namespace Market;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
      	'routes' => [
        	 'market' => [
            	 'type' => Literal::class,
            	 'options' => [
                    'route'    => '/market',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                      ],
                  ],
                'may_terminate' => true,
                'child_routes' => [
                      'post' => [
                          'type' => Segment::class,
                          'options' => [
                              'route' => '/post[/]',
                              'defaults' => [
                                  'controller' => Controller\PostController::class,
                                  'action' => 'index'
                              ],
                          ],
                      ],
                  ],
            	],
    ],
    'view_manager' => [
        'template_path_stack' => [__DIR__ . '/../view'],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\ViewController::class => Controller\Factory\ViewControllerFactory::class,
            Controller\PostController::class => Controller\Factory\PostControllerFactory::class,

        ],
    ],
    'controller_plugins' => [
    		'factories' => [
    			   Controller\Plugin\DayWeekMonth::class => InvokableFactory::class,
    		   ],
    		'aliases' => [
    			   'DayWeekMonthPlugin' => Controller\Plugin\DayWeekMonth::class,
    		   ],
    	],
]
];
