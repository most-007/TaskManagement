<?php echo $this->Html->script('take_survey'); ?>

<?php
echo $this->Html->css('bsform');
?>


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
	  <h1><?=$q['Survey']['title']?></h1>
	  <br>
    </div>

    <!-- Login Form -->
    <?php echo $this->Form->create('Survey') ?>
<fieldset id="fset">


<?php
echo $this->Form->input('Question', ['id' => $q['Question']['id'], 'class' => 'q', 'value' => $q['Question']['question'], 'disabled']);

// $attributes = array('legend' => false, 'label' => false, 'separator' => '</li><li>');
echo $this->Form->input('Answer', array(
    'id' => 'answer',
    'name' => 'answer',
    'options' => array('Yes', 'No'),
    'type' => 'radio',
	'default' => 0,
	'separator' => '<br>'
));
?>

<textarea name="note" class="note" cols="40" rows="4" placeholder="Add your note here..."
style="background-color: #f6f6f6;
    border: none;
    color: #0d0d0d;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: block;
    font-size: 16px;
    margin: auto;
    width: 85%;
    border: 2px solid #f6f6f6;"
></textarea>
<!-- <button type="button" id="add-note">New Note</button> -->

</fieldset>
    </form>


  </div>
</div>
