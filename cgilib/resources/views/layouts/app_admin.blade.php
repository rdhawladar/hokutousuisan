<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>:: ホクトウ水産-Admin ::</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  

  <link href="{{ URL::asset('/ecm/dt/jquery.dataTables.min.css') }}" rel="stylesheet">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ URL::asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('/bower_components/font-awesome/css/font-awesome.min.css') }}">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::asset('/bower_components/Ionicons/css/ionicons.min.css') }}">
  
  
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('/assets/dist/css/AdminLTEAdmin.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('/assets/plugins/iCheck/square/blue.css') }}">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    body{
         background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)); /*url('http://xn--u9j926gj4ecxa32lwx8cf56a.com/assets/dist/img/tech.jpg');*/
            background-size:cover;
            background-repeat:none;
            overflow-x: hidden;
            overflow-y: hidden;
    }  
     
  </style>

</head>
<!-- <body class="hold-transition login-page" > -->
<body  >
    @yield('content')


	<!-- jQuery 3.1.1 -->
	<script src="{{ URL::asset('/assets/plugins/jQuery/jquery-3.1.1.min.js') }}"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{ URL::asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- iCheck -->
	<script src="{{ URL::asset('/assets/plugins/iCheck/icheck.min.js') }}"></script>
	<script>
	  $(function () {
		$('input').iCheck({
		  checkboxClass: 'icheckbox_square-blue',
		  radioClass: 'iradio_square-blue',
		  increaseArea: '20%' // optional
		});
	  });
	</script>

</body>
</html>
