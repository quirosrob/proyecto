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
		$this->salfadeco=new Salfadeco();
	}
	
	public function getParameter($name){
		if(isset($_POST[$name])){
			return $_POST[$name];
		}
		if(isset($_GET[$name])){
			return $_GET[$name];
		}
		return "";
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
}
