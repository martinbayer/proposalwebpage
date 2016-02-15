<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ Session::token() }}">

<title>{{{ $decision_question }}}</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

<!-- Custom Fonts -->
<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
	rel='stylesheet' type='text/css'>
<link
	href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
	rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"
	type="text/css">

<!-- Plugin CSS -->
<link rel="stylesheet" href="css/animate.min.css" type="text/css">

<!-- Custom CSS -->
<link rel="stylesheet" href="css/creative.css" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">
	<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
<!-- 			<div class="navbar-header"> -->
<!-- 				<button type="button" class="navbar-toggle collapsed" -->
<!-- 					data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> -->
<!-- 					<span class="sr-only">Toggle navigation</span> <span -->
<!-- 						class="icon-bar"></span> <span class="icon-bar"></span> <span -->
<!-- 						class="icon-bar"></span> -->
<!-- 				</button> -->
<!-- 				<a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a> -->
<!-- 			</div> -->

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a class="page-scroll" href="#advantages">{{{ $advantages }}}</a>
					</li>
					<li><a class="page-scroll" href="#disadvantages">{{{ $disadvantages
							}}}</a></li>
					<li><a class="page-scroll" href="#decision">{{{ $decision }}}</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

	<header>
		<div class="header-content">
			<div class="header-content-inner">
				<h1>{{{ $page1_title }}}</h1>
				<hr>
				<p>{{{ $page1_subtitle }}}</p>
				<a href="#advantages" class="btn btn-primary btn-xl page-scroll">{{{
					$check_advantages }}}</a>
			</div>
		</div>
	</header>

	<section class="bg-primary" id="advantages">
		<div class="container">
			<div class="row content">
				<div class="col-lg-8 col-lg-offset-2 text-center">
					<h2 class="section-heading">{{{ $advantages }}}</h2>
					<hr class="light">
					<p class="">{{{ $advantages_subtitle }}}</p>
					<div>
						<ul class="list-group">
							@foreach ($advantageslist as $advantageitem)
							<li class="list-group-item">{{ $advantageitem }}</li> @endforeach
						</ul>
					</div>
					<br> <a href="#disadvantages"
						class="btn btn-default btn-xl page-scroll">{{{
						$advantages_nextpage }}}</a>
				</div>
			</div>
		</div>
	</section>

	<section class="bg-primary" id="disadvantages">
		<div class="container">
			<div class="row content">
				<div class="col-lg-8 col-lg-offset-2 text-center">
					<h2 class="section-heading">{{{ $disadvantages }}}</h2>
					<hr class="light">
					<p class="">{{{ $disadvantages_subtitle }}}</p>
					<div>
						<ul class="list-group">
							@foreach ($disadvantageslist as $disadvantageitem)
							<li class="list-group-item">{{ $disadvantageitem }}</li>
							@endforeach
						</ul>
					</div>
					<br> <a href="#decision" class="btn btn-default btn-xl page-scroll">{{{
						$disadvantages_nextpage }}}</a>
				</div>
			</div>
		</div>
	</section>

	<section class="bg-primary" id="decision">
		<div class="container">
			<div class="row content-box">
				<div class="col-lg-8 col-lg-offset-2 text-center">
					<h2 class="section-heading">{{{ $decision_title }}}</h2>
					<hr class="light">
					<p class="text-faded">{{{ $decision_text }}}</p>
					<button id="decision-button-id" type="button"
						class="btn btn-default btn-lg btn-block">{{{ $decision_question
						}}} (Vyprodáno)</button>
					<div id="answerButtons">
						<button type="button" class="decision-button-yes btn btn-primary">{{{
							$decision_yes }}}</button>
						<button id="decision-button-no" type="button"
							class="btn btn-default">{{{ $decision_no }}}</button>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- modal dialog -->
	<div id="congratsModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">{{{ $congrats_title }}}</h4>
				</div>
				<div class="modal-body">
					<p>{{{ $congrats_text }}}</p>
					<img style="width: 250px" src="/img/wedding-rings.png" />
					<div style="font-size: 20px" class="alert alert-danger" role="alert">
  						<strong>{{{ $congrats_text_checkemail }}}</strong>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	
	<div id="unbelievableModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">{{{ $unbelievablemodal_title }}}</h4>
				</div>
				<div class="modal-body">
					<p id="unbelievableModalTextId"></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/jquery.fittext.js"></script>
	<script src="js/wow.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="js/creative.js"></script>
	<script src="js/willumarryme.js"></script>
	<script type="text/javascript">
	   var BASEURL = '{{{ URL::to('/') }}}'
	</script>
</body>

</html>
