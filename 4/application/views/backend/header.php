<!DOCTYPE html>
<html lang="en">
<title>
	<?php echo $title;?> - HQ</title>

<head>
	<link rel="shortcut icon" href="<?php echo base_url('assets').'/';?>img/favicon.png" type="image/png" />
	<link rel="stylesheet" href="<?php echo base_url('assets').'/';?>css/materialize.min.css">
	<link href="<?php echo base_url('assets').'/';?>css/jquery.fancybox.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets').'/';?>css/linearfonts.css">
	<link href="<?php echo base_url('assets').'/';?>css/style.css" rel="stylesheet">
	<link href="<?php echo base_url('assets').'/';?>css/range.css" rel="stylesheet">
<!--	<link href="<?php echo base_url('assets').'/';?>css/materialize.css" rel="stylesheet">-->
	<script src="<?php echo base_url('assets').'/';?>js/jquery.min.js"></script>
	<script src="<?php echo base_url('assets').'/';?>js/materialize.min.js"></script>
	<script src="<?php echo base_url('assets').'/';?>js/chintantable.js"></script>
	<script src="<?php echo base_url('assets').'/';?>js/jquery.fancybox.pack.js"></script>
	<script src="<?php echo base_url('assets').'/';?>tinymce/tinymce.min.js"></script>
	<script src="<?php echo base_url('assets').'/';?>js/formInit.js"></script>
	
	<script src="<?php echo base_url('assets').'/';?>js/lodash.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!--	 <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>" type="text/javascript"></script>-->
	 <script src="<?php echo base_url('assets/js/jquery.sparkline.js'); ?>" type="text/javascript"></script>
<!--
    <script src="<?php echo base_url('assets/js/easy-pie-chart.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/highchartsbyavi.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/highcharts-3dbyavi.js'); ?>"></script>
-->

       <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script>
        var admin_url="<?php echo base_url();?>";
    </script>

<!--
<script language=JavaScript>
var message="Function Disabled!";
function clickIE4(){
if (event.button==2){
return false;
}
}
function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
return false;
}
}
}
if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}
document.oncontextmenu=new Function("return false")
</script>
-->
</head>
<body>
	<header>
		<?php   $menus = $this->menu_model->viewmenus(); 	  ?>
			<ul id="slide-out" class="side-nav fixed">
				<li class="sub-menu logo">
					<a id="logo-container" href="<?php echo site_url(); ?>" class="align-center blue-text text-darken-4" style="font-size: 28px;">
<!--                        <img src="<?php echo base_url("assets/img/logo.png");?>" class="padt">-->
												 <img src="<?php echo base_url('uploads').'/'. $image=$this->menu_model->getimagebyid();?>" class="padt" height="100%">
					</a>
				</li>
				<?php
			foreach($menus as $row)
			{
				$pieces = explode("/", $row->url);
				$page2="";
				if(empty($pieces) || !isset($pieces[1]))
				{
					$page2="";
				}
				else
					$page2=$pieces[1];
				$submenus = $this->menu_model->getsubmenus($row->id);
				?>
					<li class="<?php if($page==$page2 ||  $page == strtolower($row->name)) { echo 'active'; } //echo $page2;
				if(count($submenus > 0))
				{
					$pages =  $this->menu_model->getpages($row->id);
					//echo $page2;
					//print_r($pages);
					echo ' sub-menu';
					if(in_array($page, $pages,TRUE))
						echo ' active';
				}
				?> ">
						<a class="waves-effect waves-default" href="<?php
					if($row->url == " ")
						echo "javascript:; ";
					else if($row->linktype == 1) echo site_url($row->url);
					else if($row->linktype == 2) echo base_url($row->url);
					else if($row->linktype == 3) echo ($row->url);
					?>" <?php if($row->linktype == 3) echo ""; ?>>
						<?php
						if($row->icon != "")
						{  ?>
							<i class="<?php echo $row->icon; ?>"></i>
				<?php	}
						?>
						<span><?php echo $row->name;  ?></span>
						<span class="arrow"></span>
					</a>
						<?php
					if(count($submenus) > 0)
					{  ?>
							<ul class="sub">
								<?php
							foreach($submenus as $row2)
							{
								$pieces2 = explode("/", $row2->url);

								if(empty($pieces2) || !isset($pieces2[1]))
								{
									$page3="";
								}
								else
									$page3=$pieces2[1];
							?>
									<li class="<?php if($page==$page3 || $page == strtolower($row2->name)) { echo 'active'; } ?> nopadding">
										<a class="waves-effect waves-default" href="<?php
										if($row2->url == " ")
											echo "javascript:; ";
										else if($row2->linktype == 1) echo site_url($row2->url);
										else if($row2->linktype == 2) echo base_url($row2->url);
										else if($row2->linktype == 3) echo ($row2->url);
									?>">
											<?php
										if($row2->icon != "")
										{  ?>
												<i class="<?php echo $row2->icon; ?>" <?php if($row2->linktype == 3) echo ""; ?>></i>
												<?php	}
										?>
													<?php echo $row2->name;  ?>
										</a>
									</li>
									<?php	}
							?>
							</ul>
							<?php	}
					?>
					</li>
					<?php }
			?>
			</ul>

		<nav class="text-center">
			<a href="#" data-activates="slide-out" class="button-collapse">
				<i class="material-icons">menu</i>
			</a>
			<img src="<?php echo base_url('assets').'/';?>img/top-icon.png" class="img-responsive"/>
			<div class="lightcolor">
				<a href="<?php echo site_url('login/logout'); ?>" class="btn-clear pull-right">
					<i class="material-icons">power_settings_new</i>
					Logout</a>
					<div class="clearfix"></div>
			</div>
		</nav>


	</header>
	<main>
		<div class="lightcolor">
      <?php echo $alerterror; ?>
		<?php if(isset($alertsuccess)) {
$alertsuccess = trim(preg_replace('/\s+/', ' ', $alertsuccess));
	?>
			<script>
				$(document).ready(function() {
					Materialize.toast("<?php echo $alertsuccess; ?>", 3000, 'green');
				});
			</script>
			<?php } ?>
				<?php if($this->input->get("alertsuccess") != "") {
$alertsuccess = trim(preg_replace('/\s+/', ' ', $this->input->get("alertsuccess")));
	?>
					<script>
						$(document).ready(function() {
							Materialize.toast("<?php echo $alertsuccess; ?>", 3000, 'green');
						});
					</script>
					<?php } ?>

						<?php if(isset($alerterror)) {

$alerterror = trim(preg_replace('/\s+/', ' ', $alerterror));
	?>
							<script>
								$(document).ready(function() {
									Materialize.toast("<?php echo $alerterror; ?>", 3000, 'red');
								});
							</script>
							<?php } ?>

								<?php if($this->input->get("alerterror") != "") {

$alerterror = trim(preg_replace('/\s+/', ' ', $this->input->get("alerterror")));
	?>
									<script>
										$(document).ready(function() {
											Materialize.toast("<?php echo $alerterror; ?>", 3000, 'red');
										});
									</script>
									<?php } ?>
