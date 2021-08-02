<?php
/**
 * @var \App\View\AppView $this
 */
?>
<section class="mbr-section extForm cid-srccAJF6mA">
   <div class="container">
        <div class="media-container-row">
            <div class="col-md-6 col-lg-6 block-content">
                <div class="form-block">
                    <div class="bg"></div>
                    <div class="form-wrap mbr-form form-with-styler">
<!--Start Registration Form-->
<?= $this->Form->create($user); ?>
<div class="dragArea form-row">
<div class="col-md-12">
<h4 class="mbr-fonts-style mb-4 mbr-fonts-style display-2">Please Register</h4>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group">
        <?= $this->Form->control('name', array('type' => 'text', 'placeholder' => 'Your Name', 'class' => 'form-control input display-7', 'required' => true)); ?>
</div>
<div class="col-md-12 form-group ">
        <?= $this->Form->control('email', array('type' => 'email', 'placeholder' => 'Your Email', 'class' => 'form-control input display-7', 'required' => true)); ?>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group">
        <?= $this->Form->control('password', array('type' => 'password', 'placeholder' => 'Your Password', 'class' => 'form-control input display-7', 'required' => true)); ?>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group">
        <?= $this->Form->control('confirmpassword', array('type' => 'password', 'placeholder' => 'Confirm Password', 'class' => 'form-control input display-7', 'required' => true)); ?>
</div>
<div class="col-md-12 input-group-btn mt-2">
        <?= $this->Form->submit('SIGN UP', array('class' => 'btn btn-sm btn-primary btn-form btn-bgr display-7')); ?>
</div>
</div>
</form>
<?= $this->Form->end(); ?>
<!--End Registration Form-->
</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="text-block">
                    <h3 class="mbr-section-subtitle mbr-fonts-style mb-4 display-5">
                        Already have an Acount?</h3>
                    <div class="mbr-section-btn mb-5">
                        <?= $this->Html->link('LOG IN', '/users/login', ['class' => 'btn btn-sm btn-bgr btn-danger-outline display-4']); ?>
                    </div>
                </div>
                <p class="mb-4 mbr-fonts-style subtext display-4 pt-5">*We dont share your personal info with anyone. Check out our privacy policy for more information.</p>
            </div>
        </div>
    </div>
</section>