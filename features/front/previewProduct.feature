Feature: Preview product
  In order to get detailed information about product
  As a client
  I want to be able to preview product

  Scenario Outline: View item page with description
    Given client found the product by item name <itemName> using search
    When client chooses <itemNumber> from product list
    Then item page should be opened

  Examples:
    |itemName |itemNumber |
    |Bike     |1          |

  Scenario Outline: Zoom item image on the preview item page
    Given client found the product by item name <itemName> using search
    And client chooses <itemNumber> from product list
    When client zooms the item
    Then item image should be zoomed

  Examples:
    |itemName |itemNumber |
    |Bike     |2          |

  Scenario Outline: Read the additional information
    Given client found the product by item name <itemName> using search
    And client chooses <itemNumber> from product list
    When client clicks to additional information tab
    Then additional information should be visible

    Examples:
      |itemName  |itemNumber |
      |Bike      |1          |