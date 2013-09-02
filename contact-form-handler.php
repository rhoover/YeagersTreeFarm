<?php 
$errors = '';
$myemail = 'john@yeagerstrees.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Mistake: all fields (Name, Email and Message) need to be filled in.";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Mistake: An invalid email address was somehow entered.";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact Form Submission From: $name";
	$email_body = "This email was sent to you from the website.".
	" Here are the details:\n \n Name: $name \n Email: $email_address \n Message: \n \n $message"; 
	
	// $headers = "From: $myemail\n";
    $headers = "From: $email_address\n";
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<html>
    
    <head>
        <title>Yeager's Tree Farm</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta http-equiv="cleartype" content="on">
        <meta name="description" content="Yeager's Tree Farm in Kimberton PA">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <!-- remove chrome after site has been bookmarked to home screen  -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <!-- Set a shorter title for iOS6 devices when saved to home screen -->
        <meta name="apple-mobile-web-app-title" content="Yeager's">

        <!-- because microsoft exists -->
        <meta name="msapplication-TileImage" content="images/apple-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#222222">

        <!-- Geo-Location Properties -->
        <meta name="geo.position" content="40.11545; -75.57973" />
        <meta name="geo.placename" content="1109 Western Road, Phoenixville, PA 19460" />
        <meta name="geo.region" content="US-PA" />
        <!-- End Geo-Location -->


        <!-- Facebook OpenGraph Meta Properties -->
        <meta property="og:title" content="Yeager's Tree Farm" />
        <meta property="og:image" content="images/yeager-logo-8.png" />
        <meta property="og:type" content="company"/>
        <meta property="og:url" content="http://www.yeagerstrees.com/"/>
        <meta property="og:site_name" content="Yeager's Tree Farm"/>
        <meta property="og:description" content="A Family Tradition of Cut Your Own Christmas Trees Since 1984"/>
        <meta property="og:street-address" content="1109 Western Road"/>
        <meta property="og:locality" content="Phoenixville"/>
        <meta property="og:region" content="PA"/>
        <meta property="og:postal-code" content="19460"/>
        <meta property="og:country-name" content="USA"/>
        <meta property="og:latitude" content="40.11545"/>
        <meta property="og:longitude" content="-75.57973"/>
        <meta property="og:email" content="john@yeagerstrees.com"/>
        <meta property="og:phone_number" content="610-933-7379"/>

        <link rel="canonical">

        <!-- icons -->
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/apple-touch-icon-57x57-precomposed.png">

        <!-- actually for android -->
        <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57-precomposed.png">

        <link rel="stylesheet" href="css/yeagers.css">
        <link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css'>
        <script src="js/vendor/Modernizr-2.6.2-Custom-Build.js"></script>
    </head>

