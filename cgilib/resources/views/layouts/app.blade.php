<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" >
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>:: ホクトウ水産 ::</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ URL::asset('/bower_components/bootstrap/dist/css/bootstrap2.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('/bower_components/font-awesome/css/font-awesome.min.css') }}">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::asset('/bower_components/Ionicons/css/ionicons.min.css') }}">
  
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('/assets/dist/css/AdminLTELogin.min.css') }}">
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
   <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet" />
    <style>
        body{
             /*background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('http://sbkmart.com/v2/assets/dist/img/movie_bg_new.png');*/
            background:  #ddd;
            background-position: 0% 50%;
            background-size: 100% 100%;
            /*height: 100%;*/  display: initial;
            /*background-position: 100% 100%;
            background-size: cover;   */
            overflow-x: hidden;
            overflow-y: hidden;
            /*width: 100%;
            height: 100%;*/
        }
        @media (max-width:676px){
          body{
            background:  #ddd;
            background-position: 0% 50%;
            background-size: 100% 100%;
            /*height: 100%;*/  display: initial;
            /*background-position: 100% 100%;
            background-size: cover;   */
            overflow-x: hidden;
            overflow-y: hidden;
            /*width: 100%;
            height: 100%;*/
          }
        }

        @media (max-height: 360px){
          body{
      background:  #ddd;
            background-position: 0% 50%;
            background-size: 100% 100%;
            /*height: 100%;*/  display: initial;
            /*background-position: 100% 100%;
            background-size: cover;   */
            overflow-x: hidden;
            overflow-y: hidden;
            /*width: 100%;
            height: 100%;*/
        }
        }
/*        @media (max-height: 420px){ 
            body{background-size: 100% 122%;}

        }*/


    </style>

</head>
<!-- <body class="hold-transition login-page" > -->
<body class="hold-transition keyboard"  onresize="onResize();">

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

  <!-- Android Viewport height fix-->
<script type="text/javascript">
// var isAndroid = navigator.userAgent.toLowerCase().indexOf("android") > -1; //&& ua.indexOf("mobile");
// if(isAndroid) {
//     document.write('<meta name="viewport" content="width=device-width,height='+window.innerHeight+', initial-scale=1.0">');
// }
</script> 
    
</script>

</body>
</html>
