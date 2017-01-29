Feature: Change quantity of items
  In order to change items quantity on the cart page
  As a client
  I want to be able to change quantity of items and update the cart

  Scenario Outline: Change quantity of items and update the cart
    Given item <itemNumber> from <pageName> is added to cart
    And client is on the cart page
    When client changes quantity of items by <changedQuantity>
    And client clicks to update button
    Then quantity of items should equal <changedQuantity>
    And subtotal amount should be changed depend on <changedQuantity>


  Examples:
    |itemNumber |pageName    |changedQuantity  |
    |2          |FashionPage |3                |