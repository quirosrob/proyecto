<?php
namespace salfadeco;

$path=realpath(dirname(__FILE__));

require_once($path.DS."Configuration.php");
require_once($path.DS."class".DS."Singleton.php");
require_once($path.DS."class".DS."DbConnector.php");
require_once($path.DS."class".DS."Crud.php");
require_once($path.DS."utils".DS."fpdf17".DS."fpdf.php");
require_once($path.DS."utils".DS."PHPMailer".DS."class.phpmailer.php");
require_once($path.DS."class".DS."PdfQr.php");
require_once($path.DS."class".DS."EmailHelper.php");

class Salfadeco {
	var $uploadsDirectory;
	var $backupDirectory;
	
	function __construct($uploadsDirectory, $backupDirectory){
		$this->uploadsDirectory=$uploadsDirectory;
		$this->backupDirectory=$backupDirectory;
	}
	
	public function getEvents($start, $quantity){
		$crud=new Crud();
		$crud->setTable('event');
		$crud->setOrder('date', 'desc');
		$crud->setOrder('id', 'desc');
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
	
	public function addImage($filename, $description, $link){
		$crud=new Crud();
		$crud->setTable('image');
		$crud->setValue('filename', "".$filename);
		$crud->setValue('description', "".$description);
		$crud->setValue('link', "".$link);
		return $crud->insert();
	}
	
	public function addEvent($name, $date, $description, $image){
		$image_id=!empty($image)? $this->addImage($image, '', null) : "";
		
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
		$image_id=!empty($image)? $this->addImage($image, '', null) : "";
		
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
		$this->addImageToImageGroup($image_group_id, $image, null);
	}
	
	public function addImageToImageGroup($image_group_id, $filename, $link){
		if(!empty($image_group_id) && !empty($filename)){
			$image_id=$this->addImage($filename, '', null);
			$crud=new Crud();
			$crud->setTable('image_group_item');
			$crud->setValue('image_group_id', $image_group_id);
			$crud->setValue('image_id', $image_id);
			$crud->insert();
		}
		
		if(!empty($image_group_id) && !empty($link)){
			$image_id=$this->addImage(null, '', $link);
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
		$image_id=!empty($image)? $this->addImage($image, '', null) : "";
		
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
		$image_id=!empty($image)? $this->addImage($image, '', null) : "";
		
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
		$this->addImageToImageGroup($image_group_id, $image, null);
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
		$image_id=!empty($image)? $this->addImage($image, '', null) : "";
		
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
		$image_id=!empty($image)? $this->addImage($image, '', null) : "";
		
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
		$this->addImageToImageGroup($image_group_id, $image, null);
	}
	
	public function addMember($name, $date_entry, $biography, $sport_ids, $image, $year_birth, $year_death, $number){
		$image_id=!empty($image)? $this->addImage($image, '', null) : "";
		
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
		if(!empty($member)){
			$member['image']=$this->getImage($member['image_id']);
			$member['imageGroupItems']=$this->getImageGroupImages($member['image_group_id']);
			$member['sports']=$this->getSportsMember($member['id']);
		}
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
		if(!empty($member)){
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
	}
	
	public function updateMember($member_id, $name, $date_entry, $biography, $sport_ids, $image, $year_birth, $year_death, $number){
		$image_id=!empty($image)? $this->addImage($image, '', null) : "";
		
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
	
	public function addImageToMember($member_id, $image, $link){
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
		$this->addImageToImageGroup($image_group_id, $image, $link);
	}
	
	public function addGallery($name, $description, $image){
		$image_id=!empty($image)? $this->addImage($image, '', null) : "";
		
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
		$image_id=!empty($image)? $this->addImage($image, '', null) : "";
		
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
		$this->addImageToImageGroup($image_group_id, $image, null);
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
		$this->addImageToImageGroup($image_group_id, $image, null);
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
			$qrLink="{$_SERVER['SERVER_NAME']}/Guest/Member/{$member_id}";
			$qrPath=realpath(dirname(__FILE__))."/../../webroot/img/qr/member_{$member_id}.png";
			$qrSize=300;
			
			$currentQrLink=$this->getMemberQrLink($member_id);
			if($qrLink!=$currentQrLink){
				if(file_exists($qrPath)){
					unlink($qrPath);
				}
			}
			
			if(!file_exists($qrPath)){
				$qrData=file_get_contents("http://chart.googleapis.com/chart?cht=qr&chs={$qrSize}x{$qrSize}&chl={$qrLink}");
				file_put_contents($qrPath, $qrData);
				$this->saveMemberQrLink($member_id, $qrLink);
			}
		} catch (Exception $ex) {
			
		}
	}
	
	private function getMemberQrLink($member_id){
		$crud=new Crud();
		$crud->setTable('member');
		$crud->setClausule('id', '=', $member_id);
		$member=$crud->loadFirst();
		return $member['qrlink'];
	}
	
	private function saveMemberQrLink($member_id, $qrLink){
		$crud=new Crud();
		$crud->setTable('member');
		$crud->setValue('qrlink', $qrLink);
		$crud->setClausule('id', '=', $member_id);
		$crud->update();
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
	
	private function checkDuplicatedUsername($username, $user_id){
		$crud=new Crud();
		$crud->setTable('user');
		$crud->setClausule('username', '=', $username);
		$rows=$crud->load();
		
		if(empty($user_id)){
			return !empty($rows);
		}
		
		foreach($rows as $row){
			if($row['id']!=$user_id){
				return true;
			}
		}
		return false;
	}
	
	public function addUser($name, $username, $job, $password, $email){
		if($this->checkDuplicatedUsername($username, null)){
			return [
				'status'=>false,
				'error'=>'duplicated username'
			];
		}
		
		
		$crud=new Crud();
		$crud->setTable('user');
		$crud->setValue('name', $name);
		$crud->setValue('username', $username);
		$crud->setValue('job', $job);
		$crud->setValue('password', md5($password));
		$crud->setValue('email', $email);
		$crud->insert();
		
		return [
			'status'=>true,
			'error'=>''
		];
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
	
	public function updateUser($user_id, $name, $username, $job, $password, $email, $permition_ids){
		
		if($this->checkDuplicatedUsername($username, $user_id)){
			return [
				'status'=>false,
				'error'=>'duplicated username'
			];
		}
		
		$crud=new Crud();
		$crud->setTable('user');
		$crud->setValue('name', $name);
		$crud->setValue('username', $username);
		$crud->setValue('job', $job);
		$crud->setValue('email', $email);
		if(!empty($password)){
			$crud->setValue('password', md5($password));
		}
		$crud->setClausule('id', '=', $user_id);
		$crud->update();
		
		$this->clearPermitionsUser($user_id);
		foreach($permition_ids as $permition_id){
			$this->addPermitionUser($user_id, $permition_id);
		}
		
		return [
			'status'=>true,
			'error'=>''
		];
	}
	
	public function getPermitions(){
		$crud=new Crud();
		$crud->setTable('permition');
		return $crud->load();
	}
	
	private function clearPermitionsUser($user_id){
		$crud=new Crud();
		$crud->setTable('user_permition');
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
	
	public function createBackup(){
		$this->clearOldBackups();
		$dumpFilePath="{$this->backupDirectory}/dump.sql";
		$dumpOriginalFilePath="{$this->backupDirectory}/dump_original.sql";
		$zipFileFilename="backup_".date("Y_m_d_H_i_s").".zip";
		$zipFilePath="{$this->backupDirectory}/{$zipFileFilename}";
		
		$crud=new Crud();
		$sql=$crud->getSqlBackup();
		file_put_contents($dumpFilePath, base64_encode($sql));
		file_put_contents($dumpOriginalFilePath, $sql);
		
		$this->zipFiles($zipFilePath, [$dumpFilePath, $dumpOriginalFilePath, $this->uploadsDirectory]);
		
		return $zipFileFilename;
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
	
	private function deletePath($path){
		if(!file_exists($path)){
			return;
		}
		
		if(!is_dir($path)){
			unlink($path);
			return;
		}
		
		$files=glob("{$path}/*", GLOB_MARK);
		foreach($files as $file){
			$this->deletePath($file);
		}
		rmdir($path);
	}
	
	private function unzipFile($zipFilePath, $destinyDiretory){
		$this->deletePath($destinyDiretory);
		mkdir($destinyDiretory);
		
		$command="unzip {$zipFilePath} -d {$destinyDiretory}";
		exec($command);
	}
	
	public function restoreBackup($zipFileName){
		$zipFilePath=$this->backupDirectory.'/'.$zipFileName;
		$unzipDiretory=$this->backupDirectory."/restore";
		$this->unzipFile($zipFilePath, $unzipDiretory);
		$fullSql= base64_decode(file_get_contents($unzipDiretory."/dump.sql"));
		$sqls=explode('/***********/', $fullSql);
		foreach($sqls as $sql){
			if(!empty($sql)){
				$crud=new Crud();
				$crud->execStatement($sql);
			}
		}
		
		$this->deletePath($this->uploadsDirectory);
		rename($unzipDiretory.'/uploads', $this->uploadsDirectory);
	}
	
	public function checkLogin($username, $password){
		$crud=new Crud();
		$crud->setTable('user');
		$crud->setClausule('username', '=', $username);
		$crud->setClausule('password', '=', md5($password));
		return $crud->loadFirst();
	}
	
	public function getActionsUser($user_id){
		$permition_ids=[];
		$permitions=$this->getUserPermitions($user_id);
		foreach($permitions as $permition){
			$permition_ids[]=$permition['id'];
		}
		
		$crud=new Crud();
		$crud->setTable('permition_action');
		$crud->setClausule('permition_id', 'in', $permition_ids);
		return $crud->load();
	}
	
	public function getUserPermitions($user_id){
		$user=$this->getUser($user_id);
		
		if($user['role']=='ADMIN'){
			$crud=new Crud();
			$crud->setTable('permition', 'p');
			$crud->setOrder('p.order');
			return $crud->load(['p.*']);
		}
		else{
			$crud=new Crud();
			$crud->setTable('user_permition', 'us');
			$crud->setTable('permition', 'p');
			$crud->setClausule('us.user_id', '=', $user_id);
			$crud->setJoin('us.permition_id', '=', 'p.id');
			$crud->setOrder('p.order');
			return $crud->load(['p.*']);
		}
		return [];
	}
	
	private function getUsersByMail($email){
		if(empty($email)){
			return [];
		}
		
		$crud=new Crud();
		$crud->setTable('user');
		$crud->setClausule('email', '=', $email);
		return $crud->load();
	}
	
	public function getUserByToken($token){
		if(empty($token)){
			return [];
		}
		
		$crud=new Crud();
		$crud->setTable('user');
		$crud->setClausule('token', '=', $token);
		return $crud->loadFirst();
	}
	
	private function saveUserToken($user_id, $token){
		$crud=new Crud();
		$crud->setTable('user');
		$crud->setValue('token', $token);
		$crud->setClausule('id', '=', $user_id);
		$crud->update();
	}
	
	public function sentRestartPasswordLink($email){
		$users=$this->getUsersByMail($email);
		foreach($users as $user){
			$token=md5($user['id'].microtime(true));
			$this->saveUserToken($user['id'], $token);
			
			$link="{$_SERVER['SERVER_NAME']}/Guest/PasswordRestart/{$token}";
			$subject= "Reinicio de Contraseña";
			$body = "
					<h1>Reinicio de Contraseña</h1>
					<div>Nombre: {$user['name']}</div>
					<div>Username: {$user['username']}</div>
					<div>
						<a href='{$link}'>
							<button type='button'>Reiniciar Contraseña</button>
						</a>
					</div>
					";
			
			$emailHelper =new EmailHelper();
			$emailHelper->sentEmail($user['email'], null, null, $subject, $body);
		}
	}
	
	public function passwordRestart($token, $password){
		if(empty($token)){
			return;
		}
		
		$crud=new Crud();
		$crud->setTable('user');
		$crud->setValue('token', '');
		$crud->setValue('password', md5($password));
		$crud->setClausule('token', '=', $token);
		$crud->update();
	}
	
	private function applyMemberToTemplate($member, $text){
		$sportList="";
		foreach($member['sports'] as $sport){
			if(!empty($sportList)){
				$sportList.=", ";
			}
			$sportList.=$sport['name'];
		}
		
		$text= str_replace('{NOMBRE}', $member['name'], $text);
		$text= str_replace('{AÑO_NACIMIENTO}', $member['year_birth'], $text);
		$text= str_replace('{AÑO_MUERTE}', $member['year_death'], $text);
		$text= str_replace('{DEPORTES}', $sportList, $text);
		$text= str_replace(htmlentities ('{AÑO_NACIMIENTO}'), $member['year_birth'], $text);
		$text= str_replace(htmlentities ('{AÑO_MUERTE}'), $member['year_death'], $text);
		return $text;
	}
	
	public function makeObituaryMember($member_id){
		$member=$this->getMember($member_id);
		$newImageFilename=null;
		
		$memberImage=$this->getImage($member['image_id']);
		if(!empty($memberImage)){
			$memberImagePath=$this->uploadsDirectory.'/'.$memberImage['filename'];
			if(file_exists($memberImagePath) && is_file($memberImagePath)){
				$newImageFilename=microtime(true).'.'.pathinfo($memberImage['filename'], PATHINFO_EXTENSION);
				copy($memberImagePath, $this->uploadsDirectory.'/'.$newImageFilename);
			}
		}
		$title=$this->applyMemberToTemplate($member, $this->getText('member_obituary_title'));
		$description=$this->applyMemberToTemplate($member, $this->getText('member_obituary_description'));
		$this->addEvent($title, date("Y-m-d"), $description, $newImageFilename);
	}
	
	
	
	public function clearOldBackups(){
		$days = 1;  
		if ($handle = opendir($this->backupDirectory)){
			while (false !== ($file = readdir($handle))){
				$filePath=$this->backupDirectory.'/'.$file;
				if (is_file($filePath)){
					if (filemtime($filePath) < ( time() - ( $days * 24 * 60 * 60 ) ) ){  
						unlink($filePath);  
					}
				}
			}
		}
	}
	
	public function debug(){
		$crud=new Crud();
		$crud->setTable('member');
		$members=$crud->load();
		
		foreach($members as $member){
			echo "{$member['id']};;; {$member['name']}<br/>";
		}
	}
	
	public function sendContactMail($name, $email, $phone, $comment){
		$subject= "Contacto por web";
		$body = "
				<h1>Contacto por web</h1>
				<div>Nombre: {$name}</div>
				<div>Email: {$email}</div>
				<div>Telefono: {$phone}</div>
				<div>Comentario: {$comment}</div>
				";

		$emailAdmin=$this->getConfiguration('contact_us_email');
		$emailHelper =new EmailHelper();
		$emailHelper->sentEmail($emailAdmin, null, null, $subject, $body);
	}
}