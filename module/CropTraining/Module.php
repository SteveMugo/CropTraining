<?php
namespace CropTraining;

 use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
 use Zend\ModuleManager\Feature\ConfigProviderInterface;
 
 use CropTraining\Model\CropTraining;
 use CropTraining\Model\CropTable;
 use Zend\Db\ResultSet\ResultSet;
 use Zend\Db\TableGateway\TableGateway;

 class Module implements AutoloaderProviderInterface, ConfigProviderInterface
 {
     public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\ClassMapAutoloader' => array(
                 __DIR__ . '/autoload_classmap.php',
             ),
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 ),
             ),
         );
     }

     public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }
	 public function getServiceConfig()
     {
		 return array(
             'factories' => array(
                 'CropTraining\Model\CropTable' =>  function($sm) {
                     $tableGateway = $sm->get('CropsTableGateway');
                     $table = new CropTable($tableGateway);
                     return $table;
                 },
                 'CropsTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new CropTraining());
                     return new TableGateway('croptraining', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
	 }
 }
 ?>