Feature: Remove item from cart
  In order to delete unnecessary item
  As a client
  I want to be able to remove items from cart

  Scenario Outline: Remove item from cart
    Given item <itemNumber> from <pageName> is added to cart
    And client is on the cart page
    When client removes item
    Then item should be removed from cart

  Examples:
    |pageName        |itemNumber |
    |ToddlerToysPage |1          |