<?php
/**
 * The Contact template file.
 *
 * Template Name: Contact Page	 
 */
?>
<?php
  
  //response generation function

  $response = "";

  //function to generate response
  function generate_response($type, $message){
    
    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";
    
  }

  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $betreff = $_POST['message_betreff'];
  $tel = $_POST['message_tel'];
  $message = $_POST['message_text'];
  $human = $_POST['message_human'];
  $subjecto = $_REQUEST['ap_id'];

  //php mailer variables
  //$to = get_option('admin_email');
  $to = 'szabogabi@gmail.com';
  $subject = "Message from ".get_bloginfo('name');

  $headers = "From: " . strip_tags($email) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
  
if(!$human == 0){
    if($human != 2) generate_response("error", $not_human); //not human!
    else {
      
      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message) || empty($tel)){
          generate_response("error", $missing_content);
        }
        else //ready to go!
        {
        	$message='Name: '.$name.'<br/>'.'Tel: '.$tel.'<br />'.'Subject: '.$betreff.'<br />'.$message;
        	$sent = wp_mail($to, $subject, $message, $headers);
          	if($sent) generate_response("success", $message_sent); //message sent!
          	else generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  } 
  else 
  	if ($_POST['submitted']) generate_response("error", $missing_content);

?>
<div class="contact-wrap">
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
  <div id="respond" class="panel-invisible">
  <h1 class="block-title"><?php the_title(); ?></h1>
  <?php echo $response; ?>
  <form class="form-horizontal" action="<?php the_permalink(); ?>" method="post">

		<div class="controlsa">
				<label for="message_name">Name*</label>
        <input type="text" required placeholder="" id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>">
		</div>

    <div class="controlsa">
        <label for="message_tel">Telefonnummer</label>
        <input type="text" placeholder="" id="message_tel" name="message_tel" value="<?php echo $_POST['message_tel']; ?>">
    </div>

		<div class="controlsa">
      <label for="message_email">E-Mail Adresse*</label>
			<input type="email" required placeholder="" id="message_email" name="message_email" value="<?php echo $_POST['message_email']; ?>">
		</div>

    <div class="controlsa">
      <label for="message_email">Betreff*</label>
      <input type="text" required placeholder="" id="message_betreff" name="message_betreff" value="<?php echo $subjecto; ?>">
    </div>

		<div class="controlsa">
        <label for="message_text">Ihre Nachricht*</label>
				<textarea required placeholder="" rows="7" id="message_text" name="message_text" value="<?php echo $_POST['message_text']; ?>"></textarea>
		</div>

  	<div class="actions">
      <input type="hidden" name="ap_id" value="<?php echo $subjecto; ?>">
      <input type="hidden" name="message_human" value="2">
  		<input type="hidden" name="submitted" value="1">
  		<input type="submit" class="btn submitbtn" value="<?php _e('Senden','roots'); ?>">
      <br />
      <a href="tel:0800221101" class="btn phone"><span class="icon-phone"></span>Anrufen</a>
  	  <div class="oki">*Plichtfelder</div>
    </div>
  </form>
  </div><!-- /.panel-invisible -->

</article>
<?php endwhile; ?>
</div><!-- /.contact-wrap -->



