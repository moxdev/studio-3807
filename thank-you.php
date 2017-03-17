<?php

session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/studio-3807/inc/akismet.class.php';

// PREVENT DIRECT ACCESS TO THANK YOU PAGE
if ( !isset( $_POST['form-phone']) ) {
    echo 'This page cannot be accessed directly.';
    exit();
}

if ( empty( $_POST['form-first-name']) ) {
    echo 'You neglected to fill out required form fields.';
    exit();
}

// HIDDEN HONEYPOT
$spa = $_POST["spam"];

if (!empty($spa) && !($spa == "4" || $spa == "four")) {
    echo "We're sorry, but you appear to be a spambot";
    exit ();
}

if($_SERVER['REQUEST_METHOD']=="POST") {
    // $WordPressAPIKey = 'c32918c5e5bc';
    // $MyBlogURL = 'http://www.mm4solutions.com/';

    $recipients=$_POST["recipients"];
    // $to = str_replace("_AT_","@",$recipients);
    $to='shane@mm4solutions.com';

    $first_name=strip_tags($_POST["form-first-name"]);
    $last_name=strip_tags($_POST["form-last-name"]);
    $company=strip_tags($_POST["form-company"]);
    $phone=$_POST["form-phone"];
    $selected_value=$_POST["form-dropdown"];
    $comments=strip_tags($_POST["form-comments"]);

    $sbjct=strip_tags($_POST["subject"]);

    // $comment = array(
    //     'author' => $first_name . $last_name,
    //     'email' => $email,
    //     'website' => $MyBlogURL,
    //     'body' => $comments
    // );

    // $akismet = new Akismet($MyBlogURL, $WordPressAPIKey, $comment);

    $from="do-not-reply@studio-3807.com";
    $subject= "I would like to information on Studio 3807";
    $message="First Name: " . $first_name . "<br>" . "Last Name: " . $last_name . "<br>" . "Company: " . $company . "<br>" . "Phone: " . $phone . "<br>" . "Category: " . $selected_value . "<br>" . "Comments: " . $comments;
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
		<title>Thank You | Studio 3807</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div id="page">
			<header id="masthead">
				<div class="logo">
					<svg xmlns="http://www.w3.org/2000/svg" width="747.62" height="383.59" viewBox="0 0 747.62 383.59"><title>logo</title><path d="M468.14,154.06A111.61,111.61,0,0,0,411.9,362.11l28.82-52.24.06,0,3-5.47a46,46,0,1,1,44.4-80.6l24.91-45.15.06,0,6.59-11.94A111.66,111.66,0,0,0,468.14,154.06Z" fill="#fff"/><path d="M471.81,378.07a111.61,111.61,0,0,0,56.3-208l-28.84,52.23-.06,0-3,5.46a46,46,0,1,1-44.42,80.59l-24.92,45.14-.06,0-6.59,11.93A111.66,111.66,0,0,0,471.81,378.07Z" fill="#fff"/><polygon points="0 206.26 149.12 206.26 149.12 174.89 149.12 151.45 0 151.45 0 206.26" fill="#fff"/><polygon points="144.31 211.57 71.12 211.57 33.5 244.53 68.96 280.72 144.31 211.57" fill="#fff"/><polygon points="589 151.19 589 206 665.94 206 747.62 206 747.62 151.19 589 151.19" fill="#fff"/><polygon points="611.17 378.06 675.55 378.06 746.22 211.52 681.85 211.52 611.17 378.06" fill="#fff"/><path d="M260.5,297.35a75.84,75.84,0,1,0-75.84-75.84A75.84,75.84,0,0,0,260.5,297.35Zm0-97.28a21.44,21.44,0,1,1-21.44,21.44A21.44,21.44,0,0,1,260.5,200.07Z" fill="#fff"/><path d="M333.87,257a80.92,80.92,0,0,1-40.33,40.33,34,34,0,0,1-68.08-.48c0-.15,0-.3,0-.45A80.93,80.93,0,0,1,187.14,257a84.57,84.57,0,1,0,146.74,0Z" fill="#fff"/><path d="M122.74,239.11l-10.29,9.47L78.37,279.93a20.84,20.84,0,1,1-19.66,31.87H0a77.12,77.12,0,1,0,122.74-72.7Z" fill="#fff"/><path d="M22.46,89.57c-1.54-3.4.31-6,3.71-6.95l4.48-1.08c3.4-.77,5.25.46,6.95,3.71,3.86,6.64,12,11.89,22.85,11.89,13.9,0,22.39-6.79,22.39-16.06,0-8.18-6.79-13.28-15.6-16.52l-16.06-5.4c-20.38-6.79-25.33-19-25.33-29C25.86,11.43,42.22,0,60.91,0c17,0,29,8.18,34,20.38,1.39,3.4-.31,6-3.71,6.95l-3.86,1.24c-3.4.93-5.56-.31-7.1-3.55-3.55-7.1-10.19-10.5-19.15-10.5-10.19,0-18.69,5.56-18.69,15.13,0,4.48,1.39,10.35,13.74,15l16.06,6C90.4,56.36,98.74,68.41,98.74,80c0,19.46-15.44,31.5-38,31.5C41.61,111.49,28,102.23,22.46,89.57Z" fill="#fff"/><path d="M221,7.26V9.57c0,3.55-2,5.56-5.56,5.56H185.33v89.1c0,3.55-2,5.56-5.56,5.56h-5.09c-3.55,0-5.56-2-5.56-5.56V15.13H139c-3.4,0-5.56-2-5.56-5.56V7.26c0-3.55,2.16-5.56,5.56-5.56h76.44C219,1.7,221,3.71,221,7.26Z" fill="#fff"/><path d="M266,69.65V7.26c0-3.55,2.16-5.56,5.56-5.56h5.25c3.55,0,5.56,2,5.56,5.56V69.65c0,18.22,12.35,27.18,26.56,27.18,14.36,0,26.71-9,26.71-27.18V7.26c0-3.55,2-5.56,5.56-5.56h5.1c3.55,0,5.71,2,5.71,5.56V69.65c0,27.49-19.77,41.85-43.08,41.85C285.81,111.49,266,97.13,266,69.65Z" fill="#fff"/><path d="M407.58,104.24v-97c0-3.55,2-5.56,5.56-5.56h29.8c34.44,0,55.59,24.24,55.59,54s-21.16,54-55.59,54h-29.8C409.59,109.8,407.58,107.79,407.58,104.24Zm35.05-7.88c24.24,0,39.22-18.07,39.22-40.61s-15-40.61-39.22-40.61H423.95V96.36Z" fill="#fff"/><path d="M546.87,104.24v-97c0-3.55,2-5.56,5.56-5.56h5.25c3.55,0,5.56,2,5.56,5.56v97c0,3.55-2,5.56-5.56,5.56h-5.25C548.88,109.8,546.87,107.79,546.87,104.24Z" fill="#fff"/><path d="M615.89,55.75a56.21,56.21,0,1,1,56.21,55.75A55.92,55.92,0,0,1,615.89,55.75Zm95.74,0c0-23.32-17.76-41.08-39.53-41.08s-39.53,17.76-39.53,41.08,17.76,41.08,39.53,41.08S711.63,79.06,711.63,55.75Z" fill="#fff"/></svg>
				</div>
				<div class="social">
					<div class="callout">Opening Spring 2018</div>
					<div class="social-wrapper">
						<div class="email">
							<a href="mailto:info@studio3807.com">info@studio3807.com</a>
						</div>
						<div class="icons">
							<a class="instagram" href=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="36.17" height="36.17" viewBox="0 0 36.17 36.17"><defs><clipPath id="a" transform="translate(-665 -368.83)"><rect x="656" y="361.57" width="54.17" height="44.43" fill="none"/></clipPath></defs><title>instagram</title><g clip-path="url(#a)"><path d="M683.12,379.8a7,7,0,1,0,7.26,7,7.16,7.16,0,0,0-7.26-7m14,4.33H693.9a10.62,10.62,0,0,1,.46,3.1,11.25,11.25,0,0,1-22.49,0,10.58,10.58,0,0,1,.46-3.1H669v15.28a1.44,1.44,0,0,0,1.44,1.44h25.19a1.44,1.44,0,0,0,1.44-1.44Zm-5.73-11.28a1.63,1.63,0,0,0-1.63,1.63v3.9a1.63,1.63,0,0,0,1.63,1.63h4.09a1.63,1.63,0,0,0,1.63-1.63v-3.9a1.63,1.63,0,0,0-1.63-1.63Zm-21.71-4h26.89a4.53,4.53,0,0,1,4.64,4.64v26.89a4.53,4.53,0,0,1-4.64,4.64H669.64a4.53,4.53,0,0,1-4.64-4.64V373.47a4.53,4.53,0,0,1,4.64-4.64" transform="translate(-665 -368.83)" fill="#fff"/></g></svg></a>

							<a class="facebook" href=""><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="34.18" height="34.18" viewBox="0 0 34.18 34.18"><defs><clipPath id="a" transform="translate(0 0)"><rect width="34.18" height="34.18" fill="none"/></clipPath></defs><title>facebook</title><g clip-path="url(#a)"><path d="M0,0V34.18H18.2V21H13.75V15.59H18.2V11.06a6,6,0,0,1,6-6h4.65V9.95H25.49a1.89,1.89,0,0,0-1.89,1.89v3.75h5.14L28,21H23.59v13.2H34.18V0Z" transform="translate(0 0)" fill="#fff"/></g></svg></a>
						</div>
					</div>
				</div>
			</header>
			<main id="main">
				<article>
					<img src="imgs/studio3807-exterior.jpg" alt="Studio 3807 Exterior" class="highlight-img">
					<div class="article-content wrapper">
						<h1>Experience The Art of Living</h1>
						<ul>
							<li>Contemporary Studio, 1, 2 & 3 Bedroom Apartments</li>
							<li>Courtyard with Grills, Outdoor Entertainment Area & Seating</li>
							<li>Bike Share & Bike Storage On Site</li>
							<li>Retail Space, Artist Studios & Gallery</li>
							<li>Pet Friendly Community</li>
							<li>Expanding the vision of the Gateway Arts District and the Art Lives Here Movement</li>
						</ul>
					</div>
					<h2>Sustainable, Solar-Powered & Energy-Efficient Living</h2>
					<div class="pics">
						<div class="pic-wrap">
							<img src="imgs/courtyard.jpg" alt="Courtyard">
						</div>
						<div class="pic-wrap">
							<img src="imgs/lounge.jpg" alt="Lounge">
						</div>
						<div class="pic-wrap">
							<img src="imgs/exterior-2.jpg" alt="Exterior of Studio 3807">
						</div>
						<div class="pic-wrap">
							<img src="imgs/lobby.jpg" alt="Lobby">
						</div>
					</div>
					<aside id="secondary">
						<div class="wrapper">
							<div class="left-text">
								<p>For more information please fill out this form and we will be in touch shortly.</p>
							</div>
							<form action="thank-you.php" method="POST" name="form-contact" novalidate>
								<input type="hidden" name="recipients" value="don-not-reply@studio3807.com">
								<input type="hidden" name="subject" value="I would like to receive information about Studio 3807">

								<input class="flex" type="text" name="form-first-name" id="form-first-name" placeholder="First Name">
								<input class="flex" type="text" name="form-last-name" id="form-last-name" placeholder="Last Name">

								<input class="flex" type="text" name="form-company" id="form-company" placeholder="Company (for retail)">

								<input class="flex" type="tel" name="form-phone" id="form-phone" placeholder="Phone">

								<select class="form-margin form-dropdown">
									<option selected="default" disabled>I am interested in &#9660;</option>
									<option value="apartment">Apartments</option>
									<option value="retail">Retail Space</option>
									<option value="apart-retail">Both Apartments & Retail Space</option>
								</select>
								<textarea class="form-margin" name="form-comments" id="form-comments" cols="30" rows="3" placeholder="Comments"></textarea>

								<label class="honey" for="spam">What is three plus 2?</label>
								<input id="spam" class="honey" type="text" maxlength="4" size="4" name="spam">
								<div class="error-box"></div>
								<button type="submit">Tell Me More About Studio 3807!</button>
							</form>
						</div>
					</aside><!-- #secondary -->
				</article>
			</main><!-- #main -->
			<footer id="colophon">
				<div class="wrapper">
					<div class="contact-info" itemscope="" itemtype="http://schema.org/ApartmentComplex">
						<div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
							<span itemprop="streetAddress" class="ftr-address ftr-info">3807 Rhode Island Avenue</span><br>
							<span itemprop="addressLocality" class="ftr-contact">Brentwood,</span><span itemprop="addressRegion" class="ftr-contact"> MD</span> <span itemprop="postalCode" class="ftr-contact">20722</span>
						</div>
					</div>

					<div class="footer-callout">
						<h4>Developed by Landex Development</h4>
						<span><svg id="eho" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 181.47 173.4"><defs><style>#eho .cls-1{fill:#fff;fill-rule:evenodd;}</style></defs><title>eho</title><polygon class="cls-1" points="20.83 141.71 13.73 141.71 13.73 144.52 20.25 144.52 20.25 146.9 13.73 146.9 13.73 150.35 21.14 150.35 21.14 152.72 10.99 152.72 10.99 139.35 20.83 139.35 20.83 141.71 20.83 141.71"/><path class="cls-1" d="M30.84,149.09l1.34,1.26a3.25,3.25,0,0,1-1.51.36c-1.51,0-3.64-.93-3.64-4.67s2.13-4.67,3.64-4.67,3.63,0.93,3.63,4.67a6,6,0,0,1-.61,2.87l-1.42-1.32-1.44,1.5h0Zm6.32,3.09L35.7,150.8A7.5,7.5,0,0,0,37.1,146c0-6.28-4.66-7-6.43-7s-6.43.76-6.43,7,4.66,7,6.43,7a6.9,6.9,0,0,0,3.43-.9l1.59,1.51,1.47-1.51h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M50.25,148c0,3.51-2.13,5-5.5,5a5.72,5.72,0,0,1-4.25-1.62,4.87,4.87,0,0,1-1-3.24v-8.87h2.85V148c0,1.87,1.08,2.68,2.38,2.68,1.92,0,2.7-.93,2.7-2.55v-8.81h2.86V148h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M57.74,142.37h0l1.66,5.29H56l1.72-5.29h0ZM55.27,150h4.94l0.86,2.76h3L59.4,139.35H56.17L51.4,152.72h2.94L55.27,150h0Z" transform="translate(-1.03)"/><polygon class="cls-1" points="68.05 150.3 74.7 150.3 74.7 152.72 65.25 152.72 65.25 139.35 68.05 139.35 68.05 150.3 68.05 150.3"/><polygon class="cls-1" points="85.29 146.72 85.29 152.72 82.5 152.72 82.5 139.35 85.29 139.35 85.29 144.41 90.51 144.41 90.51 139.35 93.3 139.35 93.3 152.72 90.51 152.72 90.51 146.72 85.29 146.72 85.29 146.72"/><path class="cls-1" d="M99.66,146c0-3.74,2.13-4.67,3.63-4.67s3.64,0.93,3.64,4.67-2.13,4.67-3.64,4.67-3.63-.93-3.63-4.67h0Zm-2.79,0c0,6.28,4.66,7,6.42,7s6.43-.76,6.43-7-4.66-7-6.43-7-6.42.76-6.42,7h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M123.06,148c0,3.51-2.13,5-5.5,5a5.73,5.73,0,0,1-4.25-1.62,4.86,4.86,0,0,1-1-3.24v-8.87h2.85V148c0,1.87,1.08,2.68,2.39,2.68,1.92,0,2.7-.93,2.7-2.55v-8.81h2.85V148h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M128.18,148.6c0,0.74.4,2.16,2.84,2.16,1.32,0,2.8-.32,2.8-1.74,0-1-1-1.32-2.42-1.65L130,147c-2.17-.5-4.25-1-4.25-3.92,0-1.49.81-4.12,5.14-4.12,4.1,0,5.2,2.68,5.22,4.32h-2.69c-0.07-.59-0.3-2-2.74-2-1.06,0-2.33.39-2.33,1.6a1.45,1.45,0,0,0,1.41,1.39l3.26,0.8c1.83,0.45,3.5,1.2,3.5,3.6,0,4-4.1,4.38-5.27,4.38-4.88,0-5.72-2.81-5.72-4.47h2.68Z" transform="translate(-1.03)"/><polygon class="cls-1" points="140.54 152.72 137.76 152.72 137.76 139.35 140.54 139.35 140.54 152.72 140.54 152.72"/><polygon class="cls-1" points="151.71 139.35 154.31 139.35 154.31 152.72 151.52 152.72 146.06 143.18 146.02 143.18 146.02 152.72 143.41 152.72 143.41 139.35 146.35 139.35 151.66 148.66 151.71 148.66 151.71 139.35 151.71 139.35"/><path class="cls-1" d="M164.7,145.51h5.58v7.21h-1.86L168.14,151a4.94,4.94,0,0,1-4.17,2c-3.22,0-6.14-2.31-6.14-7,0-3.65,2-7.1,6.53-7.08,4.11,0,5.73,2.66,5.87,4.51h-2.79a2.94,2.94,0,0,0-2.92-2.2c-2,0-3.84,1.38-3.84,4.8,0,3.65,2,4.6,3.89,4.6a3.3,3.3,0,0,0,3.24-2.94H164.7v-2.25h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M14.23,166.36c0-3.74,2.12-4.68,3.63-4.68s3.63,0.93,3.63,4.68S19.36,171,17.86,171s-3.63-.94-3.63-4.68h0Zm-2.79,0c0,6.28,4.66,7,6.43,7s6.43-.77,6.43-7-4.66-7-6.43-7-6.43.76-6.43,7h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M31.94,165.91V162h2.22c1.73,0,2.46.55,2.46,1.85a1.82,1.82,0,0,1-2.09,2.08H31.94Zm0,2.31h3.2A4.1,4.1,0,0,0,39.4,164c0-2.62-1.56-4.28-4.15-4.28H29.15V173h2.79v-4.83h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M47,165.91V162H49.2c1.73,0,2.46.55,2.46,1.85a1.82,1.82,0,0,1-2.08,2.08H47Zm0,2.31h3.2A4.1,4.1,0,0,0,54.46,164c0-2.62-1.56-4.28-4.15-4.28H44.19V173H47v-4.83h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M61.45,166.36c0-3.74,2.12-4.68,3.63-4.68s3.63,0.93,3.63,4.68S66.58,171,65.08,171s-3.63-.94-3.63-4.68h0Zm-2.79,0c0,6.28,4.65,7,6.43,7s6.42-.77,6.42-7-4.66-7-6.42-7-6.43.76-6.43,7h0Z" transform="translate(-1.03)"/><path class="cls-1" d="M79.11,165.55V162h3.48a1.68,1.68,0,0,1,2,1.76c0,1.32-.7,1.83-2.16,1.83H79.11ZM76.36,173h2.75v-5.24H82c2.07,0,2.18.71,2.18,2.53a9,9,0,0,0,.29,2.7h3.09v-0.36C87,172.46,87,172,87,170c0-2.5-.6-2.91-1.69-3.4a3.19,3.19,0,0,0,2.06-3.18c0-1.16-.65-3.78-4.21-3.78H76.36V173h0Z" transform="translate(-1.03)"/><polygon class="cls-1" points="96.71 173.05 93.92 173.05 93.92 162.03 89.88 162.03 89.88 159.67 100.76 159.67 100.76 162.03 96.71 162.03 96.71 173.05 96.71 173.05"/><path class="cls-1" d="M116.78,168.36c0,3.52-2.12,5-5.5,5a5.75,5.75,0,0,1-4.24-1.63,4.83,4.83,0,0,1-1-3.24v-8.87h2.85v8.68c0,1.86,1.08,2.69,2.39,2.69,1.92,0,2.7-.94,2.7-2.56v-8.81h2.85v8.7h0Z" transform="translate(-1.03)"/><polygon class="cls-1" points="129.27 159.67 131.88 159.67 131.88 173.05 129.08 173.05 123.63 163.5 123.6 163.5 123.6 173.05 120.98 173.05 120.98 159.67 123.92 159.67 129.24 168.98 129.27 168.98 129.27 159.67 129.27 159.67"/><polygon class="cls-1" points="139.77 173.05 136.97 173.05 136.97 159.67 139.77 159.67 139.77 173.05 139.77 173.05"/><polygon class="cls-1" points="150.68 173.05 147.88 173.05 147.88 162.03 143.85 162.03 143.85 159.67 154.72 159.67 154.72 162.03 150.68 162.03 150.68 173.05 150.68 173.05"/><polygon class="cls-1" points="165.28 173.05 162.49 173.05 162.49 168 157.87 159.67 161.16 159.67 163.94 165.48 166.59 159.67 169.75 159.67 165.28 168.03 165.28 173.05 165.28 173.05"/><path class="cls-1" d="M91.09,0L1,44.36V65.19H11.11v62.5H170.4V65.19h12.1V44.36L91.09,0h0Zm59.82,108.87H30.6V51.75L91.09,20.84l59.82,30.91v57.12h0Z" transform="translate(-1.03)"/><polygon class="cls-1" points="117.61 71.91 61.83 71.91 61.83 51.75 117.61 51.75 117.61 71.91 117.61 71.91"/><polygon class="cls-1" points="117.61 100.82 61.83 100.82 61.83 80.65 117.61 80.65 117.61 100.82 117.61 100.82"/></svg>
					</div>

				</div>
			</footer>
		</div>
	</body>
</html>