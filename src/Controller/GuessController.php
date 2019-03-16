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
		$this->set([
			'members'=>$this->salfadeco->getMembers($this->getParameter('filter'), $this->getParameter('sport_id')),
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
	
    }
    
    public function directorsTeam($directors_team_id){
	
    }
    
    public function events(){
		//pedir parametro
		
		
		//ejecutar algo
		
		//devlver algo a la vista
		$this->set([
			'events'=>$this->salfadeco->getEvents(),
		]);
    }
    
    public function event($event_id){
		$this->set([
			'event'=>$this->salfadeco->getEvent($event_id)
		]);
    }
    
    public function galleries(){
		$this->set([
			'galleries'=>$this->salfadeco->getGalleries()
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
		
	}
	
	public function contacUs(){
		
	}
}