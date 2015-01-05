<?php
 namespace CropTraining\Model;

 class CropTraining
 {
     public $id;
     public $name;
     public $disease;
	 public $farming_method;
	 public $harvest_time;
	 public $altitude;

     public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->name = (!empty($data['name'])) ? $data['name'] : null;
         $this->disease  = (!empty($data['disease'])) ? $data['disease'] : null;
		 $this->farming_method  = (!empty($data['farming_method'])) ? $data['farming_method'] : null;
		 $this->harvest_time  = (!empty($data['harvest_time'])) ? $data['harvest_time'] : null;
		 $this->altitude  = (!empty($data['altitude'])) ? $data['altitude'] : null;
     }
 }
?>