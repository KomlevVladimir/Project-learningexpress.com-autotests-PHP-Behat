Feature: Quit the cart and continue shopping
  In order to quit the cart
  As a client
  I want to be able to continue shopping by clicking the button

  Scenario Outline: Quit the cart popup by clicking continue buying button
    Given item <itemNumber> from <pageName> is added to cart
    When client clicks to continue shopping button on the cart popup
    Then cart popup should not be present on the page

  Examples:
    |pageName       |itemNumber |
    |ActiveToysPage |4          |

  Scenario Outline: Quit the cart page by clicking continue buying button
    Given item <itemNumber> from <pageName> is added to cart
    And client is on the cart page
    When client clicks to continue shopping button on the cart page
    Then client should be redirected to the shop page

  Examples:
    |pageName           |itemNumber |
    |PuzzleAndGamesPage |3          |