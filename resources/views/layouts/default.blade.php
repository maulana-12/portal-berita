<!-- Head -->
@include('includes.head')

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			@include('includes.logo_header')
			<!-- End Logo Header -->

			<!-- Navbar Header -->
            @include('includes.navbar')
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
        @include('includes.sidebar')
		<!-- End Sidebar -->

		<div class="main-panel">
		    <!-- Content -->
            @yield('content')

		    <!-- Footer -->
			@include('includes.footer')
		</div>
		
	</div>
	<!--   Javascript   -->
	@include('includes.js')
</body>
</html>