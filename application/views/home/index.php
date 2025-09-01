<?php $this->load->view('layouts/home/header'); ?>

<body class="index-page">

  <?php $this->load->view('layouts/home/navbar'); ?>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1 class="mb-2">Solusi untuk kamu yang ingin minjam buku di Perpustakaan tapi mager</h1>
            <div class="d-flex">
              <a href="<?= base_url('index.php/auth/login');?>" class="btn-get-started">Login</a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="<?= base_url(); ?>assets/home/img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

      <div class="container" data-aos="zoom-in">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="<?= base_url(); ?>assets/home/img/clients/clients-1.webp" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= base_url(); ?>assets/home/img/clients/clients-2.webp" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= base_url(); ?>assets/home/img/clients/clients-3.webp" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= base_url(); ?>assets/home/img/clients/clients-4.webp" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= base_url(); ?>assets/home/img/clients/clients-5.webp" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= base_url(); ?>assets/home/img/clients/clients-6.webp" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= base_url(); ?>assets/home/img/clients/clients-7.webp" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= base_url(); ?>assets/home/img/clients/clients-8.webp" class="img-fluid" alt=""></div>
          </div>
        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang kami </h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="justify-content-center align-items-center">

          <div class="col-lg-12  content" data-aos="fade-up" data-aos-delay="100">
            <p style="text-align: justify;">
              Selamat datang di Perpustakaan Digital, aplikasi yang menyederhanakan cara kamu meminjam buku. Dengan aplikasi ini, kamu bisa melihat ketersediaan buku, melakukan peminjaman, dan mengembalikannya dengan cepat, semuanya melalui satu platform digital. Aplikasi ini dikembangkan untuk memenuhi syarat Uji Kompetensi, dengan fokus utama pada efisiensi dan kemudahan akses untuk proses sirkulasi buku.
            </p>

          </div>

        </div>

    </section>

    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Fitur</h2>
        <p>Perpustakaan digital memiliki beberapa fitur utama yaitu</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-journal-bookmark icon"></i></div>
              <h4><a href="" class="stretched-link">Peminjaman Buku</a></h4>
              <p>Peminjaman buku bisa dilakukan di mana saja dan kapan saja</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-journals icon"></i></div>
              <h4><a href="" class="stretched-link">Manajemen Buku</a></h4>
              <p>Management buku sekarang tidak manual lagi dan tentunya sangat akurat</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-person-gear icon"></i></div>
              <h4><a href="" class="stretched-link">Management Anggota</a></h4>
              <p>Management anggota juga tidak manual lagi dan bisa pantau anggota</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-hourglass-split icon"></i></div>
              <h4><a href="" class="stretched-link">Delay Waktu</a></h4>
              <p>Dilengkapi dengan fitur denda otomatis jika anggota telat mengembalikan buku</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Sirkulasi</h2>
        <p>Temukan buku favorit kamu dan ajukan peminjaman sekarang</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Card</li>
            <li data-filter=".filter-branding">Web</li>
          </ul><!-- End Portfolio Filters -->
          <form action="">
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari buku..." >
            <button class="btn btn-primary" type="submit" id="button-subscribe">Cari</button>
          </div>
          </form>

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="<?= base_url(); ?>assets/home/img/portfolio/portfolio-portrait-1.webp" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="<?= base_url(); ?>assets/home/img/portfolio/portfolio-portrait-1.webp" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="<?= base_url(); ?>assets/home/img/portfolio/portfolio-1.webp" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="<?= base_url(); ?>assets/home/img/portfolio/portfolio-1.webp" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="<?= base_url(); ?>assets/home/img/portfolio/portfolio-3.webp" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="<?= base_url(); ?>assets/home/img/portfolio/portfolio-3.webp" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="<?= base_url(); ?>assets/home/img/portfolio/portfolio-4.webp" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="<?= base_url(); ?>assets/home/img/portfolio/portfolio-4.webp" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="<?= base_url(); ?>assets/home/img/portfolio/portfolio-portrait-2.webp" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="<?= base_url(); ?>assets/home/img/portfolio/portfolio-portrait-2.webp" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="<?= base_url(); ?>assets/home/img/portfolio/portfolio-portrait-3.webp" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="<?= base_url(); ?>assets/home/img/portfolio/portfolio-portrait-3.webp" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="<?= base_url(); ?>assets/home/img/portfolio/portfolio-7.webp" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="<?= base_url(); ?>assets/home/img/portfolio/portfolio-7.webp" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="<?= base_url(); ?>assets/home/img/portfolio/portfolio-8.webp" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="<?= base_url(); ?>assets/home/img/portfolio/portfolio-8.webp" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="<?= base_url(); ?>assets/home/img/portfolio/portfolio-9.webp" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="<?= base_url(); ?>assets/home/img/portfolio/portfolio-9.webp" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Team Section -->
    <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="<?= base_url(); ?>assets/home/img/person/person-m-7.webp" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""> <i class="bi bi-linkedin"></i> </a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="<?= base_url(); ?>assets/home/img/person/person-f-8.webp" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""> <i class="bi bi-linkedin"></i> </a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="<?= base_url(); ?>assets/home/img/person/person-m-6.webp" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""> <i class="bi bi-linkedin"></i> </a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="<?= base_url(); ?>assets/home/img/person/person-f-4.webp" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""> <i class="bi bi-linkedin"></i> </a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section>

  </main>

  <?php $this->load->view('layouts/home/footer'); ?>