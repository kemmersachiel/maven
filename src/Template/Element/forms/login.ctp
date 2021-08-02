<?php
/**
 * @var \App\View\AppView $this
 */
?>
<section class="mbr-section extForm cid-srcaaxyUF3">
   <div class="container">
        <div class="media-container-row">
            <div class="col-md-6 col-lg-6 block-content">
                <div class="form-block">
                    <div class="bg"></div>
                    <div class="form-wrap mbr-form form-with-styler">
<!--Start Login Form-->
    <?= $this->Form->create() ?>
<div class="dragArea form-row">
<div class="col-md-12">
<h4 class="mbr-fonts-style mb-4 mbr-fonts-style display-2">Log In</h4>
</div>
<div class="col-md-12 form-group ">
    <?= $this->Form->control('email', array('type' => 'email', 'placeholder' => 'Enter Your Email', 'class' => 'form-control input display-7', 'required' => true)); ?>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group">
    <?= $this->Form->control('password', array('type' => 'password', 'placeholder' => 'Enter Your Password', 'class' => 'form-control input display-7', 'required' => true)); ?>
</div>
<div class="col-md-12 input-group-btn mt-2">
    <?= $this->Form->submit('LOG IN', array('class' => 'button', 'class' => 'btn btn-sm btn-primary btn-form btn-bgr display-7')); ?>
</div>
</div>
<?= $this->Form->end(); ?>
<!--End Login Form-->
</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="text-block">
                    <h3 class="mbr-section-subtitle mbr-fonts-style mb-4 display-5">
                        Don't have an Acount?</h3>
                    <div class="mbr-section-btn mb-5">
                        <?= $this->Html->link('SIGN UP', '/users/register', ['class' => 'btn btn-sm btn-bgr btn-danger-outline display-4']); ?>
                    </div>
                </div>
                <p class="mb-4 mbr-fonts-style subtext display-4 pt-5">*We dont share your personal info with anyone. Check out our privacy policy for more information.</p>
            </div>
        </div>
    </div>
</section>