<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Snapshot Check In</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.3.0/bootstrap.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
      }
	  .hero-unit h1 {
		margin-bottom: 20px !important;
	  }
    </style>

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
          <a class="brand" href="#">Code Review</a>
          <ul class="nav">
            <li class="active"><a href="<?php echo $html->url('/')?>">Home</a></li>
			<li><a href="<?php echo $html->url('/snippets/add')?>">Add Snippet</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container">

		<?php echo $content_for_layout?>


      <footer>
        <p>TBC</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>