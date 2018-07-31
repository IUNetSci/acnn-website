<?php
// die("test");

// error_reporting(E_ALL);

function get_emails()
{
	$email_addresses = array(

		"gonzo@umich.edu",
		"dinov@umich.edu",
		"leiwang1@northwestern.edu",
		"panda@cse.ohio-state.edu",
		"satya.sahoo@case.edu",
		"frakkopesto@gmail.com",
		"jackjean@umich.edu",


		"bserrett@iu.edu",
	);

	return implode(", ", $email_addresses);
}


// $captcha_forms = array(
//     "general_contact"
// );



// if(in_array($this_form, $captcha_forms) )
// {

//     if(!isset($_POST["g-recaptcha-response"]))
//     {
//         die("There was a problem.  You may be a bot.  Please go back and try again.");
//     }

//     $ch = curl_init();
//     $captcha = $_POST["g-recaptcha-response"];
//     $opts = "secret=6LdmbkYUAAAAAMbGCig6Ldzgm5aCrmtHcAIjQX9a&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR'];
//     curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
//     curl_setopt($ch, CURLOPT_POST, 1);
//     curl_setopt($ch, CURLOPT_POSTFIELDS,
//                 $opts);

//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $server_output = curl_exec ($ch);
//     curl_close ($ch);

//     $obj = json_decode($server_output);

//     if($obj->success == true)
//     {
//         //passes test
//     }
//     else
//     {
//         //error handling
//     	die("There was a problem.  You may be a bot.  Please go back and try again.");
//     }
// }


