Feature: Remove item from wish list
  In order to delete unnecessary item from wish list
  As a client
  I want to be able to remove items from wish list

  Background:
    Given client with credentials:
      |emailAddress       |password |
      |111@mailinator.com |555555   |
    And client is logged in

  Scenario Outline: Remove item from wish list
    Given item <itemNumber> from <pageName> is added to wish list
    And client is on the wish list page
    When client removes item from wish list
    Then item should be removed from wish list

  Examples:
    |pageName        |itemNumber |
    |ActiveToysPage  |1          |