<div class="members view">
<h2><?php echo __('Member'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($member['Member']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Girl'); ?></dt>
		<dd>
			<?php echo $this->Html->link($member['Girl']['id'], array('controller' => 'girls', 'action' => 'view', $member['Girl']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datetime'); ?></dt>
		<dd>
			<?php echo h($member['Member']['datetime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Login'); ?></dt>
		<dd>
			<?php echo h($member['Member']['login']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mod Level'); ?></dt>
		<dd>
			<?php echo h($member['Member']['mod_level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Cnx'); ?></dt>
		<dd>
			<?php echo h($member['Member']['first_cnx']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Cnx'); ?></dt>
		<dd>
			<?php echo h($member['Member']['last_cnx']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cover'); ?></dt>
		<dd>
			<?php echo h($member['Member']['cover']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pseudo'); ?></dt>
		<dd>
			<?php echo h($member['Member']['pseudo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo h($member['Member']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthday'); ?></dt>
		<dd>
			<?php echo h($member['Member']['birthday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($member['Member']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($member['Member']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo h($member['Member']['region']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($member['Member']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alert'); ?></dt>
		<dd>
			<?php echo h($member['Member']['alert']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Table'); ?></dt>
		<dd>
			<?php echo h($member['Member']['table']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dead'); ?></dt>
		<dd>
			<?php echo h($member['Member']['dead']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsBan'); ?></dt>
		<dd>
			<?php echo h($member['Member']['isBan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo h($member['Member']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shard'); ?></dt>
		<dd>
			<?php echo h($member['Member']['shard']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($member['Member']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($member['Member']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('New'); ?></dt>
		<dd>
			<?php echo h($member['Member']['new']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('InContact'); ?></dt>
		<dd>
			<?php echo h($member['Member']['inContact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Can Chat'); ?></dt>
		<dd>
			<?php echo h($member['Member']['can_chat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsOnline'); ?></dt>
		<dd>
			<?php echo h($member['Member']['isOnline']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thumb'); ?></dt>
		<dd>
			<?php echo h($member['Member']['thumb']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Can Mail'); ?></dt>
		<dd>
			<?php echo h($member['Member']['can_mail']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Member'), array('action' => 'edit', $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Member'), array('action' => 'delete', $member['Member']['id']), null, __('Are you sure you want to delete # %s?', $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Girls'), array('controller' => 'girls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Girl'), array('controller' => 'girls', 'action' => 'add')); ?> </li>
	</ul>
</div>
