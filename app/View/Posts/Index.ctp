<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<?php echo $this->html->link('Añadir post', array('controller'=>'posts','action'=>'add')); ?>
<table>
    <tr>
        <th>Id</th>
		<th>opciones</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
		<td>
			<?php echo $this->Form->postLink('borrar',array('action'=>'delete',$post['Post']['id']),array('confirm'=>'estas seguro?')); ?>
			<?php echo $this->Html->link('editar', array('action'=>'edit',$post['Post']['id'])); ?>
		</td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
	    </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>