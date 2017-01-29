Feature: Clear cart
  In order to remove all items from cart for one click
  As a client
  I want to be able clear cart

  Scenario Outline: Clear cart
    Given items <numberOfItemOne>, <numberOfItemTwo>, <numberOfItemThree> from <pageName> are added to cart
    And client is on the cart page
    When client clicks to clear cart button
    Then cart should be empty

  Examples:
    |numberOfItemOne |numberOfItemTwo |numberOfItemThree |pageName         |
    | 2              |5               | 1                |ArtAndCraftsPage |




