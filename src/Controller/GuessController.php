<?php
namespace App\Controller;
use Cake\Event\Event;

use salfadeco\Crud;

class GuessController extends AppController
{
    public function beforeFilter(Event $event){
		parent::beforeFilter($event);
		$menuItems=[
			['desc'=>"Inicio", "link"=>"/Guess/Events"],
			['desc'=>"Miembros", "link"=>"/Guess/Members"],
			['desc'=>"Deportes", "link"=>"/Guess/Sports"],
			['desc'=>"Juntas Directivas", "link"=>"/Guess/DirectorsTeams"],
			['desc'=>"Contáctenos", "link"=>"/Guess/ContacUs"],
			['desc'=>"Galerías", "link"=>"/Guess/Galleries"],
			['desc'=>"Historia", "link"=>"/Guess/History"],
			['desc'=>"Ingresar", "link"=>"/Guess/Login"],
		];

		$this->selectCurrentMenuItem($menuItems);

		$this->set([
			'menuItems'=>$menuItems
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
	
    }
	
	public function history(){
		$this->set([
			'site_history'=>$this->salfadeco->getText('site_history'),
			'images'=>$this->salfadeco->getImagesHistory()
		]);
	}
	
	public function contacUs(){
		$this->set([
			'contact_us_email'=>$this->salfadeco->getConfiguration('contact_us_email'),
			'contact_us_phone'=>$this->salfadeco->getConfiguration('contact_us_phone'),
			'contact_us_address'=>$this->salfadeco->getText('contact_us_address'),
		]);
	}
}