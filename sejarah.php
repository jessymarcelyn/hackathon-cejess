<?php include('navWisata.php') ?>

<body>



  <!-- CAROUSEL START -->
  <div class="container wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">

    <div class="row">
      <div class="col">
        <div class="row mt-5">
          <h2 class="text-center  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">Paket Wisata
            Sejarah</h2>
          <p class="text-center wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s"> Wisata yang ditujukan
            kepada wisatawan umum yang gemar belajar mengenai peninggalan sejarah Belanda.
          </p>
        </div>
        <div class="row">
          <div class="col-md-8 mb-3">
            <div id="carouselExampleInterval" class="carousel slide wow fadeInLeft" data-wow-duration="1s"
              data-wow-delay="0.5s" data-bs-ride="carousel" style="height: 400px">
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                  <img src="assets/wisata/terowongan1.jpg" class="d-block w-150" />
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                  <img src="assets/wisata/cafe2.jpg" class="d-block w-150" />
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                  <img src="assets/wisata/sendang1.jpg" class="d-block w-150" />
                </div>

              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-md-4 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="card" style=" height:400px">
              <div class="card-body">
                <h5 class="card-title">Fasilitas</h5>
                <h6 class="card-subtitle mb-2 text-muted">Pilihan paket dibawah sudah termasuk fasilitas berikut </h6>
                <ul class="mt-3">
                  <li>&diams; Welcome Drink</li>
                  <li>&diams; Tour Guide</li>
                  <li>&diams; Kereta Wisata</li>
                  <li>&diams; Tiket Wisata</li>
                  <li>&diams; Makan Siang</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- CAROUSEL END -->


  <div id="services" class="services section">
    <div class="container">
      <h2 class="text-center wow fadeInUp mb-3" data-wow-duration="1s" data-wow-delay="1s">Pilih Paket Wisata</h2>
      <div class="row">
        <div class="col-lg-12">
          <div class="accordion wow fadeInDown" id="accordionExample" data-wow-duration="1s" data-wow-delay="1s">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <div class="row">
                    <div class="col-md-10">
                      <button class="btn btn-block text-left collapsed">
                        <strong>Paket 70k/pax</strong>
                      </button>
                    </div>
                    <div class=" col-md-2">
                      <button class="btn beli align-self-center">Beli
                        sekarang</button>
                    </div>
                  </div>

                </h2>
              </div>

              <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="row">

                    <ul>
                      <li>📌Terowongan Merawan</li>
                      <li>📌Pabrik Kopi Merawan</li>
                      <li>📌Cafe Gumitir</li>
                      <li>📌Sendang Tirto</li>
                    </ul>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>