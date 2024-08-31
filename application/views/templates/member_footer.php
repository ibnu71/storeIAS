    <!-- footer start -->
    <footer>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <!-- Kolom 1 -->
                <div class="col-md-6">
                    <div class="logo_footer">
                        <a href="#"><img width="150" src="<?= base_url('assets/'); ?>images/img/logo.png" alt="#" /></a>
                    </div>
                    <div class="information_f">
                        <p><strong>ADDRESS:</strong> Jakarta, Indonesia</p>
                        <p><strong>TELEPHONE:</strong> 008888888</p>
                        <p><strong>EMAIL:</strong> IAS@gmail.com</p>
                    </div>
                </div>

                <!-- Kolom 2 -->
                <div class="col-md-6">
                    <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- footer end -->
    <div class="cpy_">
        <p>2024 Made By <span>IAS(ibnu_akbar_Satria)</span></p>
    </div>
    <!-- jQery -->
    <script src="<?= base_url('assets/'); ?>js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?= base_url('assets/'); ?>js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="<?= base_url('assets/'); ?>js/custom.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
    </body>

    </html>