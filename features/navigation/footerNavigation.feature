Feature: Footer navigation

  Scenario Outline: Footer menu navigation
    Given client is on the main page
    When client clicks to footer menu link <linkName>
    Then page with URL <url> should be opened

  Examples:
    |linkName             |url                                      |
    |Gift Card Balance    |/giftvoucher/index/check/                |
    |Check Order Status   |/sales/order/history/                    |
    |Privacy Policy       |/privacy-policy-cookie-restriction-mode/ |
    |Accessibility        |/web-accessibility/                      |
    |Terms & Conditions   |/terms-conditions/                       |
    |Contact Us           |/contact-us-2/                           |
    |Help & FAQs          |/help                                    |
    |Returns              |/returns                                 |
    |Shipping Policy      |/shipping                                |
    |Gift Cards           |/electronic-gift-card/                   |
    |Coupons & Promotions |/toys-sales-and-promotions/              |
    |Franchise            |/franchise/                              |