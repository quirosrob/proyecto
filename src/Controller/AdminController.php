<?php
namespace App\Controller;
use Cake\Event\Event;

class AdminController extends AppController
{   
    public function beforeFilter(Event $event){
		parent::beforeFilter($event);
		
		$this->loadComponent('File');
		
		$menuItems=[
			['desc'=>"Noticias", "link"=>"/Admin/Events"],
			['desc'=>"Miembros", "link"=>"/Admin/Members"],
			['desc'=>"Deportes", "link"=>"/Admin/Sports"],
			['desc'=>"Juntas Directivas", "link"=>"/Admin/DirectorsTeams"],
			['desc'=>"Contáctenos", "link"=>"/Admin/ContacUs"],
			['desc'=>"Galerías", "link"=>"/Admin/Galleries"],
			['desc'=>"Historia", "link"=>"/Admin/History"],
			['desc'=>"Configuración", "link"=>"/Admin/Configuration"],
			['desc'=>"Accesos", "link"=>"/Admin/Access"],
			['desc'=>"Salir", "link"=>"/Admin/Logout"],
		];

		$this->selectCurrentMenuItem($menuItems);

		$this->set([
			'menuItems'=>$menuItems
		]);
    }

    public function sports(){
		if($this->getParameter('formAction')=='deleteSport'){
			$this->salfadeco->deleteSport($this->getParameter('sport_id'));
		}
		
		$this->set([
			'sports'=>$this->salfadeco->getSports()
		]);
    }
    
    public function sport($sport_id){
        if($this->getParameter('formAction')=='updateSport'){
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->updateSport($sport_id, $this->getParameter('name'), $this->getParameter('description'), $image);
		}
		
		$this->set([
			'sport'=>$this->salfadeco->getSport($sport_id)
		]);
    }
    
    public function members(){
		
		if($this->getParameter('formAction')=='deleteMember'){
			$this->salfadeco->deleteMember($this->getParameter('member_id'));
		}
		
        $this->set([
			'members'=>$this->salfadeco->getMembers($this->getParameter('filter'), $this->getParameter('sport_id')),
			'sports'=>$this->salfadeco->getSports(),
			'filter'=>$this->getParameter('filter'),
			'sport_id'=>$this->getParameter('sport_id')
		]);
    }
    
    public function member($member_id){
		$sports=$this->salfadeco->getSports();
		if($this->getParameter('formAction')=='updateMember'){
			$sport_ids=[];
			foreach($sports as $sport){
				if($this->getParameter("sport_{$sport['id']}")=='Y'){
					$sport_ids[]=$sport['id'];
				}
			}
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->updateMember($member_id, $this->getParameter('name'), $this->getParameter('date_entry'), $this->getParameter('biography'), $sport_ids, $image);
		}
		
        $this->set([
			'member'=>$this->salfadeco->getMember($member_id),
			'sports'=>$sports
		]);
    }
    
    public function memberGalery($member_id){
		if($this->getParameter('formAction')=='addImageToMember'){
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->addImageToMember($member_id, $image);
		}
		
		$this->set([
			'member'=>$this->salfadeco->getMember($member_id)
		]);
    }
    
    public function newMember(){
		$sports=$this->salfadeco->getSports();
		if($this->getParameter('formAction')=='addMember'){
			$sport_ids=[];
			foreach($sports as $sport){
				if($this->getParameter("sport_{$sport['id']}")=='Y'){
					$sport_ids[]=$sport['id'];
				}
			}
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->addMember($this->getParameter('name'), $this->getParameter('date_entry'), $this->getParameter('biography'), $sport_ids, $image);
		}
		
        $this->set([
			'sports'=>$sports
		]);
    }
    
    public function sportGalery($sport_id){
		if($this->getParameter('formAction')=='addImageToSport'){
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->addImageToSport($sport_id, $image);
		}
		
		$this->set([
			'sport'=>$this->salfadeco->getSport($sport_id)
		]);
    }
    
