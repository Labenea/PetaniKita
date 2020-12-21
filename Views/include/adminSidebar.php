<nav class="navbar sticky-top p-0 navbar-light bg-light">
  <div class="container-fluid px-0">
    <a class=" fs-3 px-2 py-2 navbar-brand bg-green text-white" href="#">PetaniKita</a>
  </div>
</nav>
   <aside class="sidebar">
        <div class="side-menu">
            <ul class="navbar-nav">
                <li class="nav-item btn-side ">
                    <a id="dashBtn" class="py-3 pl-2  nav-link <?php if(URL == "admin"){echo "active";}?> " href="<?php echo URLROOT?>admin">Dashboard</a>
                </li>
                <li class="nav-item  btn-side">
                    <a id="carouselBtn" class="py-3 pl-2 nav-link <?php if(URL == "admin/carousel"){echo "active";}?>" href="<?php echo URLROOT?>admin/carousel">Carousel</a>
                </li>
                <li class="nav-item  btn-side">
                    <a id="usersBtn" class="py-3 pl-2 nav-link <?php if(URL == "admin/users"){echo "active";}?>" href="<?php echo URLROOT?>admin/users"">Users</a>
                </li>
                <li class="nav-item accordion accordion-flush  btn-side">
                    <div class="accordion-item">
                        <div class="accordion-header">
                        <button id="productBtn" class="accordion-button py-3 px-2 nav-link collapsed <?php if(URL == "admin/product/categories" || URL == "admin/product/categories"){echo "active";}?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Products
                        </button>
                        </div>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div>
                                <a id="usersBtn" class=" pl-2 nav-link " href="<?php echo URLROOT?>admin/product/categories"">Categories</a>
                                </div>
                                <div>
                                <a id="usersBtn" class=" pl-2 nav-link " href="<?php echo URLROOT?>admin/product/categories"">Categories</a>
                                </div>
                            </div>
                        </div>    
                    </div>    
                </li>
            </ul>
        </div>
   </aside>
