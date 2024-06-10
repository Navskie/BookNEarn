        <!DOCTYPE html>
        <html lang="en">
        <head>
        <?php include_once 'inc/header.php' ?>
        </head>
        <body>
        <!-- Top Navigation -->
        <?php include_once 'inc/top-navigation.php' ?>
        <!-- Top Navigation END -->

        <!-- Navigation -->
        <?php include_once 'inc/navigation.php' ?>
        <!-- Navigation END -->
        <?php $unique_id = $_GET['unique_id']; ?>
        <!-- Page Content -->
        <div class="container">
                <!-- <h3>Triple Room</h3> -->
                <br>
                <div class="main-body">

                        <div class="row">
                                <!-- carousel -->
                                <div class="col-sm-12 col-md-4 mb-4">
                                        <div class="book-img">
                                                <h5 class="rev-title">GALLERY</h5>
                                                <div class="carousel-container">
                                                <div class="carousel" id="carousel">
                                                <img src="assets/img/publish/IMG0607240935571.jpg" class="img-list" alt="Image 1">
                                                <img src="assets/img/publish/IMG0607240935571.jpg" class="img-list" alt="Image 1">
                                                <img src="assets/img/publish/IMG0607240935571.jpg" class="img-list" alt="Image 1">
                                                        <!-- Add more images as needed -->
                                                </div>
                                                <a class="prev" onclick="prevSlide()">&#10094;</a>
                                                <a class="next" onclick="nextSlide()">&#10095;</a>
                                                </div>
                                        </div>
                                </div>
                                <!-- details -->
                                <div class="col-sm-12 col-md-8 mb-4">
                                        <div class="book-details">
                                                <div class="desc">
                                                        <h4>Triple Room</h4>
                                                        <p>Experience Bali’s charm in Subic at Hidden Haven. The moment you walk through the doorways, you might just forget that you’re in the Philippines at all. The luxurious tropical interiors give off that strong Bali vibes that’s so cozy and comforting.</p>
                                                        <h6>Amenities</h6>
                                                        <div class="amenities">
                                                                <div class="ame-list">
                                                                </div><div class="ame-list">
                                                                </div><div class="ame-list">
                                                                </div><div class="ame-list">
                                                                </div><div class="ame-list">
                                                                </div><div class="ame-list">
                                                                </div><div class="ame-list">
                                                                </div>
                                                        </div>
                                                </div>
                                                <hr>
                                                <div class="prices">
                                                        <h4>Price</h4>
                                                        <div class="price">1200.00</div>
                                                        <div class="tax">Taxes +540</div>
                                                </div>
                                        </div>
                                </div>
                                <!-- map -->
                                <div class="col-sm-12 col-md-4 mb-4">
                                        <div class="map-body">
                                                <h5 class="rev-title">MAP</h5>
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.9272727301595!2d120.2751708!3d14.829339299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339671b4e81a5c19%3A0x141317b21a1a0abd!2sLuna%20Prime%20Hub%20%26%20Inn!5e0!3m2!1sen!2sph!4v1718008257131!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                </div>
                                <!-- form -->
                                <div class="col-sm-12 col-md-8 mb-4">
                                </div>
                                <!-- review -->
                                <div class="col-sm-12 col-md-4 mb-4">
                                        <div class="review-body">
                                                <h5 class="rev-title">REVIEWS</h5>
                                                <hr>
                                                <div class="reviews">
                                                        <!-- LOOP START -->
                                                        <div class="list-body">
                                                                <div class="list-prof">
                                                                        <img src="assets/img/profile/default.png" alt="IMG" class="img-prof">
                                                                </div>

                                                                <div class="list-comment">
                                                                        <div class="top-comment">
                                                                                <h6>Ronnel Navarro</h6>
                                                                                <label>&#9733; 5.0</label>
                                                                        </div>
                                                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui exercitationem sunt modi, consequuntur, inventore eos minima odit commodi alias nobis quo dolorum perspiciatis cumque voluptatum! Harum numquam blanditiis natus architecto!</p>
                                                                </div>
                                                        </div>
                                                        <!-- LOOP END -->
                                                </div>
                                                <form action="" method="post">
                                                        <div class="review-form">
                                                                <div class="textarea">
                                                                        <textarea name="" id="" class="" placeholder="type a comment"></textarea>
                                                                </div>
                                                                <div class="rating">
                                                                        <input type="radio" id="star5" name="rating" value="5" />
                                                                        <label for="star5">&#9733;</label>
                                                                        <input type="radio" id="star4" name="rating" value="4" />
                                                                        <label for="star4">&#9733;</label>
                                                                        <input type="radio" id="star3" name="rating" value="3" />
                                                                        <label for="star3">&#9733;</label>
                                                                        <input type="radio" id="star2" name="rating" value="2" />
                                                                        <label for="star2">&#9733;</label>
                                                                        <input type="radio" id="star1" name="rating" value="1" />
                                                                        <label for="star1">&#9733;</label>
                                                                </div>
                                                                <div class="textarea-btn">
                                                                        <button class="btn">Submit Review</button>
                                                                </div>
                                                        </div>
                                                </form>
                                        </div>
                                </div>
                        </div>

                </div>
        </div>
        <!-- Page Content END -->

        <?php include_once 'inc/footer.php' ?>
        <script>
        document.getElementById('star5').checked = true;
        </script>
        <script>
        const carousel = document.getElementById('carousel');
                let currentIndex = 0;

                function nextSlide() {
                currentIndex = (currentIndex + 1) % carousel.children.length;
                carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
                }

                function prevSlide() {
                currentIndex = (currentIndex - 1 + carousel.children.length) % carousel.children.length;
                carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
                }
        </script>
        </body>
        <?php include_once 'inc/footer-link.php' ?>
        </html>