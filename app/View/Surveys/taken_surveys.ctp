
<div id="page-container" class="row">

<div id="sidebar" class="col-sm-3">

<div class="actions">

<ul class="list-group">
	<li class="list-group-item"><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index'), array('class' => '')); ?></li>
	<li class="list-group-item"><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add'), array('class' => '')); ?></li>
	<li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?></li>
</ul><!-- /.list-group -->

</div><!-- /.actions -->

</div><!-- /#sidebar .col-sm-3 -->

<div id="page-content" class="col-sm-9">

	<div class="surveys index">

		<h2><?php echo __('Taken Surveys'); ?></h2>

		<div class="table-responsive">
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('Survey Title'); ?></th>
						<th><?php echo $this->Paginator->sort('Answering User'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>

					</tr>
				</thead>
				<tbody>
<?php foreach ($surveys as $survey): ?>
<tr>
	<td><?php echo h($survey['survey']['title']); ?>&nbsp;</td>
	<td><?php echo h($survey['answering_user']['username']); ?></td>
	<td class="actions">
			<?php
$params = $survey['survey']['id'] . "|" . $survey['answering_user']['id'];
echo $this->Html->link('View', array('action' => 'view', $params), array('class' => 'btn btn-primary'));?>

        </td>
</tr>
<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->



	</div><!-- /.index -->

</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