<body>
<!-- This page is displayed only if there is some error -->

        <header class="topnav">
            <img id="logosmall" src="images/yeager-logo-8-small.png" alt="Yeager Logo" />
            <img id="logolarge" src="images/yeager-logo-8.png" alt="Yeager Logo" />
            <h1 id="branding">Yeager's Tree Farm</h1>
            <ul class="mainmenu">
                <li><a href="index.html">Home</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="treecare.html">Tree Care</a></li>
            </ul>
            <button type="button" id="mobilemenubutton">&#9776;</button>
        </header>

        <div class="hero">
            <img class="herosmall" src="images/yeagers_hero_sm.png" alt="Yeagers Trees Hero Image" />
            <img class="heromedium" src="images/yeagers_hero_med.png" alt="Yeagers Trees Hero Image" />
            <img class="herolarge" src="images/yeagers_hero.png" alt="Yeagers Trees Hero Image" />
        </div>

        <div class="contentwrapper">
            <div class="content">
                <div class="happyfaces">
                    <?php
                        echo "Uh-Oh. Something went wrong :(. Bummer.<br />Please Go Back and address the following mistakes:<br />";
                        echo nl2br($errors);
                    ?>
                </div>

                <div class="frontpageinfo">
                    <ul class="frontpagelist">
                        <li class="frontpagelistitem">
                            <div class="frontpagelistheader">
                                <img class="frontpagelistimg" src="images/icons/hours.png" height="45" width="45" />
                                <h2 class="heading">Hours</h2>
                            </div>
                            <p class="frontpagelisttext">Everyday after Thanksgiving, we are open:</p>
                            <br />
                            <p class="frontpagelisttext">From 9:00am to Dusk</p>
                        </li>
                        <li class="frontpagelistitem">
                            <div class="frontpagelistheader">
                                <img class="frontpagelistimg" src="images/icons/location.png" height="45" width="45" />
                                <h2 class="heading">Location</h2>
                            </div>
                            <p class="frontpagelisttext">1109 Western Road</p>
                            <p class="frontpagelisttext">Phoenixville, PA 19460</p>
                            <br />
                            <p class="pagelisttext">Our farm is located on <span class="bold">Western Road</span> 1/4 mile off Route 113</p>
                            <p class="pagelisttext">3 miles South of Phoenixville &<br />3 miles North of Chester Springs</p>
                            <p class="pagelisttext">Follow sign off Route 113</p>
                            <a class="frontpagelistanchor" href="locate.html">Explore Map</a>
                        </li>
                        <li class="frontpagelistitem">
                            <div class="frontpagelistheader">
                                <img class="frontpagelistimg" src="images/icons/trees.png" height="45" width="45" />
                                <h2 class="heading">Our Trees</h2>
                            </div>
                            <p class="frontpagelisttext">From our 10,000 trees you can choose from:</p>
                            <br />
                            <p class="frontpagelisttext">&there4; Douglas Fir</p>
                            <p class="frontpagelisttext">&there4; Fraser Fir</p>
                            <p class="frontpagelisttext">&there4; Blue Spruce</p>
                            <p class="frontpagelisttext">&there4; Norway Spruce</p>
                            <p class="frontpagelisttext">&there4; White Pine</p>
                            <br />
                            <p class="frontpagelisttext">to perfectly meet your holiday traditions!</p>
                            <a class="frontpagelistanchor" href="trees.html">Learn More</a>
                        </li>
                        <!-- <li class="frontpagelistitem">
                            <div class="frontpagelistheader">
                                <img class="frontpagelistimg" src="images/icons/products.png" height="45" width="45" />
                                <h2 class="heading">Accessories</h2>
                            </div>
                            <p class="frontpagelisttext">1109 Western Road</p>
                            <p class="frontpagelisttext">Phoenixville, PA 19460</p>
                            <p class="frontpagelisttext">Located between Phoenixville and Downingtown just off Route 113:</p>
                            <p class="frontpagelisttext">3 miles South of Phoenixville &<br />3 miles North of Chester Springs</p>
                            <a class="frontpagelistanchor" href="#">Learn More</a>
                        </li> -->
                        <li class="frontpagelistitem">
                            <div class="frontpagelistheader">
                                <img class="frontpagelistimg" src="images/icons/services.png" height="45" width="45" />
                                <h2 class="heading">Our Services</h2>
                            </div>
                            <p class="frontpagelisttext">Everything we have, ready and waiting, to create a family Cut Your Own Christmas Tree experience!</p>
                            <a class="frontpagelistanchor" href="services.html">Learn More</a>
                        </li>
                        <li class="frontpagelistitem">
                            <div class="frontpagelistheader">
                                <img class="frontpagelistimg" src="images/icons/wreath.png" height="45" width="45" />
                                <h2 class="heading">Our Traditions</h2>
                            </div>
                            <p class="frontpagelisttext">We have a great time celebrating family traditions along with you!</p>
                            <a class="frontpagelistanchor" href="traditions.html">Learn More</a>
                        </li>
                        <li class="frontpagelistitem">
                            <div class="frontpagelistheader">
                                <img class="frontpagelistimg" src="images/icons/facebook.png" height="45" width="45" />
                                <h2 class="heading">News and Fun</h2>
                            </div>
                            <p class="frontpagelisttext">We love talking up a storm! Visit our Facebook page.</p>
                            <a class="frontpagelistanchor" href="http://www.facebook.com/YeagersTrees" target="_blank">Visit</a>
                        </li>
                    </ul>
                </div> <!-- end frontpageinfo -->

            </div> <!-- end content -->

        </div> <!-- end contentwrapper -->
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
        <script src="js/buttontapping.js"></script>
        <script>
            var _gaq=[['_setAccount','UA-10949803-8'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>

        <footer>
            <p>&copy; Yeager's Tree Farm</p>
            <p class="small">Proud Members of the <a class="small" href="http://www.christmastrees.org/" target="_blank">PA Christmas Tree Growers Association</a></p>
            <p class="small">AgMap: <a class="small" href="http://agmap.psu.edu/" target="_blank">Promoting Agriculture Businesses</a></p>
        </footer>
</body>
</html>