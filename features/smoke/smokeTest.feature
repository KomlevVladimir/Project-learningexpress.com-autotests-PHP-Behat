@smokeTest
Feature: Front pages smoke test

  Scenario Outline: Get response status code for page from server
    When I send a request with <uri>
    Then I should get a response with <statusCode>

  Examples:
    |uri                                                                               |statusCode |
    |/stores/                                                                          |200 OK     |
    |/franchise/                                                                       |200 OK     |
    |/shop-online/                                                                     |200 OK     |
    |/shop-online/ty-products/                                                         |200 OK     |
    |/shop-online/ty-products/ty-5-99-and-under/                                       |200 OK     |
    |/shop-online/ty-products/halloween-plush-by-ty/                                   |200 OK     |
    |/shop-online/melissa-doug/                                                        |200 OK     |
    |/shop-online/melissa-doug/md-stickerpads/                                         |200 OK     |
    |/shop-online/melissa-doug/m-d-sound-puzzles/                                      |200 OK     |
    |/shop-online/melissa-doug/water-wow/                                              |200 OK     |
    |/shop-online/melissa-doug/holidayactivitysets/                                    |200 OK     |
    |/shop-online/melissa-doug/melissa-and-doug-floor-puzzles/                         |200 OK     |
    |/shop-online/melissa-doug/melissa-and-doug-costumes/                              |200 OK     |
    |/shop-online/melissa-doug/melissa-and-doug-stained-glass/                         |200 OK     |
    |/shop-online/back-to-school/                                                      |200 OK     |
    |/shop-online/pool-floats/                                                         |200 OK     |
    |/shop-online/pool-towels/                                                         |200 OK     |
    |/shop-online/sticker-dolly-books/                                                 |200 OK     |
    |/shop-online/iq-puzzles/                                                          |200 OK     |
    |/shop-online/shopkins/                                                            |200 OK     |
    |/shop-online/alex-spa-kits/                                                       |200 OK     |
    |/shop-online/barrons-publishing/                                                  |200 OK     |
    |/shop-online/american-girl-books/                                                 |200 OK     |
    |/shop-online/american-girl-books/american-girl-books-9-99/                        |200 OK     |
    |/shop-online/blue-orange-games-november-2016/                                     |200 OK     |
    |/shop-online/let-s-pretend/                                                       |200 OK     |
    |/shop-online/toddler/                                                             |200 OK     |
    |/shop-online/arts-and-crafts/                                                     |200 OK     |
    |/shop-online/le-exclusives/                                                       |200 OK     |
    |/shop-online/tween/                                                               |200 OK     |
    |/shop-online/fashion/                                                             |200 OK     |
    |/shop-online/jewelry-kits/                                                        |200 OK     |
    |/shop-online/cars-and-trucks/                                                     |200 OK     |
    |/shop-online/wow-gifts/                                                           |200 OK     |
    |/shop-online/holiday/                                                             |200 OK     |
    |/shop-online/ride-ons/                                                            |200 OK     |
    |/shop-online/preschool/                                                           |200 OK     |
    |/shop-online/stuffed-animals-plush/                                               |200 OK     |
    |/shop-online/games/                                                               |200 OK     |
    |/shop-online/outdoor-toys/                                                        |200 OK     |
    |/shop-online/educational-skill-building/                                          |200 OK     |
    |/shop-online/active-toys/                                                         |200 OK     |
    |/shop-online/science/                                                             |200 OK     |
    |/shop-online/earth-friendly-organic/                                              |200 OK     |
    |/shop-online/baby-toys/                                                           |200 OK     |
    |/shop-online/travel/                                                              |200 OK     |
    |/shop-online/planes-and-rockets/                                                  |200 OK     |
    |/shop-online/personalization/                                                     |200 OK     |
    |/shop-online/books/                                                               |200 OK     |
    |/shop-online/construction/                                                        |200 OK     |
    |/shop-online/dolls-and-accessories/                                               |200 OK     |
    |/shop-online/trains/                                                              |200 OK     |
    |/shop-online/none/                                                                |200 OK     |
    |/shop-online/sports/                                                              |200 OK     |
    |/shop-online/party-favors/                                                        |200 OK     |
    |/shop-online/sand-and-water-toys/                                                 |200 OK     |
    |/shop-online/musical-toys/                                                        |200 OK     |
    |/shop-online/remote-control-vehicles/                                             |200 OK     |
    |/shop-online/magic/                                                               |200 OK     |
    |/shop-online/classic-wood/                                                        |200 OK     |
    |/shop-online/puzzles-and-boardgames/                                              |200 OK     |
    |/shop-online/princess/                                                            |200 OK     |
    |/shop-online/other/                                                               |200 OK     |
    |/shop-online/collectables/                                                        |200 OK     |
    |/shop-online/spy-gear/                                                            |200 OK     |
    |/shop-online/whats-new/                                                           |200 OK     |
    |/shop-online/furniture-and-decor/                                                 |200 OK     |
    |/shop-online/electronics/                                                         |200 OK     |
    |/shop-online/bath-toys/                                                           |200 OK     |
    |/shop-online/catalogs/                                                            |200 OK     |
    |/shop-online/action-figures/                                                      |200 OK     |
    |/shop-online/best-sellers/                                                        |200 OK     |
    |/shop-online/wow-gifts-2682/                                                      |200 OK     |
    |/shop-online/video-games-amp-s-w/                                                 |200 OK     |
    |/shop-online/3d-plushcraft/                                                       |200 OK     |
    |/shop-online/shopkins/                                                            |200 OK     |
    |/shop-online/star-wars-empire/                                                    |200 OK     |
    |/shop-online/adult-coloring-books/                                                |200 OK     |
    |/shop-online/sports-toys/                                                         |200 OK     |
    |/shop-online/thanksgiving-toys/                                                   |200 OK     |
    |/shop-online/travel-toys/                                                         |200 OK     |
    |/shop-online/holiday-specials/                                                    |200 OK     |
    |/shop-online/exclusions/                                                          |200 OK     |
    |/shop-online/valentines/                                                          |200 OK     |
    |/shop-online/action-skill-sport/                                                  |200 OK     |
    |/shop-online/camp/                                                                |200 OK     |
    |/shop-online/trends-amp-collectables/                                             |200 OK     |
    |/shop-online/easter/                                                              |200 OK     |
    |/shop-online/valentine-s/                                                         |200 OK     |
    |/shop-online/magformers-14-pc/                                                    |200 OK     |
    |/shop-online/planes-trains-amp-automobiles/                                       |200 OK     |
    |/shop-online/action-skill-sport/                                                  |200 OK     |
    |/shop-online/summertoys/                                                          |200 OK     |
    |/shop-online/trends-amp-collectables/                                             |200 OK     |
    |/shop-online/back-to-school/                                                      |200 OK     |
    |/shop-online/adult/                                                               |200 OK     |
    |/shop-online/calico-critters/                                                     |200 OK     |
    |/shop-online/calico-critters/calico-families/                                     |200 OK     |
    |/about-us/                                                                        |200 OK     |
    |/contact-us/                                                                      |200 OK     |
    |/privacy-policy-cookie-restriction-mode/                                          |200 OK     |
    |/web-accessibility/                                                               |200 OK     |
    |/terms-conditions/                                                                |200 OK     |
    |/help                                                                             |200 OK     |
    |/giftvoucher/index/check/                                                         |200 OK     |
    |/toys-sales-and-promotions/                                                       |200 OK     |
    |/shipping/                                                                        |200 OK     |
    |/returns                                                                          |200 OK     |
    |/catalog/seo_sitemap/category/                                                    |200 OK     |
    |/catalog/seo_sitemap/product/                                                     |200 OK     |
    |/catalogsearch/term/popular/                                                      |200 OK     |
    |/catalogsearch/advanced/                                                          |200 OK     |
    |/sales/guest/form/                                                                |200 OK     |
    |/franchise/letter-from-our-founder/                                               |200 OK     |
    |/franchise/why-learning-express-toys/                                             |200 OK     |
    |/franchise/how-we-support-you/                                                    |200 OK     |
    |/franchise/the-process/                                                           |200 OK     |
    |/franchise/request-franchise-information/                                         |200 OK     |
    |/press                                                                            |200 OK     |
    |/press/press-releases                                                             |200 OK     |
    |/press/in-the-news                                                                |200 OK     |
    |/blog                                                                             |200 OK     |
    |/le-stores/                                                                       |200 OK     |
    |/parenting/                                                                       |200 OK     |
    |/top-toys/                                                                        |200 OK     |
    |/toy-review/                                                                      |200 OK     |
    |/rainbowloom-6/                                                                   |200 OK     |
    |/in-store-pick-up-policies/                                                       |200 OK     |
    |/le-stores/learning-express-toys-and-learning-express-play-to-open-in-bedford-ma/ |200 OK     |
    |/shop-online/skill-builders/                                                      |200 OK     |
    |/events/                                                                          |200 OK     |
    |/exclusives/                                                                      |200 OK     |
    |/checkout/cart/                                                                   |200 OK     |
    |/customer/account/login/                                                          |200 OK     |
    |/customer/account/create/                                                         |200 OK     |












