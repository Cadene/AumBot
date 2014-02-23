<div class="girls index">
	<h2><?php echo __('Girls'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('dMails'); ?></th>
			<th><?php echo $this->Paginator->sort('dCharmes'); ?></th>
			<th><?php echo $this->Paginator->sort('dVisites'); ?></th>
			<th><?php echo $this->Paginator->sort('dPanier'); ?></th>
			<th><?php echo $this->Paginator->sort('lastupdate'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($girls as $girl): ?>
	<tr>
		<td><?php echo h($girl['Girl']['id']); ?>&nbsp;</td>
		<td><?php echo h($girl['Girl']['dMails']); ?>&nbsp;</td>
		<td><?php echo h($girl['Girl']['dCharmes']); ?>&nbsp;</td>
		<td><?php echo h($girl['Girl']['dVisites']); ?>&nbsp;</td>
		<td><?php echo h($girl['Girl']['dPanier']); ?>&nbsp;</td>
		<td><?php echo h($girl['Girl']['lastupdate']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $girl['Girl']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $girl['Girl']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $girl['Girl']['id']), null, __('Are you sure you want to delete # %s?', $girl['Girl']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Girl'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Profils'), array('controller' => 'profils', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profil'), array('controller' => 'profils', 'action' => 'add')); ?> </li>
	</ul>
</div>
