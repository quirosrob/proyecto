<?php
namespace salfadeco;

$path=realpath(dirname(__FILE__));

require_once($path.DS."Configuration.php");
require_once($path.DS."class".DS."Singleton.php");
require_once($path.DS."class".DS."DbConnector.php");
require_once($path.DS."class".DS."Crud.php");
require_once($path.DS."utils".DS."fpdf17".DS."fpdf.php");
require_once($path.DS."class".DS."PdfQr.php");

class Salfadeco {
	public function getEvents($start, $quantity){
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setOrder('date');
		$crud->setLimits($start, $quantity);
		$events=$crud->load();
		foreach($events as &$event){
			$event['image']=$this->getImage($event['image_id']);
			$event['imageGroupItems']=$this->getImageGroupImages($event['image_group_id']);
		}
		
		return [
			'items'=>$events,
			'total'=>$crud->count()
		];
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
	
	public function getImage($image_id){
		if(empty($image_id)){
			return null;
		}
		$crud=new Crud();
		$crud->setTable('image');
		$crud->setClausule('id', '=', $image_id);
		return $crud->loadFirst();
	}
	
	public function addImage($filename, $description){
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
		$crud->setValue('date', !empty($date)? $date : null);
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
		$crud->setValue('date', !empty($date)? $date : null);
		$crud->setValue('description', $description);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->setClausule('id', '=', $id);
		$crud->update();
	}
	
	public function deleteEvent($id){
		$event=$this->getEvent($id);
		
		$this->deleteImage($event['image_id']);
		$this->deleteImageGroup($event['image_group_id']);
		
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
	
	public function addSport($name, $description, $image, $color){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('sport');
		$crud->setValue('name', $name);
		$crud->setValue('description', $description);
		$crud->setValue('color', $color);
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
		$sport=$this->getSport($id);
		
		$this->deleteImage($sport['image_id']);
		$this->deleteImageGroup($sport['image_group_id']);
		
		$crud=new Crud();
		$crud->setTable('member_sport');
		$crud->setClausule('sport_id', '=', $id);
		$crud->delete();
		
		$crud=new Crud();
		$crud->setTable('sport');
		$crud->setClausule('id', '=', $id);
		$crud->delete();
	}
	
	public function updateSport($id, $name, $description, $image, $color){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('sport');
		$crud->setValue('name', $name);
		$crud->setValue('description', $description);
		$crud->setValue('color', $color);
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
        
	public function getDirectorsTeams($start, $quantity){
		$crud=new Crud();
		$crud->setTable('directors_team');
		$crud->setOrder('name');
		$crud->setLimits($start, $quantity);
		$directors_teams=$crud->load();
		foreach($directors_teams as &$directors_team){
			$directors_team['image']=$this->getImage($directors_team['image_id']);
			$directors_team['imageGroupItems']=$this->getImageGroupImages($directors_team['image_group_id']);
		}
		return [
			'items'=>$directors_teams,
			'total'=>$crud->count()
		];
	}
        
	public function getDirectorsTeam($directors_team_id){
		$crud=new Crud();
		$crud->setTable('directors_team');
		$crud->setClausule('id', '=', $directors_team_id);
		$directors_team=$crud->loadFirst();
		$directors_team['image']=$this->getImage($directors_team['image_id']);
		$directors_team['imageGroupItems']=$this->getImageGroupImages($directors_team['image_group_id']);
		return $directors_team;
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
        
	public function deleteDirectorsTeam($id){
		$crud=new Crud();
		$crud->setTable('directors_team');
		$crud->setClausule('id', '=', $id);
		$crud->delete();
	}
        
	public function updateDirectorsTeam($id, $name, $description, $image){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('directors_team');
		$crud->setValue('name', $name);
		$crud->setValue('description', $description);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->setClausule('id', '=', $id);
		$crud->update();
	}
        
	public function addImageToDirectorsTeam($directors_team_id, $image){
		$DirectorsTeam=$this->getDirectorsTeam($directors_team_id);
		$image_group_id=$DirectorsTeam['image_group_id'];
		if(empty($image_group_id)){
			$image_group_id=$this->createImageGroup();
			$crud=new Crud();
			$crud->setTable('directors_team');
			$crud->setValue('image_group_id', $image_group_id);
			$crud->setClausule('id', '=', $directors_team_id);
			$crud->update();
		}
		$this->addImageToImageGroup($image_group_id, $image);
	}
	
	public function addMember($name, $date_entry, $biography, $sport_ids, $image, $year_birth, $year_death, $number){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('member');
		$crud->setValue('name', $name);
		$crud->setValue('date_entry', !empty($date_entry)? $date_entry : null);
		$crud->setValue('biography', $biography);
		$crud->setValue('year_birth', $year_birth);
		$crud->setValue('year_death', $year_death);
		$crud->setValue('number', $number);
		if(!empty($image_id)){
			$crud->setValue('image_id', $image_id);
		}
		$crud->setValue('image_group_id', null);
		$member_id=$crud->insert();
		
		
		foreach($sport_ids as $sport_id){
			$this->addSportToMember($member_id, $sport_id);
		}
		
		$this->makeQrMember($member_id);
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
	
	public function getMembers($filter, $sport_id, $creationDateStart, $creationDateEnd, $start, $quantity){
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
		
		if(!empty($creationDateStart)){
			$crud->setClausule('m.creation_date', '>=', $creationDateStart);
		}
		
		if(!empty($creationDateEnd)){
			$crud->setClausule('m.creation_date', '<=', $creationDateEnd);
		}
		
		$crud->setLimits($start, $quantity);
		$crud->setOrder('name');
		$members=$crud->load(['m.*']);
		foreach($members as &$member){
			$member['image']=$this->getImage($member['image_id']);
			$member['imageGroupItems']=$this->getImageGroupImages($member['image_group_id']);
			$member['sports']=$this->getSportsMember($member['id']);
		}
		return [
			'items'=>$members,
			'total'=>$crud->count()
		];
	}
	
	public function getMember($member_id){
		$this->makeQrMember($member_id);
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
		$member=$this->getMember($member_id);
		
		$this->deleteImage($member['image_id']);
		$this->deleteImageGroup($member['image_group_id']);
		
		$crud=new Crud();
		$crud->setTable('member_sport');
		$crud->setClausule('member_id', '=', $member_id);
		$crud->delete();
		
		$crud=new Crud();
		$crud->setTable('member');
		$crud->setClausule('id', '=', $member_id);
		$crud->delete();
	}
	
	public function updateMember($member_id, $name, $date_entry, $biography, $sport_ids, $image, $year_birth, $year_death, $number){
		$image_id=!empty($image)? $this->addImage($image, '') : "";
		
		$crud=new Crud();
		$crud->setTable('member');
		$crud->setValue('name', $name);
		$crud->setValue('date_entry', !empty($date_entry)? $date_entry : null);
		$crud->setValue('biography', $biography);
		$crud->setValue('year_birth', $year_birth);
		$crud->setValue('year_death', $year_death);
		$crud->setValue('number', $number);
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
		
		$this->makeQrMember($member_id);
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
	
	public function getGalleries($start, $quantity){
		$crud=new Crud();
		$crud->setTable('gallery');
		$crud->setOrder('name');
		$crud->setLimits($start, $quantity);
		$galleries=$crud->load();
		foreach($galleries as &$gallery){
			$gallery['image']=$this->getImage($gallery['image_id']);
			$gallery['imageGroupItems']=$this->getImageGroupImages($gallery['image_group_id']);
		}
		return [
			'items'=>$galleries,
			'total'=>$crud->count()
		];
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
		$gallery=$this->getGallery($gallery_id);
		
		$this->deleteImage($gallery['image_id']);
		$this->deleteImageGroup($gallery['image_group_id']);
		
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
	
	public function setConfiguration($key, $value){
		$crud=new Crud();
		$crud->setTable('configuration');
		$crud->setValue('key', $key);
		$crud->setValue('value', $value);
		$crud->replace();
	}
	
	public function getConfiguration($key){
		$crud=new Crud();
		$crud->setTable('configuration');
		$crud->setClausule('key', '=', $key);
		$row=$crud->loadFirst();
		return @$row['value'];
	}
	
	public function setText($key, $text){
		$crud=new Crud();
		$crud->setTable('text');
		$crud->setValue('key', $key);
		$crud->setValue('text', $text);
		$crud->replace();
	}
	
	public function getText($key){
		$crud=new Crud();
		$crud->setTable('text');
		$crud->setClausule('key', '=', $key);
		$row=$crud->loadFirst();
		return @$row['text'];
	}
	
	public function addImageToHistory($image){
		$image_group_id=$this->getConfiguration('history_image_group_id');
		if(empty($image_group_id)){
			$image_group_id=$this->createImageGroup();
			$this->setConfiguration('history_image_group_id', $image_group_id);
		}
		$this->addImageToImageGroup($image_group_id, $image);
	}
	
	public function getImagesHistory(){
		$image_group_id=$this->getConfiguration('history_image_group_id');
		return $this->getImageGroupImages($image_group_id);
	}
	
	public function deleteImage($image_id){
		if(empty($image_id)){
			return;
		}
		
		$crud=new Crud();
		$crud->setTable('directors_team');
		$crud->setValue('image_id', null);
		$crud->setClausule('image_id', '=', $image_id);
		$crud->update();
		
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setValue('image_id', null);
		$crud->setClausule('image_id', '=', $image_id);
		$crud->update();
		
		$crud=new Crud();
		$crud->setTable('gallery');
		$crud->setValue('image_id', null);
		$crud->setClausule('image_id', '=', $image_id);
		$crud->update();
		
		$crud=new Crud();
		$crud->setTable('member');
		$crud->setValue('image_id', null);
		$crud->setClausule('image_id', '=', $image_id);
		$crud->update();
		
		$crud=new Crud();
		$crud->setTable('sport');
		$crud->setValue('image_id', null);
		$crud->setClausule('image_id', '=', $image_id);
		$crud->update();
		
		$crud=new Crud();
		$crud->setTable('image_group_item');
		$crud->setClausule('image_id', '=', $image_id);
		$crud->delete();
		
		$crud=new Crud();
		$crud->setTable('image');
		$crud->setClausule('id', '=', $image_id);
		$crud->delete();
	}
	
	private function deleteImageGroup($image_group_id){
		if(empty($image_group_id)){
			return;
		}
		
		$images=$this->getImageGroupImages($image_group_id);
		foreach($images as $image){
			$this->deleteImage($image['id']);
		}
		
		$crud=new Crud();
		$crud->setTable('image_group');
		$crud->setClausule('id', '=', $image_group_id);
		$crud->delete();
	}
	
	private function makeQrMember($member_id){
		try{
			$qrLink="{$_SERVER['SERVER_NAME']}/Guess/Member/{$member_id}";
			$qrSize=300;
			$qrPath=realpath(dirname(__FILE__))."/../../webroot/img/qr/member_{$member_id}.png";
			if(!file_exists($qrPath)){
				$qrData=file_get_contents("http://chart.googleapis.com/chart?cht=qr&chs={$qrSize}x{$qrSize}&chl={$qrLink}");
				file_put_contents($qrPath, $qrData);
			}
		} catch (Exception $ex) {
			
		}
	}
	
	public function makePdfQrs($sport_id, $creationDateStart, $creationDateEnd){
		$filePath=realpath(dirname(__FILE__))."/../../webroot/img/qr/members.pdf";
		$members=$this->getMembers(null, $sport_id, $creationDateStart, $creationDateEnd, null, null);
		
		foreach($members['items'] as $member){
			$this->makeQrMember($member['id']);
		}
		
		$pdfQr=new PdfQr();
		$pdfQr->makeQrs($members['items'], $filePath);
	}
	
	public function addUser($name, $username, $job, $password){
		$crud=new Crud();
		$crud->setTable('user');
		$crud->setValue('name', $name);
		$crud->setValue('username', $username);
		$crud->setValue('job', $job);
		$crud->setValue('password', md5($password));
		$crud->insert();
	}
	
	public function getUsers(){
		$crud=new Crud();
		$crud->setTable('user');
		return $crud->load();
	}
	
	public function getUser($user_id){
		$crud=new Crud();
		$crud->setTable('user');
		$crud->setClausule('id', '=', $user_id);
		return $crud->loadFirst();
	}
	
	public function updateUser($user_id, $name, $username, $job, $password, $permition_ids){
		$crud=new Crud();
		$crud->setTable('user');
		$crud->setValue('name', $name);
		$crud->setValue('username', $username);
		$crud->setValue('job', $job);
		if(!empty($password)){
			$crud->setValue('password', md5($password));
		}
		$crud->setClausule('id', '=', $user_id);
		$crud->update();
		
		$this->clearPermitionsUser($user_id);
		foreach($permition_ids as $permition_id){
			$this->addPermitionUser($user_id, $permition_id);
		}
	}
	
	public function getPermitions(){
		$crud=new Crud();
		$crud->setTable('permition');
		return $crud->load();
	}
	
	private function clearPermitionsUser($user_id){
		$crud=new Crud();
		$crud->setTable('user_permition)');
		$crud->setClausule('user_id', '=', $user_id);
		return $crud->delete();
	}
	
	private function addPermitionUser($user_id, $permition_id){
		$crud=new Crud();
		$crud->setTable('user_permition');
		$crud->setValue('user_id', $user_id);
		$crud->setValue('permition_id', $permition_id);
		$crud->insert();
	}
	
	private function getPermition($permition_id){
		$crud=new Crud();
		$crud->setTable('permition');
		$crud->setClausule('id', '=', $permition_id);
		return $crud->loadFirst();
	}
	
	public function getPermitionsUser($user_id){
		$permitions=[];
		$crud=new Crud();
		$crud->setTable('user_permition');
		$crud->setClausule('user_id', '=', $user_id);
		$items=$crud->load();
		foreach($items as $item){
			$permitions[$item['permition_id']]=$this->getPermition($item['permition_id']);
		}
		return $permitions;
	}
	
	public function deleteUser($user_id){
		$user=$this->getUser($user_id);
		if($user['role']!='ADMIN'){
			$crud=new Crud();
			$crud->setTable('user_permition');
			$crud->setClausule('user_id', '=', $user_id);
			$crud->delete();
			
			$crud=new Crud();
			$crud->setTable('user');
			$crud->setClausule('id', '=', $user_id);
			$crud->delete();
		}
	}
	
	public function createBackup($backup_directory, $uploadsDiretory){
		$dumpFilePath="{$backup_directory}/dump.sql";
		$zipFilePath="{$backup_directory}/backup.zip";
		
		$crud=new Crud();
		$sql=$crud->getSqlBackup();
		file_put_contents($dumpFilePath, $sql);
		
		$this->zipFiles($zipFilePath, [$dumpFilePath, $uploadsDiretory]);
		
//		unlink($dumpFilePath);
		
		return $zipFilePath;
	}
	
	private function zipFiles($zipFilePath, $files){
		if(file_exists($zipFilePath)){
			unlink($zipFilePath);
		}
		
		foreach($files as $file){
			$fileDirectory=dirname($file);
			$fileName=basename($file);
			$command="cd $fileDirectory && zip -r {$zipFilePath} $fileName";
			exec($command);
		}
	}
	
	private function unzipFile($zipFilePath, $destinyDiretory){
		if(file_exists($destinyDiretory)){
			unlink($destinyDiretory);
		}
		mkdir($destinyDiretory);
		
		$command="unzip {$zipFilePath} -d {$destinyDiretory}";
		exec($command);
	}
	
	public function restoreBackup($zipFilePath){
		$destinyDiretory=dirname($zipFilePath)."/restore";
		$this->unzipFile($zipFilePath, $destinyDiretory);
	}
}