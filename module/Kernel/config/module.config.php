<?php
return array(  
		'doctrine' => array(
				'driver' => array(
						'database' => array(
								'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
								'cache' => 'array',
								'paths' => array(__DIR__ . '/../src/Kernel/Entity')
						),
		
						'orm_default' => array(
								'drivers' => array(
										'Kernel\Entity' => 'database'
								)
						)
				)
		),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array('ViewJsonStrategy')
    ),
    'router' => array(
        'routes' => array(
        		
            'login' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'Kernel\Controller\Kernel',
                        'action' => 'index',
                    )
                )
            ),
        		'controllNewAcc' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route' => '/login/controllNewAcc',
        						'defaults' => array(
        								'controller' => 'Kernel\Controller\Kernel',
        								'action' => 'controllNewAcc',
        						)
        				)
        		),
        		'loginarea' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route' => '/login/area',
        						'defaults' => array(
        								'controller' => 'Kernel\Controller\Kernel',
        								'action' => 'loginarea',
        						)
        				)
        		),

            'controllAdminForUser' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login/controllAdminForUser',
                    'defaults' => array(
                        'controller' => 'Kernel\Controller\Kernel',
                        'action' => 'controllAdminForUser',
                    )
                )
            ),

            'controllUserForUser' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login/controllUserForUser',
                    'defaults' => array(
                        'controller' => 'Kernel\Controller\Kernel',
                        'action' => 'controllUserForUser',
                    )
                )
            ),

            'controllForLogout' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login/controllForLogout',
                    'defaults' => array(
                        'controller' => 'Kernel\Controller\Kernel',
                        'action' => 'controllForLogout',
                    )
                )
            ),




        )
    ),
    'controllers' => array(
        'invokables' => array(
        	'Kernel\Controller\Kernel'=>'Kernel\Controller\KernelController',
        )
    ),
);