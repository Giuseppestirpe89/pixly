<?php
    
    include("includes/connect.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="../css/plan.css" rel="stylesheet" type="text/css" />
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
						<div class="span4">
							<div class="plan">
								<div class="plan-name">
									<h2>Free</h2>
									<p class="muted">Perfect for small budget</p>
								</div>
								<div class="plan-price">
									<b>$0</b> / month
								</div>
								<div class="plan-details">
									<div>
										<b>Limited</b> Download
									</div>
									<div>
										<b>Free</b> Browsing
									</div>
									<div>
										<b>Limited</b> Warranty
									</div>
								</div>
								<div class="plan-action">
									<a href="#" class="btn btn-block btn-large">Choose Plan</a>
								</div>
							</div>
						</div>

						<div class="span4">
							<div class="plan prefered">
								<div class="plan-name">
									<h2>Preemium</h2>
									<p class="muted">Perfect for medium budget</p>
								</div>
								<div class="plan-price">
									<b>$39</b> / month
								</div>
								<div class="plan-details">
									<div>
										<b>Unlimited</b> Download
									</div>
									<div>
										<b>Free</b> Admin Page
									</div>
									<div>
										<b>Unlimited</b> Warranty
									</div>
								</div>
								<div class="plan-action">
									<a href="#" class="btn btn-success btn-block btn-large">Choose Plan</a>
								</div>
							</div>
						</div>

					</div>
					<p class="muted text-center">Note: You can change or cancel your plan at anytime just send us an email at info.pixly@gmail.com.</p>
				</div>
			</section>
    </body>
</html>