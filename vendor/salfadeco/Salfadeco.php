<?php
namespace salfadeco;

$path=realpath(dirname(__FILE__));

require_once($path.DS."Configuration.php");
require_once($path.DS."class".DS."Singleton.php");
require_once($path.DS."class".DS."DbConnector.php");
require_once($path.DS."class".DS."Crud.php");

class Salfadeco {
	public function getEvents(){
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setOrder('date');
		$events=$crud->load();
		foreach($events as &$event){
			$event['image']=$this->getImage($event['image_id']);
		}
		return $events;
	}
	
	public function getEvent($event_id){
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setClausule('id', '=', $event_id);
		$event=$crud->loadFirst();
		$event['image']=$this->getImage($event['image_id']);
		return $event;
	}
	
	private function getImage($image_id){
		if(empty($image_id)){
			return null;
		}
		$crud=new Crud();
		$crud->setTable('image');
		$crud->setClausule('id', '=', $image_id);
		return $crud->loadFirst();
	}
	
	private function addImage($filename, $description){
		$crud=new Crud();
		$crud->setTable('image');
		$crud->setValue('filename', $filename);
		$crud->setValue('description', $description);
		return $crud->insert();
	}
	
	public function addEvent($name, $date, $description, $image, $image_group_id){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setValue('name', $name);
		$crud->setValue('date', $date);
		$crud->setValue('description', $description);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->setValue('image_group_id', $image_group_id);
		$crud->insert();
	}
	
	public function updateEvent($id, $name, $date, $description, $image, $image_group_id){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setValue('name', $name);
		$crud->setValue('date', $date);
		$crud->setValue('description', $description);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->setValue('image_group_id', $image_group_id);
		$crud->setClausule('id', '=', $id);
		$crud->update();
	}
	
	public function deleteEvent($id){
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setClausule('id', '=', $id);
		$crud->delete();
	}
}
