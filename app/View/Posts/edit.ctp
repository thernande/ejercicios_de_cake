<!-- FILE: app/view/post/edit.ctp -->

<h1>editar post</h1>
<?php
	echo $this->Form->create('Post',array('action'=>'edit'));
	echo $this->Form->input('title');
	echo $this->Form->input('body',array('rows'=>'3'));
	echo $this->Form->input('id',array('type'=>'hidden'));
	echo $this->Form->end('grabar');
?>