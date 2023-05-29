@include('layouts.head')
<body class="dashboard-page">
	<script>
	        var theme = $.cookie('protonTheme') || 'default';
	        $('body').removeClass (function (index, css) {
	            return (css.match (/\btheme-\S+/g) || []).join(' ');
	        });
	        if (theme !== 'default') $('body').addClass(theme);
        </script>
	@include('layouts.sidebar')
	<section class="wrapper scrollable">
		@include('layouts.header')
		<div class="main-grid">
                @yield('content')
		</div>
		<!-- footer -->
		<div class="footer">
			<p>© 2016 Colored . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
		</div>
		<!-- //footer -->
	</section>
	<script src="{{asset('js/bootstrap.js')}}"></script>
	<script src="{{asset('js/proton.js')}}"></script>
</body>
</html>