    public function newSport(){
		if($this->getParameter('formAction')=='addSport'){
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->addSport($this->getParameter('name'), $this->getParameter('description'), $image);
		}
    }
    
    public function directorsTeams(){
        if($this->getParameter('formAction')=='deleteDirectorsTeam'){
			$this->salfadeco->deleteDirectorsTeam($this->getParameter('directors_team_id'));
		}
		
		$this->set([
			'directors_teams'=>$this->salfadeco->getDirectorsTeams()
		]);
    }
    
    public function directorsTeam($directors_team_id){
        if($this->getParameter('formAction')=='updateDirectorsTeam'){
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->updateDirectorsTeam($directors_team_id, $this->getParameter('name'), $this->getParameter('description'), $image);
		}
		
		$this->set([
			'directors_team'=>$this->salfadeco->getDirectorsTeam($directors_team_id)
		]);
    }
    
    public function directorsTeamGallery($directors_team_id){
        if($this->getParameter('formAction')=='addImageToSport'){
                    $image=$this->File->receiveImageFromBrowser('image');
                    $this->salfadeco->addImageToDirectorsTeam($directors_team_id, $image);
            }

            $this->set([
                    'directors_team'=>$this->salfadeco->getDirectorsTeam($directors_team_id)
            ]);
	
    }
    
    public function NewDirectorsTeam(){
        if($this->getParameter('formAction')=='addDirectorsTeam'){
           $image= $this->File->receiveImageFromBrowser('image');
           $this->salfadeco->addDirectorsTeam($this->getParameter('name'), $this->getParameter('description'), $image, null);  
        }
	
    }
    
    public function events(){
		if($this->getParameter('formAction')=='deleteEvent'){
			$this->salfadeco->deleteEvent($this->getParameter('event_id'));
		}
		
		$this->set([
			'events'=>$this->salfadeco->getEvents()
		]);
    }
    
    public function event($event_id){
		if($this->getParameter('formAction')=='updateEvent'){
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->updateEvent($event_id, $this->getParameter('name'), $this->getParameter('date'), $this->getParameter('description'), $image);
		}
		
		$this->set([
			'event'=>$this->salfadeco->getEvent($event_id)
		]);
    }
	
    public function eventGalery($event_id){
		if($this->getParameter('formAction')=='addImageToEvent'){
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->addImageToEvent($event_id, $image);
		}
		
		$this->set([
			'event'=>$this->salfadeco->getEvent($event_id)
		]);
    }
    
    public function NewEvent(){
		if($this->getParameter('formAction')=='addEvent'){
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->addEvent($this->getParameter('name'), $this->getParameter('date'), $this->getParameter('description'), $image);
		}
    }
    
    public function logout(){
		return $this->redirect("/");
    }
    
    public function galleries(){
		if($this->getParameter('formAction')=='deleteGallery'){
			$this->salfadeco->deleteGallery($this->getParameter('gallery_id'));
		}
		
		$this->set([
			'galleries'=>$this->salfadeco->getGalleries()
		]);
    }
    
    public function gallery($gallery_id){
		if($this->getParameter('formAction')=='updateGallery'){
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->updateGallery($gallery_id, $this->getParameter('name'), $this->getParameter('description'), $image);
		}
		
		$this->set([
			'gallery'=>$this->salfadeco->getGallery($gallery_id)
		]);
    }
    
    public function galleryImages($gallery_id){
		if($this->getParameter('formAction')=='addImageToGallery'){
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->addImageToGallery($gallery_id, $image);
		}
		
		$this->set([
			'gallery'=>$this->salfadeco->getGallery($gallery_id)
		]);
    }
    
    public function newGalery(){
		if($this->getParameter('formAction')=='addGallery'){
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->addGallery($this->getParameter('name'), $this->getParameter('description'), $image);
		}
    }
	
