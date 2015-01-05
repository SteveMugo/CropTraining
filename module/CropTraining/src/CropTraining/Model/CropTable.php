<?php
namespace CropTraining\Model;

 use Zend\Db\TableGateway\TableGateway;

 class CropTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getCrop($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveCrop(CropTraining $croptraining)
     {
         $data = array(
             'name' => $album->name,
             'disease'  => $album->disease,
			 'farming_method'  => $album->farming_method,
			 'harvest_time'  => $album->harvest_time,
			 'altitude'  => $album->altitude,
         );

         $id = (int) $album->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getCrop($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Crop id does not exist');
             }
         }
     }

     public function deleteCrop($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }
?>