<?php 
namespace CropTraining\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;

 class CropTrainingController extends AbstractActionController
 {
     protected $cropTable;
	 
     public function indexAction()
     {
		 return new ViewModel(array(
             'crop' => $this->getCropTable()->fetchAll(),
         ));
     }

     public function addAction()
     {
     }
	 
	 public function getCropTable()
     {
         if (!$this->cropTable) {
             $sm = $this->getServiceLocator();
             $this->cropTable = $sm->get('CropTraining\Model\CropTable');
         }
         return $this->cropTable;
     }
/*
     public function editAction()
     {
     }

     public function deleteAction()
     {
     }
*/
 }
?>