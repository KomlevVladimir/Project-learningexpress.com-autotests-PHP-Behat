@clearWishlist
Feature: Edit item

  Background:
    Given client with credentials:
      |emailAddress       |password |
      |111@mailinator.com |555555   |
    And client is logged in

  Scenario Outline: Edit item
    Given item <itemNumber> from <pageName> is added to wish list
    And client is on the wish list page
    When client clicks edit link
    And client edits quantity <quantity> of item and clicks update wishlist button on the item page
    Then item should be edited with changed quantity <quantity> on the wishlist page

    Examples:
    |itemNumber |pageName        |quantity |
    |3          |PretendPlayPage |8        |