	public function history(){
		if($this->getParameter('formAction')=='updateHistory'){
			$this->salfadeco->setText('site_history', $this->getParameter('site_history'));
		}
		
		$this->set([
			'site_history'=>$this->salfadeco->getText('site_history')
		]);
	}
	
	public function historyGalery(){
		if($this->getParameter('formAction')=='addImageToHistory'){
			$image=$this->File->receiveImageFromBrowser('image');
			$this->salfadeco->addImageToHistory($image);
		}
		
		$this->set([
			'images'=>$this->salfadeco->getImagesHistory()
		]);
	}
	
	public function contacUs(){
		if($this->getParameter('formAction')=='updateContactUs'){
			$this->salfadeco->setConfiguration('contact_us_email', $this->getParameter('contact_us_email'));
			$this->salfadeco->setConfiguration('contact_us_phone', $this->getParameter('contact_us_phone'));
			$this->salfadeco->setText('contact_us_address', $this->getParameter('contact_us_address'));
		}
		
		$this->set([
			'contact_us_email'=>$this->salfadeco->getConfiguration('contact_us_email'),
			'contact_us_phone'=>$this->salfadeco->getConfiguration('contact_us_phone'),
			'contact_us_address'=>$this->salfadeco->getText('contact_us_address'),
		]);
	}
	
	public function configuration(){
		if($this->getParameter('formAction')=='updateConfiguration'){
			$this->salfadeco->setConfiguration('site_title', $this->getParameter('site_title'));
			$this->salfadeco->setConfiguration('site_title_short', $this->getParameter('site_title_short'));
			$this->salfadeco->setText('site_footer', $this->getParameter('site_footer'));
			$this->salfadeco->setConfiguration('site_color_header_1', $this->getParameter('site_color_header_1'));
			$this->salfadeco->setConfiguration('site_color_header_div', $this->getParameter('site_color_header_div'));
			$this->salfadeco->setConfiguration('site_color_header_2', $this->getParameter('site_color_header_2'));
			$this->salfadeco->setConfiguration('site_color_header_border', $this->getParameter('site_color_header_border'));
			$this->salfadeco->setConfiguration('site_color_text', $this->getParameter('site_color_text'));
			$this->salfadeco->setConfiguration('site_color_body_background', $this->getParameter('site_color_body_background'));
			$this->salfadeco->setConfiguration('site_color_body_border', $this->getParameter('site_color_body_border'));
			$this->salfadeco->setConfiguration('site_color_footer_background', $this->getParameter('site_color_footer_background'));
			$this->salfadeco->setConfiguration('site_color_footer_border', $this->getParameter('site_color_footer_border'));
			$this->salfadeco->setConfiguration('site_color_bottom_background', $this->getParameter('site_color_bottom_background'));
			$this->salfadeco->setConfiguration('site_color_bottom_border', $this->getParameter('site_color_bottom_border'));
			$this->salfadeco->setConfiguration('site_color_bottom_text', $this->getParameter('site_color_bottom_text'));
			$this->salfadeco->setConfiguration('site_color_bottom_background_active', $this->getParameter('site_color_bottom_background_active'));
			$this->salfadeco->setConfiguration('site_color_bottom_border_active', $this->getParameter('site_color_bottom_border_active'));
			$this->salfadeco->setConfiguration('site_color_bottom_text_active', $this->getParameter('site_color_bottom_text_active'));
			
			$logo=$this->File->receiveImageFromBrowser('logo');
			if(!empty($logo)){
				$site_logo_image_id=$this->salfadeco->addImage($logo, '');
				$this->salfadeco->setConfiguration('site_logo_image_id', $site_logo_image_id);
			}
		}
	}
	
	public function access(){
		
	}
	
	public function usersRights(){
		
	}
	
	public function removeImageFromGroup($image_id){
		$this->salfadeco->deleteImage($image_id);
		return $this->response->withType("application/json")->withStringBody(json_encode(['status'=>'ok']));
	}
}
