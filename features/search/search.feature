Feature: Search
  In order to find items that I would like to purchase
  As a client
  I want to be able to search for items containing certain words

  Background:
    Given client is on the main page

  Scenario Outline: Search for an existing item
    When client uses search for find item <itemName>
    Then item should be found

  Examples:
    |itemName |
    |book     |

  Scenario Outline: Search for a nonexistent item
    When client uses search for find item <itemName>
    Then item should not be found

  Examples:
    |itemName |
    |jacket   |