if(!empty($_POST))
{

	

	// ######                            #######
	// #     # #    # # #      #####     #       #    #   ##   # #
	// #     # #    # # #      #    #    #       ##  ##  #  #  # #
	// ######  #    # # #      #    #    #####   # ## # #    # # #
	// #     # #    # # #      #    #    #       #    # ###### # #
	// #     # #    # # #      #    #    #       #    # #    # # #
	// ######   ####  # ###### #####     ####### #    # #    # # ######

	$form_title = "ACNN Affiliate Request";
	

	$subject = $form_title . " Submission"  . " " . date("r");
	$random_hash = md5(date('r', time()));
	$headers = "From: ACNN Affiliate Form Submission <noreply@networkneuroscience.org>";
	// $headers .= "\r\nContent-Type: multipart/mixed; boundary=PHP-mixed-".$random_hash."";

	$body_text = "";
	$body_text .= "*" . $form_title . "* \n\n";

	foreach($_POST as $name => $value)
	{
		if($name == "form_name" || $name == "g-recaptcha-response")
		{
			continue;
		}
		if(!is_array($value))
		{
			$body_text .= "\n  " . str_replace("_", " ", $name) . ":\n";
			$body_text .= $value . "\n";
		}
		else
		{
			$body_text .= "\n" . str_replace("_", " ", $name) . ":\n";
			foreach($value as $name2 => $value2)
			{
				$body_text .= "    " . str_replace("_", " ", $name2) . ":  ";
				if(!is_array($value2))
				{
					$body_text .= $value2 . "\n";
				}
				else
				{
					foreach($value2 as $name3 => $value3)
					{
						$body_text .= "\n      " . str_replace("_", " ", $name3) . ":  ";
						$body_text .= $value3 . "";
					}
					$body_text .= "\n";
				}
			}
		}
	}

	// if(count($_FILES))
	// {

	// 	$body_text .="\n\n Attachments:\n";
	// 	foreach($_FILES as $k => $v)
	// 	{
	// 		if($v["name"] == "")
	// 		{
	// 			continue;
	// 		}
	// 		$pinfo = pathinfo($v["name"]);
	// 		$ext = strtolower($pinfo['extension']);
	// 		if($v["error"] || !($ext == "pdf" || $ext == "doc" || $ext == "docx" || $ext == "png" || $ext == "jpg" || $ext == "jpeg"))
	// 		{
	// 			$body_text .= "INVALID: ";
	// 		}

	// 		$body_text .= $v["name"] . "\n";
	// 	}
	// }

	$body_text = str_replace("<", "&lt;", $body_text);

	//ob_start();
	$message = "";
	// $message .= "--PHP-mixed-".$random_hash."\r\n";
	// $message .= "Content-Type: multipart/alternative; boundary=PHP-alt-". $random_hash ."\r\n";
	// $message .= "\r\n";
	// $message .= "--PHP-alt-".$random_hash."\r\n";
	// $message .= "Content-Type: text/plain; charset=utf-8\r\n";
	// $message .= "Content-Transfer-Encoding: 7bit\r\n";
	// $message .= "\r\n";
	$message .= "".$body_text."\r\n";
	$message .= "\r\n";
	// $message .= "--PHP-alt-". $random_hash."\r\n";
	// $message .= "Content-Type: text/html; charset=utf-8\r\n";
	// $message .= "Content-Transfer-Encoding: 7bit\r\n";
	// $message .= "\r\n";
	// $message .=  str_replace("  ", "&nbsp;&nbsp;&nbsp;", nl2br($body_text)) ."\r\n";
	// $message .= "\r\n";
	// $message .= "--PHP-alt-". $random_hash."--\r\n";

	// foreach($_FILES as $k => $v)
	// {
	// 	$finfo = finfo_open(FILEINFO_MIME_TYPE);
	// 	if(empty($v["tmp_name"]) || $v["error"])
	// 	{
	// 		continue;
	// 	}
	// 	$type = finfo_file($finfo, $v["tmp_name"] );

	// 	finfo_close($finfo);
	// 	$pinfo = pathinfo($v["name"]);
	// 	$ext = strtolower($pinfo['extension']);
	// 	if(!($ext == "pdf" || $ext == "doc" || $ext == "docx" || $ext == "png" || $ext == "jpg" || $ext == "jpeg"))
	// 	{
	// 		continue;
	// 	}


	// 	$message .= "\r\n";
	// 	$message .= "--PHP-mixed-". $random_hash . "\r\n";
	// 	$message .= "Content-Type: ". $type . "\r\n";
	// 	$message .= "Content-Transfer-Encoding: base64\r\n";
	// 	$message .= "Content-Disposition: attachment; filename=" . $v["name"] . "\r\n";
	// 	$message .= "\r\n";
	// 	$message .= chunk_split(base64_encode(file_get_contents($v["tmp_name"]))) . "\r\n";

	// }

	// $message .= "\r\n";
	// $message .= "--PHP-mixed-". $random_hash."--\r\n";
	// $message .= "\r\n";



	//   #####                          #######
	//  #     # ###### #    # #####     #       #    #   ##   # #       ####
	//  #       #      ##   # #    #    #       ##  ##  #  #  # #      #
	//   #####  #####  # #  # #    #    #####   # ## # #    # # #       ####
	// 	      # #      #  # # #    #    #       #    # ###### # #           #
	//  #     # #      #   ## #    #    #       #    # #    # # #      #    #
	//   #####  ###### #    # #####     ####### #    # #    # # ######  ####


	// $to = "bserrett@iu.edu";


	$mail_sent = @mail(get_emails(), $subject, $message, $headers);


	// mail("bserrett@iu.edu", "TEST from IUNI FORM", $message);

	// $alternate_emails = get_emails();
	// if($alternate_emails)
	// {
	// 	$alt_mail_sent = @mail($alternate_emails, $subject, $message, $headers);
	// }


	//Also, send to requestors:
	// if(isset($_POST["Requestor_Email"]))
	// {
	// 	$email_parts = explode('@', $_POST["Requestor_Email"]);

	// 	if(in_array($this_form, $internal_forms) && !empty($_POST["Requestor_Email"]))
	// 	{
	// 		$requestor_mail = @mail($_POST["Requestor_Email"], "IUNI Form Confirmation: " . $subject, $message, $headers);
	// 	}
	// 	else if( in_array( strtolower(array_pop($email_parts)), $indiana_domains )  && !empty($_POST["Requestor_Email"]))
	// 	{
	// 		$requestor_mail = @mail($_POST["Requestor_Email"], "IUNI Form Confirmation: " . $subject, $message, $headers);
	// 	}
	// 	else if( !in_array( strtolower(array_pop($email_parts)), $indiana_domains )  && !empty($_POST["Requestor_Email"]))
	// 	{
	// 		$requestor_mail = @mail($_POST["Requestor_Email"], "IUNI Form Confirmation: " . $subject,
	// 		"A submission from this email address has been made to the form at https://iuni.iu.edu/forms/f/form/" . $this_form . " .  \n\nYour request will be reviewed by The Indiana University Network Science Institute and you will be contacted regarding your submission within 3 business days.\n \n Sincerely, \n \n The IUNI Staff.", "From: IUNI Staff <iuniform+" . $this_form . "@iu.edu>"
	// 		);
	// 	}
	// }
	// }


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ACNN Affiliate Form Processing</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets-main/css/styles.css?v=5" type="text/css" />
</head>

<body>
<nav class="navbar navbar-full navbar-dark bg-inverse">
		<div class="container">
			<a class="navbar-brand" href="/#top">ACNN</a>
			<button class="navbar-toggler hidden-md-up" type="button"
				data-toggle="collapse" data-target="#main_navbar"
				aria-controls="main_navbar" aria-expanded="false"
				aria-label="Toggle navigation"></button>
			
		</div>
	</nav>
	<header class="mb-5">
		<a href="/">
		<h1 class="text-xs-center col-xs-8 offset-xs-2 text-white" style="color: white;">
			Advanced
				Computational Neuroscience Network (ACNN) Spoke
			</h1>
		</a>
	</header>
<div class="container">
<section>
<?


	if($mail_sent)
	{
		// require("./success.php");
		?>
		<div class="alert alert-success">
			<div class="card-block"><div class="card-text">
				<i class="fa fa-check" aria-hidden="true"></i>
				Submission Successful
			</div></div>
		</div>

		<p>We will redirect you back to the ACNN Homepage shortly.</p>
		<p><span id="timeout">5</span> seconds</p>
		<script>
			var timer = 5;
			var timeout_element = document.getElementById("timeout");
			setInterval(function(){
				timer -= 1
				timeout_element.innerHTML = timer;
			}, 1000)

			var timerout = setTimeout(function(){
				location.href="http://neurosciencenetwork.org/";
			}, 5000);
		</script>
			<?php

	}
	else
	{
		?>
		<div class="alert alert-danger">
			<div class="card-block"><div class="card-text">
				<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
				Submission Failed.  Please go back and try again.
			</div></div>
		</div>
		<?php
		// var_dump($mail_sent);
		// die();
		// require("./failure.php");
		// require("./form_layout.php");
	}

	?>
	<br />
	<?php echo nl2br($body_text) ?>
</section>
</div>
	
	</body>
	</html>
	<?php

	

}
else
{
	die("Unable to process form.  Your session may have timed out.  Please go back and try to submit again.");
}

?>

