<?php $domain = 'https://' . $_SERVER['SERVER_NAME'] . '/Promo'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Safety&Nutrition Preview CPA</title>
    <link href="./src/img/favicon_main.png" rel="shortcut icon">
</head>
<body>
<div class="container">
    <?php include './layouts/header.php'; ?>
    <section class="section hero position-relative pb-36 full-width" style="height: 100vh">
        <div class="hero__left--bg"></div>
        <div class="hero__right--bg"></div>
        <div class="container vh-100 position-relative">
            <div class="hero__content position-relative row align-items-center z-index-2 pt-md-240 pt-120 pb-md-156 pb-96">
                    <div class="hero__content--left col-md-4 mb-24">

                    </div>
                    <div class="hero__content--center col-md-4 position-relative" id="product">
                        <img loading="lazy" src="src/img/logo_sn2.png" class="position-absolute" alt="logo">
                    </div>
            </div>
            <h2 class="mt-64 text-center position-relative mt-48">Our mission is the beauty and health of our customers</h2>

            <div class="flags__container position-absolute w-100" style="bottom: 100px;">
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
        </div>
    </section>

    <?php
    $string = file_get_contents("./src/js/products.json");
    $json_a = json_decode($string,true);
    $products = $json_a['products'];
    ?>
    <section id="our-product" class="section our-product bg-primary full-width">
        <div class="container">
            <div class="our-product__content row pt-96 pb-96 text-center">
                <h2 class="text-center fs-48 mb-36 fw-bold text-white text-animation">OUR PRODUCTS</h2>
                <?php foreach ($products as $key => $single_product): ?>
                    <div class="our-product__content--box col-md-4 product-<?= $single_product['id']; ?>" delay="0.5">
                        <div class="product d-inline-block">
                            <img loading="lazy" data-speed="auto" src="./src/img/products/<?= $single_product['name']; ?>.png" alt="">
                            <div class="info p-24">
                                <h3 class="text-uppercase"><?= $single_product['name']; ?></h3>
                                <p><?= $single_product['short_description']; ?></p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="<?= $single_product['name']; ?>" product-id="<?= $single_product['id']; ?>">BUY NOW</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <a class="mt-48 text-center mb-36 fw-bold text-white text-animation" href="#contacts">To receive a complete list of our products - contact us</a>
            </div>
        </div>
    </section>
    <section id="about-us" class="section about-us bg-secondary full-width">
        <div class="container pt-96 pb-96">
            <h2 class="text-center fs-48 mb-36 fw-bold text-white text-animation">ABOUT US</h2>
            <div class="about-us__content text-white">
                <div class="row">
                    <div class="text-animation col-12 col-md-6">
                        <h3 class="mb-24">Start</h3>
                        <p class="mb-48 h4">The history of the company begins in 2002 with the purchase of hosting in order to create a site with a lot of traffic for monetization. In 2009, he was included in the top ten largest webmasters in Eastern Europe, and a separate direction in the field of Affiliate marketing was created. In early 2010, the first version of the platform went live and the first advertisers were launched.
                        </p>
                    </div>
                    <div class="text-animation col-12 col-md-6">
                        <h3 class="mb-24 text-end">Today</h3>
                        <p class="mb-48 h4 text-end">In 2021, the company expanded the number of clients and added to the list of business solutions in Affiliate&Referral Marketing.
                            In 2022, the company announced the thirteenth country in which our infrastructure appeared.
                            Today, more than 900 employees in fourteen countries are involved in the development of solutions for optimizing and automating marketing and advertising, monetizing traffic, content and audience, as well as new directions.</p>
                    </div>
                </div>
                <p class="text-center mb-48 text-animation h3">Our mission is beautiful and healthy people, we produce high-quality products from natural materials.</p>
                <p class="text-center text-animation mb-24 h3">Our products are presented in the countries of Europe and the CIS:</p>
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

                <h2 class="text-center fs-48 mb-36 fw-bold text-white text-animation mt-72 text-uppercase">Our reviews</h2>
                <div class="glide comments mt-60 mw-1200 ml-auto mr-auto pl-48 pr-48 text-animation">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <li class="glide__slide">
                                <div class="row comments__box justify-content-around">
                                    <div class="col-12 col-md-5 comments__box--left d-flex align-items-center">
                                        <img alt="comment" class="rounded-4" src="./src/img/comments/1.jpeg">
                                    </div>
                                    <div class="col-12 col-md-5 comments__box--right fs-4 d-flex align-items-center">
                                        Effective affiliate program that pays for quality traffic. It is clear that they are trying to work conscientiously and not lose proven offers. Profit is normal. I like that they also accept mobile traffic - the income is significantly higher than just from the desktop. They pay without delay. Top AffNet!
                                    </div>
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="row comments__box justify-content-around">
                                    <div class="col-12 col-md-5 comments__box--left d-flex align-items-center">
                                        <img alt="comment" class="rounded-4" src="./src/img/comments/2.jpeg">
                                    </div>
                                    <div class="col-12 col-md-5 comments__box--right fs-5 d-flex align-items-center">
                                        I am a webmaster with little experience in the field, I have been looking at finance for more than a year. And although 2021 is not the best year in terms of income (thanks, covid), I decided to enter this niche, as there is suitable traffic.<br>
                                        I can say: the managers are normal, they answer quickly, they help with questions, they advise. Received the payment according to the terms, no complaints. Although, of course, it would be more convenient to receive payments on request :) A really large selection of offers, it's cool in the future if you want to send money to other geos or other types of traffic. In general, I am satisfied, I will continue to work.

                                    </div>
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="row comments__box justify-content-around">
                                    <div class="col-12 col-md-5 comments__box--left d-flex align-items-center">
                                        <img alt="comment" class="rounded-4" src="./src/img/comments/3.jpeg">
                                    </div>
                                    <div class="col-12 col-md-5 comments__box--right fs-4 d-flex align-items-center">
                                        A good selection of offers and very fast support that will find an answer to every question. I have been working with PP for a long time, payments are on time, I can advise everyone.<br>
                                        You can find almost any vertical and then switch to another without risking traffic and finding other guys. Very reliable and sensible, I work with gambling and inside at the same time.
                                    </div>
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="row comments__box justify-content-around">
                                    <div class="col-12 col-md-5 comments__box--left d-flex align-items-center">
                                        <img alt="comment" class="rounded-4" src="./src/img/comments/4.jpeg">
                                    </div>
                                    <div class="col-12 col-md-5 comments__box--right fs-4 d-flex align-items-center">
                                        There is a hold for new partners, after verification, you can work without it. There are a lot of offers in different verticals, promos were made up by good designers, everything is thought out to the smallest detail, the texts are adapted very clearly to a specific audience, and even in versions for different languages under, as it were, the same offer. Professionally)
                                    </div>
                                </div>
                            </li>
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
    <section id="our-team" class="section our-team full-width mh-100vh position-relative z-index-2" style="background-image: url('./src/img/our_team.jpg'); background-size: cover">
        <div class="container">
            <div class="our-team__content pt-96 pb-84">
                <h2 class="text-center fs-48 mb-24 fw-bold text-white text-animation">OUR TEAM</h2>
                <div class="row mw-1400 pt-md-60 pb-md-96 pt-24 pb-24 ml-auto mr-auto">
                    <div class="col-md-6 text-animation">
                        <h3 class="fs-48 fw-bold mw-500 text-white">This is Safety&Nutrition CPA</h3>
                        <b class="fs-2 text-white text-uppercase">Our ideology</b>
                        <p class="fs-3 text-white">
                            Is our solutions for monetization in each niche. We strive to work directly with webmasters, and give advertisers every opportunity to filter traffic!
                        </p>
                    </div>

                    <div class="col-md-6 text-animation">
                        <b class="fs-2 text-white text-uppercase">Our goal</b>
                        <p class="fs-3 text-white">
                            Our team strives to become a leading company in Eastern Europe, producing search engine promotion, contextual advertising and other types of effective online advertising.
                            We are confident that we will achieve the goals set by the company thanks to the knowledge of the needs of our customers, the work of highly qualified specialists, the constant use of new technologies and a systematic approach to the development of the company.
                        </p>
                    </div>

                </div>

                <div class="our-team__content--bottom text-animation">
                    <b class="fs-2 text-white text-uppercase text-center d-block">Our principles</b>
                    <div class="row mw-1400 pt-24 ml-auto mr-auto">
                        <div class="col-md-6  fs-3 text-white">
                            <i class="d-block">Transparency</i>
                            A platform that gives you a complete picture of your conversion journey and gives you control over every step of your campaign.<br>
                        </div>
                        <div class="col-md-6 fs-3 text-white">
                            <i class="d-block mt-12">Unbeatable team</i>
                            Qualified technical support and a personal account manager are your main assistants in optimizing performance. <br>
                        </div>
                    </div>
                </div>
                <h3 class="text-center text-white mt-60 text-animation">A team of professionals who put the joy and happiness of customers first.
                    Technologists make cool products, marketers package them beautifully, salespeople and support take care of customers, logisticians deliver everything quickly.</h3>
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
<?php include './layouts/footer.php'; ?>
</body>
<script src="./dist/js/scripts.js?v=56"></script>
</html>
