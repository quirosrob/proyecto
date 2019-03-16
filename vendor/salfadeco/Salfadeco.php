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
			$event['imageGroupItems']=$this->getImageGroupImages($event['image_group_id']);
		}
		return $events;
	}
	
	public function getEvent($event_id){
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setClausule('id', '=', $event_id);
		$event=$crud->loadFirst();
		$event['image']=$this->getImage($event['image_id']);
		$event['imageGroupItems']=$this->getImageGroupImages($event['image_group_id']);
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
	
	public function addEvent($name, $date, $description, $image){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setValue('name', $name);
		$crud->setValue('date', $date);
		$crud->setValue('description', $description);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->insert();
	}
	
	public function updateEvent($id, $name, $date, $description, $image){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setValue('name', $name);
		$crud->setValue('date', $date);
		$crud->setValue('description', $description);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->setClausule('id', '=', $id);
		$crud->update();
	}
	
	public function deleteEvent($id){
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setClausule('id', '=', $id);
		$crud->delete();
	}
	
	public function addImageToEvent($event_id, $image){
		$event=$this->getEvent($event_id);
		$image_group_id=$event['image_group_id'];
		if(empty($image_group_id)){
			$image_group_id=$this->createImageGroup();
			$crud=new Crud();
			$crud->setTable('event');
			$crud->setValue('image_group_id', $image_group_id);
			$crud->setClausule('id', '=', $event_id);
			$crud->update();
		}
		$this->addImageToImageGroup($image_group_id, $image);
	}
	
	public function addImageToImageGroup($image_group_id, $filename){
		if(!empty($filename) && !empty($image_group_id)){
			$image_id=$this->addImage($filename, '');
			$crud=new Crud();
			$crud->setTable('image_group_item');
			$crud->setValue('image_group_id', $image_group_id);
			$crud->setValue('image_id', $image_id);
			$crud->insert();
		}
	}
	
	public function createImageGroup(){
		$crud=new Crud();
		$crud->setTable('image_group');
		return $crud->insert();
	}
	
	private function getImageGroupImages($image_group_id){
		if(empty($image_group_id)){
			return [];
		}
		
		$images=[];
		$crud=new Crud();
		$crud->setTable('image_group_item');
		$crud->setClausule('image_group_id', '=', $image_group_id);
		$items=$crud->load();
		foreach($items as $item){
			$images[]=$this->getImage($item['image_id']);
		}
		return $images;
	}
	
	public function addSport($name, $description, $image){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('sport');
		$crud->setValue('name', $name);
		$crud->setValue('description', $description);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->setValue('image_group_id', null);
		$crud->insert();
	}
	
	public function getSports(){
		$crud=new Crud();
		$crud->setTable('sport');
		$crud->setOrder('name');
		$sports=$crud->load();
		foreach($sports as &$sport){
			$sport['image']=$this->getImage($sport['image_id']);
			$sport['imageGroupItems']=$this->getImageGroupImages($sport['image_group_id']);
		}
		return $sports;
	}
	
	public function getSport($sport_id){
		$crud=new Crud();
		$crud->setTable('sport');
		$crud->setClausule('id', '=', $sport_id);
		$sport=$crud->loadFirst();
		$sport['image']=$this->getImage($sport['image_id']);
		$sport['imageGroupItems']=$this->getImageGroupImages($sport['image_group_id']);
		return $sport;
	}
	
	public function deleteSport($id){
		$crud=new Crud();
		$crud->setTable('sport');
		$crud->setClausule('id', '=', $id);
		$crud->delete();
	}
	
	public function updateSport($id, $name, $description, $image){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('sport');
		$crud->setValue('name', $name);
		$crud->setValue('description', $description);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->setClausule('id', '=', $id);
		$crud->update();
	}
	
	public function addImageToSport($sport_id, $image){
		$sport=$this->getSport($sport_id);
		$image_group_id=$sport['image_group_id'];
		if(empty($image_group_id)){
			$image_group_id=$this->createImageGroup();
			$crud=new Crud();
			$crud->setTable('sport');
			$crud->setValue('image_group_id', $image_group_id);
			$crud->setClausule('id', '=', $sport_id);
			$crud->update();
		}
		$this->addImageToImageGroup($image_group_id, $image);
	}
        
	public function addDirectorsTeam($name, $description, $image){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('directors_team');
		$crud->setValue('name', $name);
		$crud->setValue('description', $description);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->setValue('image_group_id', null);
		$crud->insert();
	}
	
	public function addMember($name, $date_entry, $biography, $sport_ids, $image){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('member');
		$crud->setValue('name', $name);
		$crud->setValue('date_entry', $date_entry);
		$crud->setValue('biography', $biography);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->setValue('image_group_id', null);
		$member_id=$crud->insert();
		
		
		foreach($sport_ids as $sport_id){
			$this->addSportToMember($member_id, $sport_id);
		}
	}
	
	private function addSportToMember($member_id, $sport_id){
		$crud=new Crud();
		$crud->setTable('member_sport');
		$crud->setValue('member_id', $member_id);
		$crud->setValue('sport_id', $sport_id);
		$crud->insert();
	}
	
	private function removeSportFromMember($member_id, $sport_id){
		$crud=new Crud();
		$crud->setTable('member_sport');
		$crud->setClausule('member_id', '=', $member_id);
		$crud->setClausule('sport_id', '=',  $sport_id);
		$crud->delete();
	}
	
	public function getMembers($filter, $sport_id){
		$crud=new Crud();
		$crud->setTable('member', 'm');
		
		if(!empty($filter)){
			$words= explode(' ', $filter);
			foreach($words as $word){
				if(!empty($word)){
					$crud->setClausule('name', 'like', "%$word%");
				}
			}
		}
		
		if(!empty($sport_id)){
			$crud->setTable('member_sport', "ms");
			$crud->setClausule('ms.sport_id', '=', $sport_id);
			$crud->setJoin("m.id", '=',"ms.member_id");
		}
		
		$crud->setOrder('name');
		$members=$crud->load(['m.*']);
		foreach($members as &$member){
			$member['image']=$this->getImage($member['image_id']);
			$member['imageGroupItems']=$this->getImageGroupImages($member['image_group_id']);
			$member['sports']=$this->getSportsMember($member['id']);
		}
		return $members;
	}
	
	public function getMember($member_id){
		$crud=new Crud();
		$crud->setTable('member');
		$crud->setClausule('id', '=', $member_id);
		$member=$crud->loadFirst();
		$member['image']=$this->getImage($member['image_id']);
		$member['imageGroupItems']=$this->getImageGroupImages($member['image_group_id']);
		$member['sports']=$this->getSportsMember($member['id']);
		return $member;
	}
	
	private function getSportsMember($member_id){
		$sports=[];
		$crud=new Crud();
		$crud->setTable('member_sport');
		$crud->setClausule('member_id', '=', $member_id);
		$items=$crud->load();
		foreach($items as $item){
			$sports[$item['sport_id']]=$this->getSport($item['sport_id']);
		}
		return $sports;
	}
	
	public function deleteMember($member_id){
		$crud=new Crud();
		$crud->setTable('member_sport');
		$crud->setClausule('member_id', '=', $member_id);
		$crud->delete();
		
		$crud=new Crud();
		$crud->setTable('member');
		$crud->setClausule('id', '=', $member_id);
		$crud->delete();
	}
	
	public function updateMember($member_id, $name, $date_entry, $biography, $sport_ids, $image){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('member');
		$crud->setValue('name', $name);
		$crud->setValue('date_entry', $date_entry);
		$crud->setValue('biography', $biography);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->setClausule('id', '=', $member_id);
		$crud->update();
		
		$sportsMember=$this->getSportsMember($member_id);
		
		foreach($sport_ids as $sport_id){
			if(!isset($sportsMember[$sport_id])){
				$this->addSportToMember($member_id, $sport_id);
			}
		}
		
		foreach($sportsMember as $sport){
			if(!in_array($sport['id'], $sport_ids)){
				$this->removeSportFromMember($member_id, $sport['id']);
			}
		}
	}
	
	public function addImageToMember($member_id, $image){
		$member=$this->getMember($member_id);
		$image_group_id=$member['image_group_id'];
		if(empty($image_group_id)){
			$image_group_id=$this->createImageGroup();
			$crud=new Crud();
			$crud->setTable('member');
			$crud->setValue('image_group_id', $image_group_id);
			$crud->setClausule('id', '=', $member_id);
			$crud->update();
		}
		$this->addImageToImageGroup($image_group_id, $image);
	}
	
	public function addGallery($name, $description, $image){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('gallery');
		$crud->setValue('name', $name);
		$crud->setValue('description', $description);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->insert();
	}
	
	public function getGalleries(){
		$crud=new Crud();
		$crud->setTable('gallery');
		$crud->setOrder('name');
		$galleries=$crud->load();
		foreach($galleries as &$gallery){
			$gallery['image']=$this->getImage($gallery['image_id']);
			$gallery['imageGroupItems']=$this->getImageGroupImages($gallery['image_group_id']);
		}
		return $galleries;
	}
	
	public function getGallery($gallery_id){
		$crud=new Crud();
		$crud->setTable('gallery');
		$crud->setClausule('id', '=', $gallery_id);
		$gallery=$crud->loadFirst();
		$gallery['image']=$this->getImage($gallery['image_id']);
		$gallery['imageGroupItems']=$this->getImageGroupImages($gallery['image_group_id']);
		return $gallery;
	}
	
	public function deleteGallery($gallery_id){
		$crud=new Crud();
		$crud->setTable('gallery');
		$crud->setClausule('id', '=', $gallery_id);
		$crud->delete();
	}
	
	public function updateGallery($id, $name, $description, $image){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('gallery');
		$crud->setValue('name', $name);
		$crud->setValue('description', $description);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->setClausule('id', '=', $id);
		$crud->update();
	}
	
	
	public function addImageToGallery($gallery_id, $image){
		$gallery=$this->getGallery($gallery_id);
		$image_group_id=$gallery['image_group_id'];
		if(empty($image_group_id)){
			$image_group_id=$this->createImageGroup();
			$crud=new Crud();
			$crud->setTable('gallery');
			$crud->setValue('image_group_id', $image_group_id);
			$crud->setClausule('id', '=', $gallery_id);
			$crud->update();
		}
		$this->addImageToImageGroup($image_group_id, $image);
	}
}

