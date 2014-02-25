<?php
	class UsersController extends AppController{
		var $name='Users';

		function beforeFilter(){
			$this->Auth->allow('usernameExists','forgotPassword', 'signup','login','logout');
			parent::beforeFilter();
		}

		function login(){
			if($this->request->is('post')){
				if($this->Auth->login()){
					return $this->redirect($this->Auth->redirect());
				}
				else{
					$this->Session->setFlash(__('nombre de usuario o clave incorrectos'),
						'default',array('class'=>'error message'),'auth');
				}
			}
		}
		public function logout(){
			$this->log("destroying session", 'debug');
			$this->Session->destroy();
			return $this->redirect($this->Auth->logout());
		}
	}
?>