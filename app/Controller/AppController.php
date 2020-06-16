<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

class AppController extends Controller {
    public $components = array(
    'Session',
    'Auth'=>array(
    'authenticate' => array(
    'Blowfish' => array(
    'userModel' => 'User',
    )
    ),
    'loginAction' => array('admin'=>true, 'controller'=>'users', 'action'=>'login'),
    'loginRedirect' => array('admin'=>true, 'controller'=>'dashboards', 'action'=>'index'),
    'logoutRedirect' => array('admin'=>true, 'controller'=>'users', 'action'=>'login'),
    'authError' => 'You can not access that page',
    'authorize' => array('Controller')
    )
    );
    public function beforeFilter(){
    if($this->params['prefix'] == "admin"){
    if($this->Auth->loggedIn()){
    $this->Auth->allow();
    }
    }else{
    $this->Auth->allow();
    }
    $this->set('current_user', $this->Auth->user());
    }
    public function admin_list(){
        $this->set('title_for_layout', 'Story');
        $data = $this->Story->find('all', array(
          'conditions'=>array('status'=>1),
          'order' =>array('updated'=>'desc','Story.name'=>'asc'),
          'recursive' => 0
        ));
        $this->set('data', $data);
     }

     
    }
    
