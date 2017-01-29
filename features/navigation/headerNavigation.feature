Feature: Header navigation
  As a client
  I want to be able to follow to header menu links

  Scenario Outline: Header menu navigation
    Given client is on the main page
    When client clicks to header menu link <linkName>
    Then page with URL <url> should be opened

  Examples:
    |linkName   |url           |
    |Our Stores |/stores/      |
    |Shop       |/shop-online/ |
    |Franchise  |/franchise/   |
    |Blog       |/blog         |

  Scenario Outline: Shop submenu links navigation
    Given client is on the main page
    When client clicks to shop submenu link <linkName>
    Then page with URL <url> should be opened

  Examples:
    |linkName                       |url                                      |
    |Active Toys                    |/shop-online/active-toys/                |
    |Arts & Crafts                  |/shop-online/arts-and-crafts/            |
    |Baby Boutique                  |/shop-online/baby-toys/                  |
    |Bikes, Boards & Ride-Ons       |/shop-online/ride-ons/                   |
    |Books                          |/shop-online/books/                      |
    |Construction Toys              |/shop-online/construction/               |
    |Developmental Toys             |/shop-online/educational-skill-building/ |
    |Dolls & Accessories            |/shop-online/dolls-and-accessories/      |
    |Fashion                        |/shop-online/fashion/                    |
    |Plush Toys                     |/shop-online/stuffed-animals-plush/      |
    |Pretend Play                   |/shop-online/let-s-pretend/              |
    |Puzzles & Games                |/shop-online/puzzles-and-boardgames/     |
    |Science & Discovery            |/shop-online/science/                    |
    |Toddler Toys                   |/shop-online/toddler/                    |
    |Vehicles & Remote Control Toys |/shop-online/remote-control-vehicles/    |
    |Gift Cards                     |/electronic-gift-card                    |
    |All Categories                 |/shop-online/                            |
    |Advanced Search                |/catalogsearch/advanced/                 |
    |Catalogs                       |/shop-online/catalogs/                   |
    |Specials and Promotions        |/toys-sales-and-promotions/              |

  Scenario Outline: Franchise submenu links navigation
    Given client is on the main page
    When client clicks to franchise submenu link <linkName>
    Then page with URL <url> should be opened

  Examples:
    |linkName                 |url                                       |
    |Welcome                  |/franchise/                               |
    |Letter from Our Founder  |/franchise/letter-from-our-founder/       |
    |Why Learning Express?    |/franchise/why-learning-express-toys/     |
    |How We Support You?      |/franchise/how-we-support-you/            |
    |The Franchising Process  |/franchise/the-process/                   |
    |Request more Information |/franchise/request-franchise-information/ |
    |News                     |/press                                    |
    |Press Releases           |/press/press-releases                     |
    |LE in the News           |/press/in-the-news                        |
    |Franchising Blog         |/franchising/                             |

  Scenario Outline: Blog submenu links navigation
    Given client is on the main page
    When client clicks to blog submenu link <linkName>
    Then page with URL <url> should be opened

  Examples:
    |linkName                     |url              |
    |Recent Posts                 |/blog/           |
    |Franchising                  |/franchis        |
    |LE Stores                    |/le-stores/      |
    |Parenting                    |/parenting/      |
    |Top Toys                     |/top-toys/       |
    |Toy Review                   |/toy-review/     |
    |Calico Critters Headquarters |/calico-critters |
    |Rainbow Loom Headquarters    |/rainbowloom-6/  |








