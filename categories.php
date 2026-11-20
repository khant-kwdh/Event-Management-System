<?php 

include('functions/userfunctions.php');
include('includes/header.php');


?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">Home / Collections</h6>
    </div>

</div>

<style>
    .fixed-size {
        width: 100%; /* Ensures responsiveness */
        height: 250px; /* Set a fixed height */
        object-fit: cover; /* Crops image to fit the dimensions */
    }
    a{
        text-decoration:none;
    }
</style>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <h2><b>Explore Our Event Categories</b></h2>

               <hr>
               <div class ="row">
                    <?php 

                        $categories = getAllActive("categories");

                        if(mysqli_num_rows($categories) > 0)
                        {
                            foreach($categories as $item)
                            {
                                ?>
                                   <div class ="col-md-3 mb-2">
                                      <!--<a href="products.php?category=<?//= $item['slug']; ?>">-->
                                            <div class="card shadow mt-3">
                                                <div class="card-body" style="background-color: #3B308A; border-radius: 10px">
                                                    <img src="uploads/<?= $item['image']; ?>" alt="Category Image" class="fixed-size" style="border-radius: 10px">
                            
                                                    <h5 class="text-center mt-3 pb-2" style = "color: white"><b><?= $item['name']; ?></b></h5>
                                                    <div style="text-align: center;" class="mt-2 pb-2">
                                                        <a href="products.php?category=<?= $item['slug']; ?>" class="btn" style="background-color: #F0AF1A; color: black;">See More Events</a>
                                                    </div>


                                                </div>
                                            </div>
                                      </a>
                                   </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "NO data available";

                        }
                   ?>

                   
               </div>

               
              
            </div>
        </div>
    </div>
</div>

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
