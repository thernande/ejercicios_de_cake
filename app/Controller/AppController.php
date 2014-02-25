<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	const ADMIN_KEY  = 'myApp-Admin';
    const AUTH_GROUP = 'MyApp-Admins';

    var $components = array('RequestHandler', 'LdapAuth', 'Session');
    var $helpers = array(
                        'Form', 'Html', 'Locale', 'Session',
                        'Js' => array('Jquery')
                    );
    var $isAdmin;

    function beforeFilter()
    {
        // pr($this->referer());
        $this->isAdmin = false;
        $this->LdapAuth->authorize = 'controller';
        $this->LdapAuth->allowedActions = array(
                                            'index',
                                            'view',
                                            'details'
                                        );

        $this->LdapAuth->loginError = "Invalid credentials";
        $this->LdapAuth->authError  = "Not authorized!";

        $userInfo = $this->LdapAuth->getUser();

        if (!empty($userInfo)) {
            $user = $userInfo['User'];
            // setup display username and user's full name
            $this->set('loggedInUser', $user['samaccountname']);
            $this->set('loggedInFullName', $user['cn']);

            // if we already have the admin role stored in the session
            if ($this->Session->check(self::ADMIN_KEY))
                $this->isAdmin = $this->Session->read(self::ADMIN_KEY);
            else {
                // determine the admin role from wheither the current 
                // user is a member of the AUTH group
                $this->LoadModel('User');
                $this->isAdmin = $this->User->isMemberOf(
                                                $user['samaccountname'],
                                                self::AUTH_GROUP);
                $this->Session->write(self::ADMIN_KEY, $this->isAdmin);
            }
        } else {
            $this->Session->delete(self::ADMIN_KEY);
        }

        $this->set('admin', $this->isAdmin);
    }

    function isAuthorized()
    {
        // Only administrators have access to the CUD actions
        if ($this->action == 'delete' ||
            $this->action == 'edit' ||
            $this->action == 'add')
          return $this->isAdmin;

        return true;                
    }
}
