<?php
namespace App\Controller;
use Cake\Event\Event;

use salfadeco\Crud;

class GuestController extends AppController
{
    public function beforeFilter(Event $event){
		parent::beforeFilter($event);
    }
	
	public function home(){
		$this->set([
			'site_welcome'=>$this->salfadeco->getText('site_welcome'),
			'site_rules_file'=>$this->salfadeco->getConfiguration('site_rules_file'),
			'site_rules_file_org_name'=>$this->salfadeco->getConfiguration('site_rules_file_org_name'),
			'site_welcome_image'=>$this->salfadeco->getImage($this->salfadeco->getConfiguration('site_welcome_image_id')),
		]);
	}
    
    public function sports(){
        $this->set([
			'sports'=>$this->salfadeco->getSports()
		]);
    }
    
    public function sport($sport_id){
        $this->set([
			'sport'=>$this->salfadeco->getSport($sport_id)
		]);
    }
    
    public function members(){
		$paginationCurrentPage=$this->getParameter('paginationCurrentPage', 0);
		$paginationItemsPerPage=10;
		
		$result=$this->salfadeco->getMembers($this->getParameter('filter'), $this->getParameter('sport_id'), null, null, $paginationCurrentPage*$paginationItemsPerPage, $paginationItemsPerPage);
		
		$this->set([
			'paginationCurrentPage'=>$paginationCurrentPage,
			'paginationItemsPerPage'=>$paginationItemsPerPage,
			'paginationTotalItems'=>$result['total'],
			'members'=>$result['items'],
			'sports'=>$this->salfadeco->getSports(),
			'filter'=>$this->getParameter('filter'),
			'sport_id'=>$this->getParameter('sport_id')
		]);
    }
    
    public function member($member_id){
        $this->set([
			'member'=>$this->salfadeco->getMember($member_id),
		]);
    }
    
    public function directorsTeams(){
		$paginationCurrentPage=$this->getParameter('paginationCurrentPage', 0);
		$paginationItemsPerPage=10;
		
		$result=$this->salfadeco->getDirectorsTeams($paginationCurrentPage*$paginationItemsPerPage, $paginationItemsPerPage);
		
		$this->set([
			'paginationCurrentPage'=>$paginationCurrentPage,
			'paginationItemsPerPage'=>$paginationItemsPerPage,
			'paginationTotalItems'=>$result['total'],
			'directors_teams'=>$result['items']
		]);
    }
    
    public function directorsTeam($directors_team_id){
		$this->set([
			'directors_team'=>$this->salfadeco->getDirectorsTeam($directors_team_id)
		]);
    }
    
    public function events(){
		$paginationCurrentPage=$this->getParameter('paginationCurrentPage', 0);
		$paginationItemsPerPage=10;
		
		$result=$this->salfadeco->getEvents($paginationCurrentPage*$paginationItemsPerPage, $paginationItemsPerPage);
		
		$this->set([
			'paginationCurrentPage'=>$paginationCurrentPage,
			'paginationItemsPerPage'=>$paginationItemsPerPage,
			'paginationTotalItems'=>$result['total'],
			'events'=>$result['items'],
		]);
    }
    
    public function event($event_id){
		$this->set([
			'event'=>$this->salfadeco->getEvent($event_id)
		]);
    }
    
    public function galleries(){
		$paginationCurrentPage=$this->getParameter('paginationCurrentPage', 0);
		$paginationItemsPerPage=10;
		
		$result=$this->salfadeco->getGalleries($paginationCurrentPage*$paginationItemsPerPage, $paginationItemsPerPage);
		
		$this->set([
			'paginationCurrentPage'=>$paginationCurrentPage,
			'paginationItemsPerPage'=>$paginationItemsPerPage,
			'paginationTotalItems'=>$result['total'],
			'galleries'=>$result['items'],
		]);
    }
    
    public function gallery($gallery_id){
		$this->set([
			'gallery'=>$this->salfadeco->getGallery($gallery_id)
		]);
    }
    
    public function login(){
		if($this->getParameter('formAction')=='login'){
			$user=$this->salfadeco->checkLogin($this->getParameter('username'), $this->getParameter('password'));
			if(!empty($user)){
				$this->makeUserSession($user);
			}
			else{
				$this->deleteUserSession();
			}
		}
		
		$authUser=$this->getUserSession();
		$homeLink='/guest/deny';
		$permitions=$this->salfadeco->getUserPermitions($authUser['id']);
		foreach($permitions as $permition){
			$homeLink=$permition['menu_link'];
			break;
		}
		
		$this->set([
			'homeLink'=>$homeLink,
			'username'=>$this->getParameter('username'),
			'authUser'=>$authUser
		]);
    }
	
	public function history(){
		$this->set([
			'site_history'=>$this->salfadeco->getText('site_history'),
			'images'=>$this->salfadeco->getImagesHistory()
		]);
	}
	
	public function contacUs(){
		if($this->getParameter('formAction')=='sendContactMail'){
			$this->salfadeco->sendContactMail(	$this->getParameter('name'),
												$this->getParameter('email'),
												$this->getParameter('phone'),
												$this->getParameter('comment'));
		}
		
		$this->set([
			'contact_us_email'=>$this->salfadeco->getConfiguration('contact_us_email'),
			'contact_us_phone'=>$this->salfadeco->getConfiguration('contact_us_phone'),
			'contact_us_address'=>$this->salfadeco->getText('contact_us_address'),
		]);
	}
	
	public function Deny(){
		
	}
	
	public function forgotPassword(){
		if($this->getParameter('formAction')=='sentRestartPasswordLink'){
			$this->salfadeco->sentRestartPasswordLink($this->getParameter('email'));
		}
	}
	
	public function passwordRestart($token){
		$updateDone=false;
		if($this->getParameter('formAction')=='passwordRestart'){
			$this->salfadeco->passwordRestart($token, $this->getParameter('password'));
			$updateDone=true;
		}
		
		$this->set([
			'user'=>$this->salfadeco->getUserByToken($token),
			'updateDone'=>$updateDone
		]);
	}
	
	public function debug(){
		$this->salfadeco->debug();
	}
}