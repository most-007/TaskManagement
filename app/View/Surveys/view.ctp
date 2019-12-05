
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">

		<div class="actions">

			<ul class="list-group">
		<li class="list-group-item"><?php echo $this->Html->link(__('List Surveys'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Survey'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?> </li>

			</ul><!-- /.list-group -->

		</div><!-- /.actions -->

	</div><!-- /#sidebar .span3 -->

	<div id="page-content" class="col-sm-9">

		<div class="surveys view">

			<h1><?php echo __($survey['Survey']['title']); ?></h1>
			<h3><?php echo __($answers[0]['User']['username']); ?></h3>
<br><br>

		</div><!-- /.view -->


			<div class="related">

				<h3><?php echo __('User Answers'); ?></h3>

				<?php if (!empty($answers)): ?>

					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
		<th><?php echo __('Question'); ?></th>
		<th><?php echo __('Answer'); ?></th>
		<th><?php echo __('Notes'); ?></th>
								</tr>
							</thead>
							<tbody>
<?php $i = 0;
foreach ($answers as $ans): ?>
		<tr>
		<td><?php echo $ans['Question']['question']; ?></td>
			<td><?php echo $ans['Answer']['answer'] == 'y' ? 'Yes' : 'No'; ?></td>
			<td><?php echo $ans['Answer']['notes']; ?></td>
		</tr>
	<?php endforeach;?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->

				<?php endif;?>



			</div><!-- /.related -->


	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
