<section class="gallery-preview py-5">

    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">

            <span class="section-subtitle">
                OUR GALLERY
            </span>

            <h2 class="section-title">
                Campus Life
            </h2>

            <p class="text-muted">
                Explore memorable moments from our school campus.
            </p>

        </div>

        <div class="row g-4">

            <?php
            for($i=1; $i<=6; $i++){
            ?>

            <div class="col-lg-4 col-md-6" data-aos="zoom-in">

                <div class="gallery-card">

                    <img src="assets/images/gallery/gallery<?php echo $i; ?>.jpg"
                         class="img-fluid"
                         alt="Gallery Image">

                    <div class="gallery-overlay">

                        <i class="fa-solid fa-magnifying-glass-plus"></i>

                    </div>

                </div>

            </div>

            <?php } ?>

        </div>

        <div class="text-center mt-5">

            <a href="pages/gallery.php" class="btn btn-primary">

                View Full Gallery

            </a>

        </div>

    </div>

</section>