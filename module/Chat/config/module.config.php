<?php
/**
 * Created by PhpStorm.
 * User: s.krebs
 * Date: 10.07.14
 * Time: 14:11
 */

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array('ViewJsonStrategy')
    ),
    'router' => array(
        'routes' => array(

            'chat' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login/chatroom',
                    'defaults' => array(
                        'controller' => 'Chat\Controller\Chat',
                        'action' => 'index',
                    )
                )
            ),

            'chatOnlineUser' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login/chatroom/controllUser',
                    'defaults' => array(
                        'controller' => 'Chat\Controller\Chat',
                        'action' => 'controllUser',
                    )
                )
            ),
            'chatAllNewMessage' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login/chatroom/NewMessage',
                    'defaults' => array(
                        'controller' => 'Chat\Controller\Chat',
                        'action' => 'controllNewMessage',
                    )
                )
            ),
            'chatGetMessage' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login/chatroom/getMessage',
                    'defaults' => array(
                        'controller' => 'Chat\Controller\Chat',
                        'action' => 'controllgetMessage',
                    )
                )
            ),
            'chatSetMessage' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login/chatroom/setMessage',
                    'defaults' => array(
                        'controller' => 'Chat\Controller\Chat',
                        'action' => 'controllsetMessage',
                    )
                )
            ),
            'chatMakeDialog' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login/chatroom/makeDialog',
                    'defaults' => array(
                        'controller' => 'Chat\Controller\Chat',
                        'action' => 'controllMakeDialog',
                    )
                )
            ),

        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Chat\Controller\Chat'=>'Chat\Controller\ChatController',
        )
    ),
);