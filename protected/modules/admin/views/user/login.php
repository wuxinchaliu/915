<?php
    $this->pageTitle = yii::app()->name.'-后台登陆';
?>

<?php
/*
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class'=>'well'),
));
echo $form->textFieldRow($model, 'textField', array('class'=>'span3'));
echo $form->passwordFieldRow($model, 'password', array('class'=>'span3'));
echo $form->checkboxRow($model, 'checkbox');
echo $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'login'));
*/
?>
<div class="container">

    <form class="form-signin" role="form">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->
