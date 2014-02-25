<?php
	class PostsController extends AppController
	{
		public $helpers=array('Html','Form');
		public $name='Posts';
		
		public function index()
		{
			$this->set('posts',$this->Post->find('all'));
		}
		public function view($id=null)
		{
			$this->Post->id=$id;
			$this->set('post',$this->Post->read());
		}
		public function add()
		{
			if($this->request->is('post'))
			{
				if($this->Post->save($this->request->data))
				{
					$this->Session->setFlash('tu post a sido grabado.');
					$this->redirect(array('action'=>'index'));
				}
			}
		}
		public function edit($id=null)
		{
			if(!$id)
			{
				throw new NotFoundException(_('invalid post'));
			}
			
			$post=$this->Post->findById($id);
			if(!$post)
			{
				throw new NotFoundException(__('invalid post'));
			}
			if($this->request->is(array('post','put')))
			{
				$this->Post->id=$id;
				if($this->Post->save($this->request->data))
				{
					$this->Session->setFlash(__('tu post a sido editado'));
					return $this->redirect(array('action'=>'index'));
				}
				$this->Session->setFlash(__('no se puede editar el post'));
			}
			if(!$this->request->data)
			{
				$this->request->data=$post;
			}
		}
		public function delete($id)
		{
			if(!$this->request->is('post'))
			{
				throw new MethodNotAllowedException();
			}
			if($this->Post->delete($id))
			{
				$this->Session->setFlash('el pos con la id: '.$id.' a sido borrada');
				$this->redirect(array('action'=>'index'));
			}
		}
		
		
	}
?>