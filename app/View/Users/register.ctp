<?php
echo $this->Html->css('bsform');

?>


<div class="wrapper fadeInDown users form">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <!-- <img src="./avatar.png" id="icon" alt="User Icon" /> -->
	  <h1>Register</h1>
	  <br>
    </div>

    <!-- Login Form -->
    <?php echo $this->Form->create('User') ?>
<fieldset>
      <!-- <input type="text" id="username" class="fadeIn second" name="username" placeholder="username">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password"> -->
	  <?php echo $this->Form->input('username', ['class' => 'second']); ?>
	  <?php echo $this->Form->input('email', ['class' => 'third', 'style' => 'background-color: #f6f6f6;
    border: none;
    color: #0d0d0d;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: block;
    font-size: 16px;
    margin: auto;
    width: 85%;
    border: 2px solid #f6f6f6;', ]); ?>
	  <?php echo $this->Form->input('password', ['class' => 'second', 'style' => 'background-color: #f6f6f6;
    border: none;
    color: #0d0d0d;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px;
    width: 85%;
	border: 2px solid #f6f6f6;']);

echo $this->Form->input('Admin', array('type' => 'checkbox',

));

?>

	  <?php echo $this->Form->end(__('Submit')); ?>
</fieldset>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="/SurveyManagement/cakephp/users/login">Already a member?</a>
    </div>

  </div>
</div>
