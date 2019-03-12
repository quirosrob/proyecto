<?php
namespace App\Controller;
use Cake\Event\Event;

class AdminController extends AppController
{   
    public function beforeFilter(Event $event){
	parent::beforeFilter($event);
	
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
        
    }
    
    public function sport($sport_id){
        
    }
    
    public function members(){
        
    }
    
    public function member($member_id){
        
    }
    
    public function memberGalery($member_id){
	
    }
    
    public function newMember(){
        
    }
    
    public function sportGalery($sport_id){
	
    }
    
    public function newSport(){
	
    }
    
    public function directorsTeams(){
	
    }
    
    public function directorsTeam($directors_team_id){
	
    }
    
    public function directorsTeamGallery($directors_team_id){
	
    }
    
    public function NewDirectorsTeam(){
	
    }
    
    public function events(){
	
    }
    
    public function event(){
        
    }
    
    public function eventGalery(){
	
    }
    
    public function NewEvent(){
	
    }
    
    public function logout(){
	return $this->redirect("/");
    }
    
    public function galleries(){
	
    }
    
    public function gallery($gallery_id){
	
    }
    
    public function galleryImages($gallery_id){
	
    }
    
    public function newGalery(){
	
    }
	
	public function history(){
		
	}
	
	public function historyGalery(){
		
	}
	
	public function contacUs(){
		
	}
	
	public function configuration(){
	
	}
	
	public function access(){
		
	}
	
	public function usersRights(){
		
	}
}
