<?php 
	$user = $session->read('CurrentUser');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Code Review</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    	<script src="http://yandex.st/highlightjs/5.16/highlight.min.js"></script> 
		<link rel="stylesheet" href="http://yandex.st/highlightjs/5.16/styles/sunburst.min.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<script src="http://twitter.github.com/bootstrap/1.3.0/bootstrap-alerts.js"></script>
		<script src="<?php echo $html->url('/js/jquery.hotkeys.js')?>"></script>
		<script>hljs.initHighlightingOnLoad();</script>
    <!-- Le styles -->
	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.3.0/bootstrap.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
      }
	  .hero-unit h1 {
		margin-bottom: 20px !important;
	  }
	  .centerMass {
		text-align: center;
	  }
		.span-full-height { 
			height: 100%;
		}
		.span-full-height { 
			clear: both;
		}
    </style>
	<script>
		$(document).ready(function(){
			var save = function() {
				$('form').submit();
				
				return false;
			}
			$('input, textarea').bind('keydown', 'ctrl+s', save);
			$('input, textarea').bind('keydown', 'meta+s', save);
			$(document).bind('keydown', 'ctrl+s', save);
			$(document).bind('keydown', 'meta+s', save);			
				
			$(".alert-message").alert();		
						
		});
	</script>
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>

    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="<?php echo $html->url('/'); ?>">Code Review</a>
          <ul class="nav">
            <li<?php if ($this->name == "Snippets" && $this->action != "add") {?> class="active"<?php } ?>><a href="<?php echo $html->url('/')?>">Home</a></li>
			<li<?php if ($this->name == "Snippets" && $this->action == "add") {?> class="active"<?php } ?>><a href="<?php echo $html->url('/snippets/add/')?>">Add Snippet</a></li>
			<?php if  ($user !== NULL) { ?>
			<li<?php if ($this->name == "Accounts") {?> class="active"<?php } ?>><a href="<?php echo $html->url('/accounts/')?>">Account</a></li>
			<?php } ?>
          </ul>

			<p class="pull-right">
				<?php
				if ($user === NULL) {	
				?>
					<a href="<?php echo $html->url('/accounts/login'); ?>">Login using GitHub</a>.
				<?php } else { ?>
					You are logged in as <?php echo $user['Account']['username']; ?>, <a href="<?php echo $html->url('/accounts/logout/'); ?>">Logout</a>.
				<?php } ?>
			</p>
        </div>	
      </div>
    </div>
	
    <div class="container">
		
		<?php 
		echo $session->flash();
		  echo $content_for_layout?>


      <footer>
        <p>TBC</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>