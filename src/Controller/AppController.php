<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;
use Cake\Controller\Controller;
use Cake\Event\Event;
use salfadeco\Salfadeco;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	var $salfadeco=null;
	
	public function beforeFilter(Event $event){
		parent::beforeFilter($event);
		$this->salfadeco=new Salfadeco(UPLOADS_DIRECTORY, BACKUP_DIRECTORY);
		
		$menuItems=[];
		$user=$this->getUserSession();
		if(!empty($user)){
			$permitions=$this->salfadeco->getUserPermitions($user['id']);
			$menuItems=[];
			foreach($permitions as $permition){
				$menuItems[]=['desc'=>$permition['descripcion'], 'link'=>$permition['menu_link'],];
			}
			$menuItems[]=['desc'=>"Salir", 'link'=>"/Admin/Logout",];
		}
		else{
			$menuItems=[
				['desc'=>"Inicio", "link"=>"/Guest/Home"],
				['desc'=>"Eventos", "link"=>"/Guest/Events"],
				['desc'=>"Miembros", "link"=>"/Guest/Members"],
				['desc'=>"Deportes", "link"=>"/Guest/Sports"],
				['desc'=>"Juntas Directivas", "link"=>"/Guest/DirectorsTeams"],
				['desc'=>"Contáctenos", "link"=>"/Guest/ContacUs"],
				['desc'=>"Galerías", "link"=>"/Guest/Galleries"],
				['desc'=>"Historia", "link"=>"/Guest/History"],
				['desc'=>"Ingresar", "link"=>"/Guest/Login"],
			];
		}
		$this->selectCurrentMenuItem($menuItems);
		$this->set([
			'menuItems'=>$menuItems
		]);
	}
	
	public function beforeRender(Event $event) {
		parent::beforeRender($event);
		$this->set([
			'site_title'=>$this->salfadeco->getConfiguration('site_title'),
			'site_title_short'=>$this->salfadeco->getConfiguration('site_title_short'),
			'site_footer'=>$this->salfadeco->getText('site_footer'),
			'site_color_header_1'=>$this->salfadeco->getConfiguration('site_color_header_1'),
			'site_color_header_div'=>$this->salfadeco->getConfiguration('site_color_header_div'),
			'site_color_header_2'=>$this->salfadeco->getConfiguration('site_color_header_2'),
			'site_color_header_border'=>$this->salfadeco->getConfiguration('site_color_header_border'),
			'site_color_text'=>$this->salfadeco->getConfiguration('site_color_text'),
			'site_color_body_background'=>$this->salfadeco->getConfiguration('site_color_body_background'),
			'site_color_body_border'=>$this->salfadeco->getConfiguration('site_color_body_border'),
			'site_color_footer_background'=>$this->salfadeco->getConfiguration('site_color_footer_background'),
			'site_color_footer_border'=>$this->salfadeco->getConfiguration('site_color_footer_border'),
			'site_color_bottom_background'=>$this->salfadeco->getConfiguration('site_color_bottom_background'),
			'site_color_bottom_border'=>$this->salfadeco->getConfiguration('site_color_bottom_border'),
			'site_color_bottom_text'=>$this->salfadeco->getConfiguration('site_color_bottom_text'),
			'site_color_bottom_background_active'=>$this->salfadeco->getConfiguration('site_color_bottom_background_active'),
			'site_color_bottom_border_active'=>$this->salfadeco->getConfiguration('site_color_bottom_border_active'),
			'site_color_bottom_text_active'=>$this->salfadeco->getConfiguration('site_color_bottom_text_active'),
			'site_logo_image_id'=>$this->salfadeco->getConfiguration('site_logo_image_id'),
			'site_logo_image'=>$this->salfadeco->getImage($this->salfadeco->getConfiguration('site_logo_image_id')),
			'site_logo2_image_id'=>$this->salfadeco->getConfiguration('site_logo2_image_id'),
			'site_logo2_image'=>$this->salfadeco->getImage($this->salfadeco->getConfiguration('site_logo2_image_id')),
			'facebook_appId'=>$this->salfadeco->getConfiguration('facebook_appId'),
			'site_background_image'=>$this->salfadeco->getImage($this->salfadeco->getConfiguration('site_background_image')),
		]);
	}
	
	public function getParameter($name, $default=""){
		if(isset($_POST[$name])){
			return $_POST[$name];
		}
		if(isset($_GET[$name])){
			return $_GET[$name];
		}
		return $default;
	}
	

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
    
    public function selectCurrentMenuItem(&$menuItems){
		$controller=$this->request->getParam('controller');
		$action=$this->request->getParam('action');
		$link=strtolower("{$controller}{$action}");

		foreach($menuItems as &$menuItem){
			if(str_replace("/","", strtolower($menuItem['link']))==$link){
				$menuItem['active']=true;
			}
		}
    }
	
	public function makeUserSession($user){
		$this->getRequest()->getSession()->write('Auth.user', $user);
	}
	
	public function deleteUserSession(){
		$this->getRequest()->getSession()->destroy();
	}
	
	public function getUserSession(){
		return $this->getRequest()->getSession()->read('Auth.user');
	}
}
