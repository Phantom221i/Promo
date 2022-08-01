<?php $domain = 'https://' . $_SERVER['SERVER_NAME'] . '/Promo'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OMNI PREVIEW</title>
</head>
<body>
<div class="container">
    <?php include 'header.php'; ?>
    <section class="section hero position-relative pb-36 full-width" style="height: 100vh">
        <div class="hero__left--bg"></div>
        <div class="hero__right--bg"></div>
        <div class="container">
            <div class="hero__content position-relative row align-items-center z-index-2 pt-md-240 pt-120 pb-md-156 pb-96">
                    <div class="hero__content--left col-md-4 mb-24">
                        <h1 class="product-title fw-bold mb-24">OMNI CPA</h1>
                        <p class="desc mb-36 mw-200">Lorem ipsum dolor sit amet consectetur, adipisicing elit. In asperiores omnis fuga corporis voluptatibus consectetur recusandae consequatur voluptate ipsa assumenda. </p>
                        <button class="btn btn-primary fw-bold">CONTACT US</button>
                    </div>
                    <div class="hero__content--center col-md-4 position-relative" id="product">
                        <img loading="lazy" src="src/img/logo.png" class="position-absolute" alt="logo">
                    </div>
                    <div class="hero__content--right col-md-4">
                        <ul class="list-style-none pl-0 mw-200 ml-auto right-navigation">
                            <li><a class="text-dark text-decoration-none d-block h4" href="#our-product">Our products</a></li>
                            <li><a class="text-dark text-decoration-none d-block h4" href="#about-us">About us</a></li>
                            <li><a class="text-dark text-decoration-none d-block h4" href="#our-team">Our team</a></li>
                            <li><a class="text-dark text-decoration-none d-block h4" href="#contacts">Contacts</a></li>
                        </ul>
                    </div>
            </div>
            <div class="flags mt-md-84 mt-12">
                <div class="glide flag">
                    <div data-glide-el="track" class="glide__track">
                        <ul class="glide__slides">
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/at.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/bg.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/cy.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/cz.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/de.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/ee.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/es.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/fr.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/gr.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/hr.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/hu.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/it.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/kz.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/lt.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/lv.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/pl.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/pt.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/ro.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/sk.svg"></li>
                            <li class="glide__slide"><img loading="lazy" src="./src/img/flags/uz.svg"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="our-product" class="section our-product bg-primary full-width">
        <div class="container">
            <div class="our-product__content row pt-96 pb-96 text-center">
                <h2 class="text-center fs-48 mb-36 fw-bold text-white text-animation">OUR PRODUCTS</h2>
                <div class="our-product__content--box col-md-4" delay="0.5">
                    <a href="<?= $domain ?>/products/artoflex.php"><img loading="lazy" data-speed="auto" src="./src/img/products/correct/artoflex.png" alt=""></a>
                </div>
                <div class="our-product__content--box col-md-4" delay="1">
                    <a href="<?= $domain ?>/products/totalfit.php"><img loading="lazy" data-speed="auto" src="./src/img/products/correct/totalfit.png" alt=""></a>
                </div>
                <div class="our-product__content--box col-md-4" delay="1.3">
                    <img loading="lazy" data-speed="auto" src="./src/img/products/correct/dealux.png" alt="">
                </div>
                <div class="our-product__content--box col-md-4" delay="1">
                    <img loading="lazy" data-speed="auto" src="./src/img/products/correct/dioptik.png" alt="">
                </div>
                <div class="our-product__content--box col-md-4" delay="1.5">
                    <img loading="lazy" data-speed="auto" src="./src/img/products/correct/visana.png" alt="">
                </div>
                <div class="our-product__content--box col-md-4" delay="2">
                    <img loading="lazy" data-speed="auto" src="./src/img/products/correct/gialurin.png" alt="">
                </div>
                <div class="our-product__content--box col-md-4" delay="1">
                    <img loading="lazy" data-speed="auto" src="./src/img/products/correct/micenil.png" alt="">
                </div>
                <div class="our-product__content--box col-md-4" delay="1.5">
                    <img loading="lazy" data-speed="auto" src="./src/img/products/correct/aktifish.png" alt="">
                </div>
                <div class="our-product__content--box col-md-4" delay="2">
                    <img loading="lazy" data-speed="auto" src="./src/img/products/correct/artonin.png" alt="">
                </div>
                <div class="our-product__content--box col-md-4" delay="1">
                    <img loading="lazy" data-speed="auto" src="./src/img/products/correct/ekzonidol.png" alt="">
                </div>

                <a class="mt-48 text-center mb-36 fw-bold text-white text-animation" href="#contacts">To receive a complete list of our products - contact us</a>
            </div>
        </div>
    </section>
    <section id="about-us" class="section about-us bg-secondary full-width">
        <div class="container pt-96 pb-96">
            <h2 class="text-center fs-48 mb-36 fw-bold text-white text-animation">ABOUT US</h2>
            <div class="about-us__content text-white">
                <h3 class="text-center mb-48 text-animation">Our mission is beautiful and healthy people, we produce high-quality products from natural materials.</h3>
                <h3 class="text-center text-animation mb-24">Our products are presented in the countries of Europe and the CIS:</h3>
                <ul class="list-style-none list-countries d-flex flex-wrap justify-content-center text-animation" style="column-gap: 5px;row-gap: 5px">
                    <li><img width="50" loading="lazy" src="./src/img/flags/at.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/bg.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/cy.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/cz.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/de.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/ee.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/es.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/fr.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/gr.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/hr.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/hu.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/it.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/kz.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/lt.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/lv.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/pl.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/pt.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/ro.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/sk.svg"></li>
                    <li><img width="50" loading="lazy" src="./src/img/flags/uz.svg"></li>
                </ul>

                <div class="glide comments mt-120 mw-896 ml-auto mr-auto pl-48 pr-48 text-animation">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <li class="glide__slide"><img alt="comment" src="./src/img/comments.png"></li>
                            <li class="glide__slide"><img alt="comment" src="./src/img/comments.png"></li>
                            <li class="glide__slide"><img alt="comment" src="./src/img/comments.png"></li>
                        </ul>
                    </div>
                    <div class="glide__arrows d-flex justify-content-between w-100" data-glide-el="controls">
                        <a class="glide__arrow glide__arrow--left" data-glide-dir="<"><img style="transform: rotate(180deg)" alt="arrow" width="30" src="./src/img/arrow-right.svg"></a>
                        <a class="glide__arrow glide__arrow--right" data-glide-dir=">"><img alt="arrow" width="30" src="./src/img/arrow-right.svg"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="our-team" class="section our-team full-width mh-100vh position-relative z-index-2" style="background-image: url('./src/img/our_team.jpg')">
        <div class="container">
            <div class="our-team__content pt-96 pb-96">
                <h2 class="text-center fs-48 mb-60 fw-bold text-white text-animation">OUR TEAM</h2>
                <div class="row mw-1400 pt-md-120 pb-md-120 pt-24 pb-24 ml-auto mr-auto">
                    <div class="col-md-6"><h3 class="fs-96 fw-bold mw-500 text-white text-animation">This is OMNI CPA</h3></div>
                    <div class="col-md-6 fs-2 text-white text-animation">A team of professionals who put the joy and happiness of customers first.
                        Technologists make cool products, marketers package them beautifully, salespeople and support take care of customers, logisticians deliver everything quickly.</div>
                </div>
                <h3 class="text-center text-white mt-48 text-animation">We love what we do</h3>
            </div>
        </div>
    </section>
    <section id="contacts" class="section contacts pt-96 pb-96">
        <div class="container">
            <h2 class="text-center fs-48 mb-36 fw-bold text-black text-animation">CONTACT US</h2>
            <form action="" method="post" class="mw-500 ml-auto mr-auto text-animation">
                <div class="card border-primary rounded-0">
                    <div class="card-body p-3">
                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-24">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter your name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-24">
                                <input type="email" class="form-control" name="email" placeholder="Enter your email address" required>
                            </div>
                        </div>
                        <div class="form-group mb-24">
                                <textarea class="form-control" placeholder="Enter your message" required></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" value="Send" class="btn btn-primary fw-bold rounded-0 py-2">
                        </div>
                    </div>
            </form>
        </div>
    </section>
</div>
<?php include 'footer.php'; ?>
</body>
<script src="./dist/js/scripts.js"></script>
</html>