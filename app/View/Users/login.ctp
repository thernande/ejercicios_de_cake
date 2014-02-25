<div class="loginForm">
<?php echo $this->Session->flash('auth');
echo $this->Form->create('User');?>
	<fieldset>
		<legend>
			<?php echo __('ingresa tu nombre de usuario y tu clave');?>
		</legend>
		<?php echo $this->Form->input('username',array('label'=>'nombre de usuario'));
		echo $this->Form->input('password',array('label'=>'clave'));?>
	</fieldset>
<?php echo $this->Form->submit('login');?>
</div>