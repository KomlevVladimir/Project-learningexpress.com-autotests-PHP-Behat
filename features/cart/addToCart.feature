Feature: Add item to cart
  In order to buy item
  As a client
  I want to be able to add item into a cart

  Scenario Outline: Add item to cart from the item page
    Given client is on the page <pageName>
    And client chooses <itemNumber> from product list
    When client sets quantity <quantity> of items
    And client adds item to cart
    Then item should be displayed on the cart popup
    And item with quantity and price should be displayed on the cart page

    Examples:
    |pageName         |itemNumber |quantity |
    |BabyBoutiquePage |4          |1        |

  Scenario Outline: Add item to cart from products list
    Given client is on the page <pageName>
    When client adds item <itemNumber> to cart on the products list
    Then item should be displayed on the cart popup
    And item with quantity and price should be displayed on the cart page

  Examples:
    |pageName       |itemNumber |
    |ActiveToysPage |2          |

  Scenario Outline: Increase quantity of items by clicking increase button
    Given client is on the page <pageName>
    And client chooses <itemNumber> from product list
    When client makes <numberClicks> clicks increase button
    And client adds item to cart
    Then quantity of items should increase by <numberClicks> on the cart page

  Examples:
    |pageName              |itemNumber |numberClicks |
    |DevelopmentalToysPage |2          |3            |

  Scenario Outline: Decrease quantity of items by clicking minus
    Given client is on the page <pageName>
    And client chooses <itemNumber> from product list
    When client sets quantity <quantity> of items
    When client makes <numberClicks> clicks decrease button
    And client adds item to cart
    Then quantity of items should decrease by <numberClicks> on the cart page

  Examples:
    |pageName         |itemNumber |quantity |numberClicks |
    |BabyBoutiquePage |1          |5        |3            |

  Scenario Outline: Calculate total amount due
    When client adds item <itemNumber> from page <pageName> with <quantity>
    Then total amount due should be displayed correctly on the shopping cart page

    Examples:
    |itemNumber |pageName       |quantity |
    |5          |ActiveToysPage |2        |
