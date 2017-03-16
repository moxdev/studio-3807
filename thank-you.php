<?php

session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/embassy-tower/inc/akismet.class.php';

// PREVENT DIRECT ACCESS TO THANK YOU PAGE
if ( !isset( $_POST['form-email']) ) {
	echo 'This page cannot be accessed directly.';
	exit();
}

if ( empty( $_POST['form-email']) ) {
	echo 'You neglected to fill out required form fields.';
	exit();
}
	
// HIDDEN HONEYPOT
$spa = $_POST["spam"];
	
if (!empty($spa) && !($spa == "5" || $spa == "five")) {
	echo "We're sorry, but you appear to be a spambot";
    exit ();
}
	
if($_SERVER['REQUEST_METHOD']=="POST") {
	$WordPressAPIKey = 'c32918c5e5bc';
	$MyBlogURL = 'http://www.theflatsatshadygrove.com/';
	
	$recipients=$_POST["recipients"];
	$to = str_replace("_AT_","@",$recipients);
	//$to='chris@mm4solutions.com';
	
	$first_name=strip_tags($_POST["form-first-name"]);
	$last_name=strip_tags($_POST["form-last-name"]);
	$phone=$_POST["form-phone"];
	$email=strip_tags($_POST["form-email"]);
	$comments=strip_tags($_POST["form-comments"]);
	$sbjct=strip_tags($_POST["subject"]);
	
	$comment = array(
		'author' => $first_name,
		'email' => $email,
		'website' => $MyBlogURL,
		'body' => $comments
	);
	 
	$akismet = new Akismet($MyBlogURL, $WordPressAPIKey, $comment);
	
	$from="do-not-reply@embassyadmo.com";
	$subject=$sbjct;
	$message="First Name: " . $first_name . "<br>" . "Last Name: " . $last_name . "<br>" . "Phone: " . $phone . "<br>" . "Email: " . $email;
	$header='From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charser=iso-8859-1'."\r\n".'X-Mailer: PHP/'.phpversion();
	
	if ($akismet->isSpam()) {
		//-- THIS IS SPAM, YO!!!!!
		echo "We're sorry, but you appear to be a spambot";
		exit();
	} else {
		@mail($to,$subject,$message,$header);
	}
}
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Thank You | Embassy Tower</title>
		<link rel="stylesheet" href="/embassy-tower/css/style.css">
	</head>
	<body>
		<div id="page">
			<header id="masthead">
				<h1><a href="http://www.embassyadmo.com/"><span class="highlight">Embassy Tower</span> <span><small>Fully Renovated Historic Studio, One, and Two Bedroom Apartment Homes</small></span> <span class="top">Coming FALL 2016</span></a></h1>
				<a class="tel" href="tel:202.969.4143">Text or Call <br>202.969.4143</a>
			</header>
			<main id="main">
				<article>
					<img src="/embassy-tower/imgs/embassy-exterior-2.jpg" alt="Embassy Tower Exterior" class="highlight-img">
					<div class="article-content wrapper">
						<header>
							<h1>Thank You For Your Submittal</h1>
						</header>
						<p>A representative will contact you as soon as possible.</p>
					</div>
				</article>
			</main><!-- #main -->
			<footer id="colophon">
				<div class="wrapper">
					<div class="contact-info" itemscope="" itemtype="http://schema.org/ApartmentComplex">
						<strong><span itemprop="name" class="ftr-name ftr-info">Embassy Tower</span></strong>
						<div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
							<span itemprop="streetAddress" class="ftr-address ftr-info">1620 Fuller Street NW</span>,
							<span itemprop="addressLocality" class="ftr-contact">Washington</span>, <span itemprop="addressRegion" class="ftr-contact">DC</span> <span itemprop="postalCode" class="ftr-contact">20009</span>
						</div>
					</div>
					<img src="/embassy-tower/imgs/uip-logo.png" alt="UIP Property Management, Inc." id="brand-uip">
					<svg id="eho" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 181.47 173.4"><defs><style>#eho .cls-1{fill:#333;fill-rule:evenodd;}</style></defs><title>eho</title><polygon class="cls-1" points="20.83 141.71 13.73 141.71 13.73 144.52 20.25 144.52 20.25 146.9 13.73 146.9 13.73 150.35 21.14 150.35 21.14 152.72 10.99 152.72 10.99 139.35 20.83 139.35 20.83 141.71 20.83 141.71"/><path class="cls-1" d="M30.84,149.09l1.34,1.26a3.25,3.25,0,0,1-1.51.36c-1.51,0-3.64-.93-3.64-4.67s2.13-4.67,3.64-4.67,3.63,0.93,3.63,4.67a6,6,0,0,1-.61,2.87l-1.42-1.32-1.44,1.5h0Zm6.32,3.09L35.7,150.8A7.5,7.5,0,0,0,37.1,146c0-6.28-4.66-7-6.43-7s-6.43.76-6.43,7,4.66,7,6.43,7a6.9,6.9,0,0,0,3.43-.9l1.59,1.51,1.47-1.51h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M50.25,148c0,3.51-2.13,5-5.5,5a5.72,5.72,0,0,1-4.25-1.62,4.87,4.87,0,0,1-1-3.24v-8.87h2.85V148c0,1.87,1.08,2.68,2.38,2.68,1.92,0,2.7-.93,2.7-2.55v-8.81h2.86V148h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M57.74,142.37h0l1.66,5.29H56l1.72-5.29h0ZM55.27,150h4.94l0.86,2.76h3L59.4,139.35H56.17L51.4,152.72h2.94L55.27,150h0Z" transform="translate(-1.03)"/><polygon class="cls-1" points="68.05 150.3 74.7 150.3 74.7 152.72 65.25 152.72 65.25 139.35 68.05 139.35 68.05 150.3 68.05 150.3"/><polygon class="cls-1" points="85.29 146.72 85.29 152.72 82.5 152.72 82.5 139.35 85.29 139.35 85.29 144.41 90.51 144.41 90.51 139.35 93.3 139.35 93.3 152.72 90.51 152.72 90.51 146.72 85.29 146.72 85.29 146.72"/><path class="cls-1" d="M99.66,146c0-3.74,2.13-4.67,3.63-4.67s3.64,0.93,3.64,4.67-2.13,4.67-3.64,4.67-3.63-.93-3.63-4.67h0Zm-2.79,0c0,6.28,4.66,7,6.42,7s6.43-.76,6.43-7-4.66-7-6.43-7-6.42.76-6.42,7h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M123.06,148c0,3.51-2.13,5-5.5,5a5.73,5.73,0,0,1-4.25-1.62,4.86,4.86,0,0,1-1-3.24v-8.87h2.85V148c0,1.87,1.08,2.68,2.39,2.68,1.92,0,2.7-.93,2.7-2.55v-8.81h2.85V148h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M128.18,148.6c0,0.74.4,2.16,2.84,2.16,1.32,0,2.8-.32,2.8-1.74,0-1-1-1.32-2.42-1.65L130,147c-2.17-.5-4.25-1-4.25-3.92,0-1.49.81-4.12,5.14-4.12,4.1,0,5.2,2.68,5.22,4.32h-2.69c-0.07-.59-0.3-2-2.74-2-1.06,0-2.33.39-2.33,1.6a1.45,1.45,0,0,0,1.41,1.39l3.26,0.8c1.83,0.45,3.5,1.2,3.5,3.6,0,4-4.1,4.38-5.27,4.38-4.88,0-5.72-2.81-5.72-4.47h2.68Z" transform="translate(-1.03)"/><polygon class="cls-1" points="140.54 152.72 137.76 152.72 137.76 139.35 140.54 139.35 140.54 152.72 140.54 152.72"/><polygon class="cls-1" points="151.71 139.35 154.31 139.35 154.31 152.72 151.52 152.72 146.06 143.18 146.02 143.18 146.02 152.72 143.41 152.72 143.41 139.35 146.35 139.35 151.66 148.66 151.71 148.66 151.71 139.35 151.71 139.35"/><path class="cls-1" d="M164.7,145.51h5.58v7.21h-1.86L168.14,151a4.94,4.94,0,0,1-4.17,2c-3.22,0-6.14-2.31-6.14-7,0-3.65,2-7.1,6.53-7.08,4.11,0,5.73,2.66,5.87,4.51h-2.79a2.94,2.94,0,0,0-2.92-2.2c-2,0-3.84,1.38-3.84,4.8,0,3.65,2,4.6,3.89,4.6a3.3,3.3,0,0,0,3.24-2.94H164.7v-2.25h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M14.23,166.36c0-3.74,2.12-4.68,3.63-4.68s3.63,0.93,3.63,4.68S19.36,171,17.86,171s-3.63-.94-3.63-4.68h0Zm-2.79,0c0,6.28,4.66,7,6.43,7s6.43-.77,6.43-7-4.66-7-6.43-7-6.43.76-6.43,7h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M31.94,165.91V162h2.22c1.73,0,2.46.55,2.46,1.85a1.82,1.82,0,0,1-2.09,2.08H31.94Zm0,2.31h3.2A4.1,4.1,0,0,0,39.4,164c0-2.62-1.56-4.28-4.15-4.28H29.15V173h2.79v-4.83h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M47,165.91V162H49.2c1.73,0,2.46.55,2.46,1.85a1.82,1.82,0,0,1-2.08,2.08H47Zm0,2.31h3.2A4.1,4.1,0,0,0,54.46,164c0-2.62-1.56-4.28-4.15-4.28H44.19V173H47v-4.83h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M61.45,166.36c0-3.74,2.12-4.68,3.63-4.68s3.63,0.93,3.63,4.68S66.58,171,65.08,171s-3.63-.94-3.63-4.68h0Zm-2.79,0c0,6.28,4.65,7,6.43,7s6.42-.77,6.42-7-4.66-7-6.42-7-6.43.76-6.43,7h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M79.11,165.55V162h3.48a1.68,1.68,0,0,1,2,1.76c0,1.32-.7,1.83-2.16,1.83H79.11ZM76.36,173h2.75v-5.24H82c2.07,0,2.18.71,2.18,2.53a9,9,0,0,0,.29,2.7h3.09v-0.36C87,172.46,87,172,87,170c0-2.5-.6-2.91-1.69-3.4a3.19,3.19,0,0,0,2.06-3.18c0-1.16-.65-3.78-4.21-3.78H76.36V173h0Z" transform="translate(-1.03)"/><polygon class="cls-1" points="96.71 173.05 93.92 173.05 93.92 162.03 89.88 162.03 89.88 159.67 100.76 159.67 100.76 162.03 96.71 162.03 96.71 173.05 96.71 173.05"/><path class="cls-1" d="M116.78,168.36c0,3.52-2.12,5-5.5,5a5.75,5.75,0,0,1-4.24-1.63,4.83,4.83,0,0,1-1-3.24v-8.87h2.85v8.68c0,1.86,1.08,2.69,2.39,2.69,1.92,0,2.7-.94,2.7-2.56v-8.81h2.85v8.7h0Z" transform="translate(-1.03)"/><polygon class="cls-1" points="129.27 159.67 131.88 159.67 131.88 173.05 129.08 173.05 123.63 163.5 123.6 163.5 123.6 173.05 120.98 173.05 120.98 159.67 123.92 159.67 129.24 168.98 129.27 168.98 129.27 159.67 129.27 159.67"/><polygon class="cls-1" points="139.77 173.05 136.97 173.05 136.97 159.67 139.77 159.67 139.77 173.05 139.77 173.05"/><polygon class="cls-1" points="150.68 173.05 147.88 173.05 147.88 162.03 143.85 162.03 143.85 159.67 154.72 159.67 154.72 162.03 150.68 162.03 150.68 173.05 150.68 173.05"/><polygon class="cls-1" points="165.28 173.05 162.49 173.05 162.49 168 157.87 159.67 161.16 159.67 163.94 165.48 166.59 159.67 169.75 159.67 165.28 168.03 165.28 173.05 165.28 173.05"/><path class="cls-1" d="M91.09,0L1,44.36V65.19H11.11v62.5H170.4V65.19h12.1V44.36L91.09,0h0Zm59.82,108.87H30.6V51.75L91.09,20.84l59.82,30.91v57.12h0Z" transform="translate(-1.03)"/><polygon class="cls-1" points="117.61 71.91 61.83 71.91 61.83 51.75 117.61 51.75 117.61 71.91 117.61 71.91"/><polygon class="cls-1" points="117.61 100.82 61.83 100.82 61.83 80.65 117.61 80.65 117.61 100.82 117.61 100.82"/></svg>
				</div>
			</footer>
		</div>
	</body>
</html>