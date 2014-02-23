<div class="members index">
	<h2><?php echo __('Members'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('girl_id'); ?></th>
			<th><?php echo $this->Paginator->sort('datetime'); ?></th>
			<th><?php echo $this->Paginator->sort('login'); ?></th>
			<th><?php echo $this->Paginator->sort('mod_level'); ?></th>
			<th><?php echo $this->Paginator->sort('first_cnx'); ?></th>
			<th><?php echo $this->Paginator->sort('last_cnx'); ?></th>
			<th><?php echo $this->Paginator->sort('cover'); ?></th>
			<th><?php echo $this->Paginator->sort('pseudo'); ?></th>
			<th><?php echo $this->Paginator->sort('sex'); ?></th>
			<th><?php echo $this->Paginator->sort('birthday'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('region'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('alert'); ?></th>
			<th><?php echo $this->Paginator->sort('table'); ?></th>
			<th><?php echo $this->Paginator->sort('dead'); ?></th>
			<th><?php echo $this->Paginator->sort('isBan'); ?></th>
			<th><?php echo $this->Paginator->sort('path'); ?></th>
			<th><?php echo $this->Paginator->sort('shard'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('age'); ?></th>
			<th><?php echo $this->Paginator->sort('new'); ?></th>
			<th><?php echo $this->Paginator->sort('inContact'); ?></th>
			<th><?php echo $this->Paginator->sort('can_chat'); ?></th>
			<th><?php echo $this->Paginator->sort('isOnline'); ?></th>
			<th><?php echo $this->Paginator->sort('thumb'); ?></th>
			<th><?php echo $this->Paginator->sort('can_mail'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($members as $member): ?>
	<tr>
		<td><?php echo h($member['Member']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($member['Girl']['id'], array('controller' => 'girls', 'action' => 'view', $member['Girl']['id'])); ?>
		</td>
		<td><?php echo h($member['Member']['datetime']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['login']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['mod_level']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['first_cnx']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['last_cnx']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['cover']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['pseudo']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['sex']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['birthday']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['country']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['zip']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['region']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['city']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['alert']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['table']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['dead']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['isBan']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['path']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['shard']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['url']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['age']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['new']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['inContact']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['can_chat']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['isOnline']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['thumb']); ?>&nbsp;</td>
		<td><?php echo h($member['Member']['can_mail']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $member['Member']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $member['Member']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $member['Member']['id']), null, __('Are you sure you want to delete # %s?', $member['Member']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Member'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Girls'), array('controller' => 'girls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Girl'), array('controller' => 'girls', 'action' => 'add')); ?> </li>
	</ul>
</div>
