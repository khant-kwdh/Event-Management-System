<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('includes/slider.php');

?>

<style>
    /* Make the Owl Carousel navigation buttons bigger */
.owl-nav button {
    font-size: 30px !important;  /* Increase icon size */
    width: 60px !important;  /* Increase button width */
    height: 60px !important; /* Increase button height */
    background-color: rgba(0, 0, 0, 0.5) !important; /* Semi-transparent black */
    color: white !important;  /* White arrow icons */
    border-radius: 50% !important;  /* Circular buttons */
    transition: 0.3s ease-in-out; /* Smooth effect */
}

/* Change button color on hover */
.owl-nav button:hover {
    background-color: rgba(0, 0, 0, 0.8) !important;
}

</style>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4><b>Trending Events</b></h4>
                <div class="underline mb-2"></div>

                
               <!-- <div class="card mt-3" style="width: 18rem;">

                    <img class="card-img-top" src="assets/events/event-1.png" alt="Card image cap">
                    <div class="card-body">
                        
                        <h4 class="card-title" style="color: #3B308A;"><b>Tech Talk & Panel Discussions</b></h4>
                        <p class="card-text">
                        A series of seminars or panels where experts and alumni discuss IT trends, 
                        careers, and real-world tech applications, with networking opportunities.
                        </p>

                        
                        <p><i class="fas fa-calendar-alt"></i> <strong>Date:</strong> March 15, 2025</p>
                        <p><i class="fas fa-clock"></i> <strong>Time:</strong> 10:00 AM - 12:00 PM</p>
                        
                       
                        <p><i class="fas fa-map-marker-alt"></i> <strong>Location:</strong> MICT Park, Yangon</p>

                        <a href="#" class="btn" style="background-color: #ffc107; color: black;">See Details</a>
                    </div>

                </div>-->

    

                <!-- Trending Products Section -->
<div class="owl-carousel owl-theme">
    <?php
    $trendingProducts = getAllTrending();
    if(mysqli_num_rows($trendingProducts) > 0 ) {
        foreach($trendingProducts as $item) {
    ?>
        <div class="item">
            <a href="product-view.php?product=<?= $item['slug']; ?>">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="fixed-size">
                        <h6 class="text-center"><?= $item['name']; ?></h6>
                    </div>
                </div>
            </a>
        </div>
    <?php
        }
    }
    ?>
</div>




                    <!--<div class="owl-carousel">
                        <?php
                           /* $trendingProducts = getAllTrending();
                            if(mysqli_num_rows($trendingProducts) > 0 ) 
                            {
                                foreach($trendingProducts as $item) {
                                    ?>
                                        <div class="item">
                                            <a href="product-view.php?product=<?= $item['slug']; ?>">
                                                <div class="card mt-3" style="width: 18rem;">
                                                    <img class="card-img-top" src="uploads/<?= $item['image']; ?>" alt="Product Image">
                                                    <div class="card-body">
                                                        <h4 class="card-title" style="color: #3B308A;"><b><?= $item['name']; ?></b></h4>
                                                        <p class="card-text">
                                                            <?= substr($item['description'], 0, 100); ?>...
                                                        </p>

                                                        <!-- Date and Time with Icons (Optional for your products, if applicable) -->
                                                        <p><i class="fas fa-calendar-alt"></i> <strong>Date:</strong> <?= $item['date']; ?></p>
                                                        <p><i class="fas fa-clock"></i> <strong>Time:</strong> <?= $item['time']; ?></p>
                                                        
                                                        <!-- Location with Icon (Optional for your products, if applicable) -->
                                                        <p><i class="fas fa-map-marker-alt"></i> <strong>Location:</strong> <?= $item['location']; ?></p>

                                                        <a href="product-view.php?product=<?= $item['slug']; ?>" class="btn" style="background-color: #ffc107; color: black;">See Details</a>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php
                                }
                            }*/
                        ?>
                    </div> -->

                
            </div>
        </div>
    </div>
</div>

<!--About Us-->
<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>About Us</h4>
                <div class="underline mb-2"></div>
                <p>
                    Welcome to our <b>Event Management System</b>, a platform designed to simplify and streamline the process of organizing events. 
                    Our system provides an efficient and user-friendly solution for event planning, allowing organizers to manage registrations, 
                    schedules, and resources with ease. Whether it's a corporate conference, a social gathering, or a large-scale festival, 
                    our system ensures smooth coordination and seamless execution.<br><br>  
                    With a focus on automation and real-time updates, our Event Management System reduces manual effort, enhances collaboration, and improves overall efficiency. 
                    Our goal is to empower event organizers with the tools they need to create successful and memorable events effortlessly.
                </p>  
            </div>

            <div class="col-md-6 d-flex justify-content-end">
                <img src="assets/images/aboutus.png" alt="About Us" style="width: 350px; height: 350px;">
            </div>
        </div>
    </div>
</div>

<!--About Us -->

<div class="py-5" style="background-color: #E56C9C;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="text-white">Eventura</h4>
                            <div class="underline mb-2"></div>
                                <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i> Home </a> <br>
                                <a href="#" class="text-white"><i class="fa fa-angle-right"></i> About Us </a> <br>
                                <a href="cart.php" class="text-white"><i class="fa fa-angle-right"></i> My Cart </a> <br>
                                <a href="categories.php" class="text-white"><i class="fa fa-angle-right"></i> Our Collections </a>
                            </div>

                            <div class="col-md-3">
                                    <h4 class="text-white">Address</h4>
                                    <p class="text-white">
                                        No. 24, Ground floor,
                                        2nd street, xyz layout,
                                        Yangon, Myanmar.
                                    </p>
                                    <a href="tel: +951234567" style="color: white"><i class="fa fa-phone"></i>+951234567</a> <br>
                                    <a href="emailto: xyz@gmail.com" style="color: white"><i class="fa fa-envelope"></i>xyz@gmail.com</a>

                            </div>

                            <div class="col-md-6">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.4036271417062!2d96.13535320000001!3d16.8559165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1936f625d4ba7%3A0x9676670831769962!2sUniversity%20of%20Information%20Technology(UIT)!5e0!3m2!1sen!2smm!4v1740634150470!5m2!1sen!2smm" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-2" style = "background-color: #3B308A">
                    <div class="text-center">
                        <div class="mb-0 text-white">All righers reserved. Copyright @ <a href="#" target="_blank" class="text-white" >Eventura </a> - <?= date('Y') ?></div>
                    </div>
                </div>

    
    <!-- Optional JavaScript -->
<?php include('includes/footer.php');?>

<script>
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
});


    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,  // Enable next/prev buttons
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: { items: 1 },
                600: { items: 2 },
                1000: { items: 3 }
            }
        });
    });


</script>