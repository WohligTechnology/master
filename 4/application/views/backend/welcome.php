<div class="lightcolor welcome-set">
  <div class="welcome">
    <h4>WELCOME !</h4>
    <h3>Let's get started.</h3>
  </div>
<div class="row">
  <div class="col s12">
    <div class="welcome-img">
      <img src="<?php echo base_url('assets').'/';?>img/welcome.jpg" class="img-responsive"/>
    </div>
  </div>
</div>
  <div class="begin">
   <?php if($package==1 || $package==2){?>
    <a class="waves-effect waves-light btn blue darken-4 margall" href="<?php echo site_url("site/index"); ?>"><i class="icon-trash">
        <?php }else {?>
        <a class="waves-effect waves-light btn blue darken-4 margall" href="<?php echo site_url("json/viewfirstpage?id=1"); ?>"><i class="icon-trash">
        <?php }?>
    </i>Begin</a>
  </div>
</div>
