<h1>usuarios del sistema</h1>
<?php
	echo $this->Html->link('añadir usuario', array('controller' => 'users', 'action' => 'add'));
?>
<table>
	<tr>
		<th>id</th>
		<th>opciones</th>
		<th>nombre de usuario</th>
		<th>contraseña</th>
	</tr>
	<?php foreach ($users as $user):?>
	<tr>
		<td>
			<?php echo $user['User']['id']; ?>
		</td>
		<td>
			<?php echo $this->Form->postLink('borrar', array('action'=>'delete', $user['User']['id']),array('confirm'=>'esta seguro')); ?>
			<?php echo $this->Html->link('editar', array('action' => 'edit', $user['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['User']['username'], array('controller' => 'users', 'action' => 'view',$user['User']['id'])); ?>
		</td>
		<td><?php echo $user['User']['password'] ?></td>
	</tr>
<?php endforeach; ?>
</table>