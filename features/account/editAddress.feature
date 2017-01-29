Feature: Edit address
  In order to change my address
  As a client
  I want to be able edit address

  Background:
    Given client with credentials:
      |emailAddress       |password |
      |111@mailinator.com |555555   |
    And client is logged in

  Scenario Outline: Edit billing address
    Given client is on the account dashboard page
    When client edits billing address with data: <telephone>, <streetAddress>, <city>, <state>, <postalCode>, <country>
    Then billing address should be edited

  Examples:
    |telephone |streetAddress |city   |state      |postalCode |country       |
    |random    |random        |random |Florida    |random     |United States |

  Scenario Outline: Edit shipping address
    Given client is on the account dashboard page
    When client edits shipping address with data: <telephone>, <streetAddress>, <city>, <state>, <postalCode>, <country>
    Then shipping address should be edited

  Examples:
    |telephone |streetAddress |city   |state      |postalCode |country       |
    |random    |random        |random |Florida    |random     |United States |

  Scenario Outline: Edit additional address entries
    Given client is on the account dashboard page
    When client edits additional address entries <numberOfAddress> with data: <telephone>, <streetAddress>, <city>, <state>, <postalCode>, <country>
    Then additional address entries <numberOfAddress> should be edited

  Examples:
    |numberOfAddress|telephone |streetAddress |city   |state      |postalCode |country       |
    |Last           |random    |random        |random |Florida    |random     |United States |
    |1              |random    |random        |random |California |random     |United States |
