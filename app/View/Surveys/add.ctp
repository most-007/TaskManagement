<?php echo $this->Html->script('survey_validation'); ?>
<?php echo $this->Html->script('jquery.hortree'); ?>
<?php echo $this->Html->script('jquery.line'); ?>
<?php echo $this->Html->css('jquery.hortree'); ?>
<div id="questions" style="z-index: -1;"></div>
<br>
<div id="page-container" class="row">






<div class="card qform"
style="
    width: 80%;
    padding: 20px;
    /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
	display: none;
	position:absolute;
	left:0;
	right:0;
	margin-left:auto;
	margin-right:auto;
	top: 50px;
	background-color: powderblue;
	z-index: 100;
	">

    <h3 class="card-header info-color white-text text-center py-4">
        <strong>Enter Question Info</strong>
    </h3> <br>

    <!--Card content-->
    <div class="card-body px-lg-5">

        <!-- Form -->
        <form class="text-center" style="color: #757575;">

            <!-- Name -->
            <div class="md-form mt-3">
                <label for="qtext">Question</label>
			<textarea class="form-control" id="qtext" cols="150" rows="3" placeholder="Enter a question..." autofocus></textarea>
            </div> <br>
            <div class="md-form mt-3">
                <label for="qtext">Next question on "YES"</label>
			<textarea class="form-control" cols="150" rows="3"id="yq" placeholder="Enter a &quot;YES&quot; question..."></textarea>
            </div> <br>
            <div class="md-form mt-3">
                <label for="qtext">Next question on "NO"</label>
			<textarea class="form-control" cols="150" rows="3"id="nq" placeholder="Enter a &quot;NO&quot; question..."></textarea>
            </div>

<br>
            <button class="form-control btn btn-rounded btn-primary btn-lg align-middle" style="width: 10%; vertical-align: middle;" type="button" id="save-q">Save</button>

            <button class="form-control btn btn-rounded btn-danger btn-lg align-middle" id="qform-close" style="width: 10%; vertical-align: middle;" type="button">Cancel</button>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form subscription -->











	<div id="sidebar" class="col-sm-3">

		<div class="actions">

			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Html->link(__('List Surveys'), array('action' => 'index')); ?></li>
			</ul><!-- /.list-group -->

		</div><!-- /.actions -->

	</div><!-- /#sidebar .col-sm-3 -->

	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Add Survey'); ?></h2>

		<div class="surveys form">

			<?php echo $this->Form->create('Survey', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('title', array('class' => 'form-control', 'id' => 'title')); ?>
					</div><!-- .form-group -->


					<button type="button" id="submit" class="btn btn-large btn-primary">Submit</button>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->

	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
