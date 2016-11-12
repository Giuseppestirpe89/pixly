<?php
    include("includes/connect.php");
?>

<!DOCTYPE html>
<html>

<head>
	<link href="css/plan.css" rel="stylesheet" type="text/css" />
	<title> Pixly Pricing </title>
	<?php
        include("includes/head.php");
    ?>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<section class="section">
		<div class="section-headlines text-center">
			<h2>Pricing Plan</h2>
		</div>

		<div class="row-fluid">
			<div class="pricing-table row-fluid text-center">
				<!--
						FREE
					-->
				<div class="span6">
					<div class="plan">
						<div class="plan-name">
							<h2>Free</h2>
							<p class="muted">Cheaper than chips</p>
						</div>
						<div class="plan-price">
							<b>$0</b> / month
						</div>
						<div class="plan-details">
							<div>
								<b>Unlimited</b> photo uploads
							</div>
							<div>
								<b>Metrics</b> admin page
							</div>
							<div>
								<b>Events</b> create your own
							</div>
						</div>
						<div class="plan-action">
							<!--appends "free" to the url to be read by newUser.php-->
							<a href="profiles/newUser.php?free" class="btn btn-block btn-large">Choose Plan</a>
						</div>
					</div>
				</div>
				<!--
						PREMIUM
					-->
				<div class="span6">
					<div class="plan prefered">
						<div class="plan-name">
							<h2>Premium</h2>
							<p class="muted">Low cost but high value</p>
						</div>
						<div class="plan-price">
							<b>$39</b> / month
						</div>
						<div class="plan-details">
							<div>
								<b>Unlimited</b> photo uploads
							</div>
							<div>
								<b>Metrics</b> admin page
							</div>
							<div>
								<b>Events</b> create featured events
							</div>
						</div>
						<div class="plan-action">

							<!--appends "premium" to the url to be read by newUser.php-->
							<a href="profiles/newUser.php?premium" class="btn btn-success btn-block btn-large">Choose Plan</a>
						</div>
					</div>
				</div>

			</div>
			<p class="muted text-center">Note: You can change or cancel your plan at anytime just send us an email at info.pixly@gmail.com.</p>
		</div>
	</section>
</body>

</html>
