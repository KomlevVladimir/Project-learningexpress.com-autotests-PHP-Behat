Feature: Search items using toy finder
  In order to simplify searching of neccesary items
  As a client
  I want to use the toy finder

  Scenario Outline: Find items using filter by recommended ages on the main page
    Given client is on the main page
    When client tries to find items using filter by age <age>
    Then items for selected age <age> should be found

  Examples:
    |age         |
    |0-12 Months |
    |1-2 Years   |
    |11+ Years   |

  Scenario Outline: Find items using filter by interests on the main page
    Given client is on the main page
    When client tries to find items using filter by interest <interest>
    Then items for selected interest <interest> should be found

  Examples:
    |interest          |
    |Arts & Crafts     |
    |Construction Toys |

  Scenario Outline: Find items using filter by budget
    Given client is on the main page
    When client tries to find items using budget filter with from <from>, to <to>
    Then items within selected budget <from> , <to> should be found

  Examples:
    |from |to  |
    |50   |150 |



  Scenario Outline: Find items using toy finder side bar on the shop page
    Given client is on the shop page
    When client clicks to link <link> on the toy finder sidebar
    Then items by link <link> should be found

  Examples:
    |link        |
    |5-7 Years   |
    |8-10 Years  |
    |Cognitive   |
    |Fine Motor  |
    |Pretend Play|
    |Books       |

  Scenario Outline: Clear all filter conditions
    Given client is on the shop page
    When client clicks to link <link> on the toy finder sidebar
    And client clicks to clear all
    Then filter condition is removed

  Examples:
    |link      |
    |5-7 Years |



