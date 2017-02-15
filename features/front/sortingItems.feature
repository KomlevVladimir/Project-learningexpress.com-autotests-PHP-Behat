
Feature: Sorting items
  In order to view items is more convenient
  As a client
  I want to be able sorting items

  Scenario Outline: Sorting items by grid
    Given client found the product by item name <itemName> using search
    When client sorts the items by grid
    Then items should be sorted by grid

    Examples:
    |itemName |
    |Bike     |

  Scenario Outline: Sorting items by list
    Given client found the product by item name <itemName> using search
    And items sorted by grid
    When client sorts the items by list
    Then items should be sorted by list

    Examples:
    |itemName |
    |Bike     |

  Scenario Outline: Sorting by show per page
    Given client found the product by item name <itemName> using search
    When client sorts items by show per page with number of items <itemsNumber>
    Then items sorted by number of items <itemsNumber> show per page should be displayed on the page

  Examples:
    |itemName |itemsNumber |
    |Book     |20          |