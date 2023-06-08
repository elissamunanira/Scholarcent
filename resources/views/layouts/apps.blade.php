<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

	<link rel="stylesheet" href="/home/css/tiny-slider.css">
	<link rel="stylesheet" href="/home/css/aos.css">
	<link rel="stylesheet" href="/home/css/glightbox.min.css">
	<link rel="stylesheet" href="/home/css/style.css">

	<link rel="stylesheet" href="/home/css/flatpickr.min.css">


	<title>{{ config('app.name', 'Scholarship') }}</title>
</head>
<body>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					{{-- <div class="col-2">
							<img class="logo m-0 float-start" src="/images/logo/scholarcent.jpeg" alt="">
						</div> --}}
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="/" class="logo m-0 float-start">SCHOLARCENT</a>
						</div>
						<div class="col-8 text-center">

							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="/">Home</a></li>
								<li><a href="/category/scholarship">Scholarship</a></li>
								<li><a href="/category/internship">Internship</a></li>
								<li><a href="/category/jobs">Jobs</a></li>
								<li><a href="/category/courses">Courses</a></li>
								<li><a href="/category/continent">Continent</a></li>
							</ul>
						</div>
						<div class="col-2 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>
							{{-- <form action="#" class="search-form d-none d-lg-inline-block">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>

    @yield('content')

	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">About</h3>
						<p>we are scholarcent website with usiful information about scholarships, jobs, internerships and courses. we guide and help you to make your dream become reality.</p>
					</div> <!-- /.widget -->
					<div class="widget">
						<h3>Social</h3>
						<ul class="list-unstyled social">
							<li><a href="#"><span class="icon-instagram"></span></a></li>
							<li><a href="https://twitter.com/JeanCla03879923"><span class="icon-twitter"></span></a></li>
							<li><a href="https://www.facebook.com/profile.php?id=100092999800797"><span class="icon-facebook"></span></a></li>
							<li><a href="https://www.linkedin.com/in/jean-hakizimana-4a31b0265/"><span class="icon-linkedin"></span></a></li>
							<li><a href="https://chat.whatsapp.com/G1DHvYsLWRXAEUcK0rbPzu"><span class="icon-pinterest"></span></a></li>
							<li><a href="https://www.youtube.com/@MyHometv822"><span class="icon-youtube"></span></a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4 ps-lg-5">
					<div class="widget">
						<h3 class="mb-4">Quick Links</h3>
						<ul class="list-unstyled float-start links">
							<li><a href="#">Home</a></li>
							<li><a href="/category/scholarship">Scholarship</a></li>
							<li><a href="/category/internship">Internship</a></li>
							<li><a href="/category/jobs">Jobs</a></li>
							<li><a href="/category/courses">Courses</a></li>
							<li><a href="/category/continent">Continent</a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">Recent Post Entry</h3>
						<div class="post-entry-footer">
							<ul>
								@foreach($recentPosts as $post)
								<li>
									<a href="">
										<img src="/storage/images/{{$post->cover_image}}" alt="Image placeholder" class="me-4 rounded">
										<div class="text">
											<h4>{{$post->title}}</h4>
											<div class="post-meta">
												<span class="mr-2">{{$post->created_at}} </span>
											</div>
										</div>
									</a>
								</li>
								@endforeach
							</ul>
						</div>


					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
			</div> <!-- /.row -->

			<div class="row mt-5">
				<div class="col-12 text-center">
          <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://www.linkedin.com/in/elissa-munanira-05116b238/">Elissa</a>
            </p>
          </div>
        </div>
      </div> <!-- /.container -->
    </footer> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>


    <script src="/home/js/bootstrap.bundle.min.js"></script>
    <script src="/home/js/tiny-slider.js"></script>

    <script src="/home/js/flatpickr.min.js"></script>


    <script src="/home/js/aos.js"></script>
    <script src="/home/js/glightbox.min.js"></script>
    <script src="/home/js/navbar.js"></script>
    <script src="/home/js/counter.js"></script>
    <script src="/home/js/custom.js"></script>

    
  </body>
  </html>
