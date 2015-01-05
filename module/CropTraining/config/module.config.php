<?php 
 return array(
     'controllers' => array(
         'invokables' => array(
             'CropTraining\Controller\CropTraining' => 'CropTraining\Controller\CropTrainingController',
         ),
     ),
	 
	 'router' => array(
         'routes' => array(
             'croptraining' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/croptraining[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'CropTraining\Controller\CropTraining',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

	 
     'view_manager' => array(
         'template_path_stack' => array(
             'croptraining' => __DIR__ . '/../view',
         ),
     ),
 );
?>