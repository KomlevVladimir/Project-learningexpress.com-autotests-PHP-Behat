@clearWishlist
Feature: Add item to wish list
  In order to increase number of sales
  As a owner
  I want wish list to be available

  Background:
    Given client with credentials:
      |emailAddress       |password |
      |111@mailinator.com |555555   |
    And client is logged in

  Scenario Outline: Add item to wish list from item page
    Given client is on the page <pageName>
    And client chooses <itemNumber> from product list
    When client sets quantity <quantity> of items
    And client adds item to wish list from item page
    Then item should be displayed on the wish list popup
    And item with quantity and price should be displayed on the wish list page

    Examples:
    |pageName           |itemNumber |quantity |
    |PuzzleAndGamesPage |1          |3        |


  Scenario Outline: Add item to wish list from products list
    Given client is on the page <pageName>
    When client adds item <itemNumber> to wish list from the products list
    Then item should be displayed on the wish list popup
    And item with quantity and price should be displayed on the wish list page

  Examples:
    |pageName           |itemNumber |
    |PuzzleAndGamesPage |2          |
