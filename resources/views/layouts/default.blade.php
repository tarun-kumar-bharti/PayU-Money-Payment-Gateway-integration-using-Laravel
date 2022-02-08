<!DOCTYPE html>
<html>  
  <head>
        <meta charset="utf-8">
        <title>Suchas Group | Lucknow | Gorakhpur</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Suchas Group" name="keywords">
        <meta content="Gorakhpur" name="description">
		<meta content="Lucknow" name="description">
		<meta content="Medical Equipment" name="description">
		<meta content="Healthcare Equipment" name="description">
		<meta content="Medisoil, e-commerce" name="description">
		<meta content="Buy,Purchase medical devices" name="description">

        <link href="{{asset('favicon.ico')}}" rel="icon">
		
		{{Html::style('css/jquery-ui.css')}}
		{{Html::style('css/bootstrap.min.css')}}		 
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"  rel="stylesheet">
     
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
               
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
		
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />			
		 			
		{{Html::style('lib/flaticon/font/flaticon.css')}}	
		{{Html::style('lib/animate/animate.min.css')}}
		{{Html::style('lib/owlcarousel/assets/owl.carousel.min.css')}}
		{{Html::style('lib/lightbox/css/lightbox.min.css')}}
		{{Html::style('lib/slick/slick.css')}}
		{{Html::style('lib/slick/slick-theme.css')}} 	
		
		{{Html::style(AssetHelper::version('css/style.css'))}}		
		 	
		{{Html::style('css/jquery.datetimepicker.css')}}
		
		{{ Html::script("js/jquery-3.4.1.min.js")}}
		{{ Html::script("js/bootstrap.bundle.min.js")}}
		{{ Html::script("js/jquery-ui.js")}}		 
		<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
		
		@yield('seo_content')			
</head>
   
    <body> 
			
	  <div class="wrapper" style="overflow:hidden">
		 
	  @include('layouts.home_header')
	  
      @yield('top_header')

      @yield('content')		

      @include('layouts.footer')	
	
	  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
	
	  </div>		  
	    
		{{ Html::script("js/jspdf.min.js")}}
		{{ Html::script("js/jspdf.plugin.autotable.min.js")}} 
		{{ Html::script("js/jquery.loadBar.js")}}
		{{ Html::script("lib/easing/easing.min.js")}}		
		{{ Html::script("lib/wow/wow.min.js")}} 
		{{ Html::script("lib/owlcarousel/owl.carousel.min.js")}} 
		{{ Html::script("lib/isotope/isotope.pkgd.min.js")}} 
		{{ Html::script("lib/lightbox/js/lightbox.min.js")}} 
		{{ Html::script("lib/waypoints/waypoints.min.js")}} 
		{{ Html::script("lib/counterup/counterup.min.js")}} 
		{{ Html::script("lib/slick/slick.min.js")}}
		{{ Html::script("js/main.js")}}		
		{{Html::script("js/jquery.datetimepicker.full.min.js")}}		
		{{Html::script(AssetHelper::version('js/common.js'))}}        
    </body>
</html>
