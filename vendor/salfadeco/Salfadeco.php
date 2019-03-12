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
		return $crud->load();
	}
	
	public function getEvent($event_id){
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setClausule('id', '=', $event_id);
		return $crud->loadFirst();
	}
	
	public function addEvent($name, $date, $description, $image_id, $image_group_id){
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setValue('name', $name);
		$crud->setValue('date', $date);
		$crud->setValue('description', $description);
		$crud->setValue('image_id', $image_id);
		$crud->setValue('image_group_id', $image_group_id);
		$crud->insert();
	}
	
	public function updateEvent($id, $name, $date, $description, $image_id, $image_group_id){
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setValue('name', $name);
		$crud->setValue('date', $date);
		$crud->setValue('description', $description);
		$crud->setValue('image_id', $image_id);
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
