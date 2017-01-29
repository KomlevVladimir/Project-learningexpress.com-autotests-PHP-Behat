Feature: Add new address
  In order to verify client`s payment card
  As a store owner
  I want to client be able to add billing address

  In order to get delivery address
  As a store owner
  I want to client be able to add shipping address

  Background:
    Given client with credentials:
      |emailAddress       |password |
      |111@mailinator.com |555555   |
    And client is logged in

  Scenario Outline: Add billing address
    Given client is on the account dashboard page
    When client adds new billing address with data: <telephone>, <streetAddress>, <city>, <state>, <postalCode>, <country>, <useAsMyDefaultBillingAddress>, <useAsMyDefaultShippingAddress>
    Then billing address should be added

    Examples:
    |telephone |streetAddress |city   |state   |postalCode |country       |useAsMyDefaultBillingAddress |useAsMyDefaultShippingAddress |
    |random    |random        |random |Florida |random     |United States |1                            |0                             |

  Scenario Outline: Add shipping address
    Given client is on the account dashboard page
    When client adds new shipping address with data: <telephone>, <streetAddress>, <city>, <state>, <postalCode>, <country>, <useAsMyDefaultBillingAddress>, <useAsMyDefaultShippingAddress>
    Then shipping address should be added

  Examples:
    |telephone |streetAddress |city   |state      |postalCode |country       |useAsMyDefaultBillingAddress |useAsMyDefaultShippingAddress |
    |random    |random        |random |California |random     |United States |0                            |1                             |

  Scenario Outline: Add new additional address entries
    Given client is on the account dashboard page
    When client adds new additional address entries with data: <telephone>, <streetAddress>, <city>, <state>, <postalCode>, <country>, <useAsMyDefaultBillingAddress>, <useAsMyDefaultShippingAddress>
    Then additional address entries should be added

  Examples:
    |telephone |streetAddress |city   |state      |postalCode |country       |useAsMyDefaultBillingAddress |useAsMyDefaultShippingAddress |
    |random    |random        |random |California |random     |United States |0                            |0                             |