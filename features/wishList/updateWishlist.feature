@clearWishlist
Feature: Update wish list

  Background:
    Given client with credentials:
      |emailAddress       |password |
      |111@mailinator.com |555555   |
    And client is logged in

  Scenario Outline: Update wish list
    Given item <itemNumber> from <pageName> is added to wish list
    And client is on the wish list page
    When client changes quantity <quantity> of item
    And client enters comments <comments> about item
    And client clicks update wishlist button
    Then quantity <quantity> and comments <comments> should be changed

    Examples:
    |itemNumber |pageName        |quantity |comments  |
    |5          |PretendPlayPage |12       |Some text |