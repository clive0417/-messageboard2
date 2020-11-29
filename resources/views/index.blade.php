<!DOCTYPE html>
<html lang="en" class="">
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<title>Metronic | #1 Selling Ultimate Bootstrap Admin Dashboard Theme</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="" name="Metronic Launcher" />
	<meta content="" name="KeenThemes" />

	<meta name="description"
		content="Metronic - #1 Selling Premium Bootstrap Admin Dashboard Theme of All Time. Build with Twitter Bootstrap, SASS, AngularJS, Material Design. Trusted By Tens of Thousands Users." />
	<link rel="canonical" href="http://keenthemes.com/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Premium Bootstrap Admin Themes" />
	<meta property="og:description"
		content="Metronic - #1 Selling Premium Bootstrap Admin Theme of All Time. Build with Twitter Bootstrap, SASS, AngularJS, Material Design. Trusted By Tens of Thousands Users." />
	<meta property="og:url" content="http://keenthemes.com/" />
	<meta property="og:site_name" content="Keenthemes" />
	<meta property="article:publisher" content="https://www.facebook.com/keenthemes" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:description"
		content="Metronic - #1 Selling Premium Bootstrap Admin Theme of All Time. Build with Twitter Bootstrap, SASS, AngularJS, Material Design. Trusted By Tens of Thousands Users." />
	<meta name="twitter:title" content="Premium Bootstrap Admin Themes" />
	<meta name="twitter:domain" content="Keenthemes" />

	<!--End of Zopim Live Chat Script-->
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:100,400,300,500,700' rel='stylesheet' type='text/css'>
	<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
	<link href="_start/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="_start/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="_start/style.css" rel="stylesheet" type="text/css" />
	<!-- END THEME STYLES -->
	<!--BEGIN for js CSRF -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--END for js CSRF -->
	<!--BEGIN App Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<!--ENDN App Scripts -->
	<!--BEGIN App css -->
	<link rel="stylesheet" href="/css/app.css">
	<!--END App css -->

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body>


	{{-- INPUT MESSAGE CRUD-->Create --}}
	<div class="col-md-10">
		<div class="portlet light form-fit bordered">
			<form method="post" action="{{'/messages'}}">
				<!--csrf 塞 session token 去跨過csrf -->
				@csrf
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-social-dribbble font-green"></i>
						<span class="caption-subject font-green bold uppercase">Leave a meassage</span>
					</div>
				</div>
				<div class="portlet-body form">

					<div class="mt-clipboard-container">
						<textarea id="mt-clipboard-paste" class="form-control" name="content" rows="4"></textarea>
					</div>
				</div>
				<div class="form-actions">
					<div class="row">
						<div class="col-md-offset-0 col-md-9">
							<button type="submit" class="btn green">
								<i class="fa fa-check"></i> Submit</button>
							<button type="button" class="btn default">Cancel</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	{{-- INPUT MESSAGE CRUD-->Read --}}
	@foreach ($messages as $key=> $message)
	<div class="col-md-6">
		<div class="portlet light form-fit bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-social-dribbble font-green"></i>
					<span class="caption-subject font-green bold uppercase">message-{{$key+1}}</span>
				</div>
				<div class="actions col-md-offset-9">
					{{-- <a class="btn btn-circle btn-icon-only btn-default" >
					<i class="icon-cloud-upload"  onclick="toggleUpdateForm(event)"> edit</i>
					</a> --}}
					<button class="btn test" onclick="toggleUpdateForm(event)">edit</button>

					<a class="btn btn-circle btn-icon-only btn-default">
						<i class="icon-trash" onclick="deleteMessage({{$message->id}})">delete</i>
					</a>
				</div>

			</div>
			<div class="portlet-body form">
				<div class="mt-clipboard-container">
					<p id="mt-target-3">
						{{$message->content}}
					</p>
					<div class="portlet-body form">
						<form action="/messages/{{$message->id}}" method="post">
							@csrf
							<input type="hidden" name="_method" value="put">
							<div class="form-body">
								<div class="form-group form-md-line-input form-md-floating-label">
									<label for="form_control_1">pls revise message</label>
									<textarea class="form-control" rows="3"
										name="content">{{$message->content}}</textarea>

								</div>

							</div>
							<div class="form-actions noborder">
								<button type="submit" class="btn blue">update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	<!-- BEGIN JAVASCRIPTS -->
	<!-- BEGIN CORE PLUGINS -->
	<script src="_start/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="_start/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="_start/plugins/jquery.youtube.js" type="text/javascript"></script>
	<script>
		$(document).ready(function(){
				$('[data-hint="tooltip"]').tooltip({
					container: 'body'
				})
			});
	</script>
</body>
<!-- END BODY -->

</html>