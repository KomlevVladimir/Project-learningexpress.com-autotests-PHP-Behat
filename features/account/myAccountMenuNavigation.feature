Feature: My account menu navigation

  Background:
    Given client with credentials:
      |emailAddress       |password |
      |111@mailinator.com |555555   |
    And client is logged in

  Scenario Outline:  My account menu navigation
    Given client is on the account dashboard page
    When client clicks to my account menu link <linkName>
    Then page with URL <url> should be opened

  Examples:
    |linkName                 |url                               |
    |Account Information      |/customer/account/edit/           |
    |Address Book             |/customer/address/                |
    |My Orders                |/sales/order/history/             |
    |My Product Reviews       |/review/customer/                 |
    |Wishlist                 |/wishlist/                        |
    |Newsletter Subscriptions |/newsletter/manage/               |
    |Manage Cards             |/securesubmit/storedcard/index/   |
    |MasterPass               |/securesubmit/masterpass/connect/ |