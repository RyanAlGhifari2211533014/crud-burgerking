<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Burger King</title>
    <link rel="stylesheet" href="cssfile.css">
</head>
<body><header>
        <div class="header-container">
            <div id="bulog">
                <img src="https://bkdelivery.co.id/static/website/img/logo_2022_x2.6bb6d972f0a5.png" class="logo">
            </div>
            <nav class="navigation">
                <div class="nav-left">
                    <a href="#" class="nav_link">
                        <span class="kun">Order</span><br>
                        <span class="put">Delivery</span>
                    </a>
                    <a href="promotion.html" class="nav_link">
                        <span class="kun">Get Fresh</span><br>
                        <span class="put">Promotions</span>
                    </a>
                    <a href="#" class="nav_link">
                    <span class="kun">Exclusive</span><br>
                    <span class="put">Large Order</span>
                    </a>
                </div>
                <div class="nav-right">
                    <?php if(isset($_SESSION['hp'])): ?>
                        <a href="profile.php" class="nav_link">LOGIN</a>
                    <?php else: ?>
                        <a href="login.php" class="nav_link">LOGIN</a>
                    <?php endif; ?>
                    <a href="index.php" id="nav_link"><img src="https://bkdelivery.co.id/static/website/img/BK_TopCart2x.ab793c4833a3.png" alt="Cart" class="cart-icon"></a>
                </div>
            </nav>
        </div>
    </header>

    <div class="slider">
        <div class="slide fade">
            <img src="promo1.jpg" alt="Promo 1" class="slide-image">
        </div>
        <div class="slide fade">
            <img src="promo2.jpg" alt="Promo 2" class="slide-image">
        </div>
        <div class="slide fade">
            <img src="promo3.jpg" alt="Promo 3" class="slide-image">
        </div>
        <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>

    <script src="jsfile.js"></script>

    <section class="menu-section">
        <h2 class="menu-title">Our Menus</h2>
        <!-- Content of the section -->
    </section>
   
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://media-order.bkdelivery.co.id/thumb/group_photo/2024/4/16/rjpcurwvb3uri5jwje2wow_product_list.webp" alt="..." />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">Ayam Kremes<br>Sambal Terasi</h5>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Order</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <img class="card-img-top" src="https://media-order.bkdelivery.co.id/thumb/group_photo/2023/3/16/f8b2q8v78kxbkjxw8cvbbn_product_list.jpg" alt="..." />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">Promo Hari Ini</h5>
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Order</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <img class="card-img-top" src="https://media-order.bkdelivery.co.id/thumb/group_photo/2023/2/8/cckufhpxcf4vaj2yupoouv_product_list.jpg" alt="..." />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">Cheese Burger Favourite</h5>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Order</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://media-order.bkdelivery.co.id/thumb/group_photo/2023/3/17/bucyapmxomc9uuidpwfow3_product_list.jpg" alt="..." />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">Friyay Chicken</h5>
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Order</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <img class="card-img-top" src="https://media-order.bkdelivery.co.id/thumb/group_photo/2023/3/15/znilxvdnwuyurvfmej3lft_product_list.jpg" alt="..." />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">BK APP EXCLUSIVE</h5>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Order</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://media-order.bkdelivery.co.id/thumb/group_photo/2023/11/2/ahjlc47bb9hstuc3cc9en2_product_list.jpg" alt="..." />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">Fancy Product</h5>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Order</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <img class="card-img-top" src="https://media-order.bkdelivery.co.id/thumb/group_photo/2024/2/16/ncsyvtv7jld6rh7nna8nre_product_list.jpg" alt="..." />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">Special Item</h5>
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Order</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="https://media-order.bkdelivery.co.id/thumb/group_photo/2024/2/16/nvkaaxt5hzcqec33zqy92f_product_list.jpg" alt="..." />
                        <div class="card-body p-4">
                            <div class="text-left">
                                <h5 class="fw-bolder">King Deals</h5>
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Order</a></div>
                        </div>
                    </div>
                </div>
                <div class="user-cards" data-user-cards-container></div>
                <template data-user-template>
                <div class="card">
                <div class="header" data-header></div>
                <div class="body" data-body></div>
          </div>
         </template>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Burger King Corporation. Used Under License. All rights reserved.</p>
    </footer> 

    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
