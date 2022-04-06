<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<!-- Required meta tags -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="app-url" content="{{ getBaseURL() }}">
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title></title>

	<!-- Favicon -->
	<link name="favicon" type="image/x-icon" href="" rel="shortcut icon" />

	<!-- google font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

	<!-- vendors css -->
	<link rel="stylesheet" href="{{ asset('assets/css/vendors.css') }}">

	<!-- aiz core css -->
	<link rel="stylesheet" href="{{ asset('assets/css/aiz-core.css')}}">


	<style>
        .relative.z-0.inline-flex.shadow-sm.rounded-md {
  display: none;
}

.text-sm.text-gray-700.leading-5 {
  margin-top: 2rem;
}
    </style>


	<script>
    	var AIZ = AIZ || {};
	</script>

</head>
<body>

	<div class="aiz-main-wrapper">

		@include('admin.inc.sidenav')

		<div class="aiz-content-wrapper">

			@include('admin.inc.header')

			<!-- Main Content start-->
				<div class="aiz-main-content">
					<div class="px-15px px-lg-25px">
						@yield('content')
					</div>

					<!-- Footer -->
					<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
						<p class="mb-0">&copy; {{ env('APP_NAME') }} </p>
					</div>

				</div>
			<!-- Mian content end -->

		</div>

	</div>

	@yield('modal')
	<script>
          var site_url = "{{URL::to('/')}}/";
          var current_url = "{{url()->current()}}/";
      </script>
	<script src="{{ asset('assets/js/vendors.js')}}" ></script>
	<script src="{{ asset('assets/js/aiz-core.js')}}" ></script>
	<script>
		  @foreach (session('flash_notification', collect())->toArray() as $message)
				AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
			@endforeach
	</script>
	@yield('script')

</body>
</html>
