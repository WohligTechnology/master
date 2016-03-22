<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Wohlig">
  <title>HQ</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets').'/';?>img/favicon.png" type="image/png" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css"> -->

  <style>
    @font-face {
        font-family: "Walkway Rounded";
        src: url('<?php echo base_url('assets').'/';?>fonts/Walkwayrounded.ttf');
        font-style: normal;
    }
    body {
      font-family: 'Walkway Rounded';
      background-color: #F55069;
      -webkit-font-smoothing: antialiased;
    }
    .padding-top {
      padding-top: 10%;
    }
    .text-center {
      text-align: center;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
    }
    .row {
      display: flex;
    }
    .col {
      flex: 1;
    }
    .border-box {
      border: 1px solid #EEEC3B;
      border-radius: 5px;
      max-width: 300px;
      margin: 0 auto;
      padding: 30px 20px;
    }
    .input-box+.input-box {
      margin-top: 20px;
    }
    .input-box input {
      background-color: rgba(0, 0, 0, 0.35);
      border: none;
      width: 100%;
      box-sizing: border-box;
      padding: 6px 10px;
      outline: none;
      color: #EEEC3B;
      font-size: 14px;
    }
    .input-box label {
      color: #EEEC3B;
      letter-spacing: 2px;
      display: block;
      margin-bottom: 2px;
    }
    .custom-btn {
      border: 1px solid #EEEC3B;
      background-color: #F55069;
      color: #EEEC3B;
      border-radius: 2px;
      padding: 6px 30px;
      font-size: 14px;
      margin-top: 20px;
      cursor: pointer;
      outline: none;
      font-family: inherit;
      letter-spacing: 2px;
      box-shadow: -1px 1px 3px rgba(0, 0, 0, 0.35)
    }
    .custom-btn:hover {
      background-color: #DE3D56;
    }
    .logo {
      margin-bottom: 50px;
    }
    .logo img {
      width: 50%;
    }
    .guys {
      width: 75%;
      margin-left: 30px;
      max-width: 100%;
    }
    @media (max-width:480px) {

    }
  </style>

  <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="padding-top">
      <form method="post" action="<?php echo site_url('login/validate') ;?>">

        <div class="container">
          <div class="text-center logo">
            <img src="<?php echo base_url('assets').'/';?>img/logo-hq.png" alt="" />
          </div>
          <div class="row">
            <div class="col">
              <div class="border-box">

                <div class="input-box">
                  <label for="email">Email</label>
                  <input id="email" type="email" name="username">
                </div>

                <div class="input-box">
                  <label for="email">Password</label>
                  <input id="password" type="password" name="password">
                </div>
              </div>

              <div class="text-center">
                <button class="custom-btn">Login</button>
              </div>
            </div>
            <div class="col">
              <img src="<?php echo base_url('assets').'/';?>img/login-guys.png" alt="" class="guys"/>
            </div>
          </div>
        </div>

      </form>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>

</body>

</html>
<div class="lightcolor">
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
</div>
