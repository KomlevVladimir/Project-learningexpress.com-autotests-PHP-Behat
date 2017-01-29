Feature: Delete address
  As a client
  I want to be able to delete unused addresses

  Background:
    Given client with credentials:
      |emailAddress       |password |
      |111@mailinator.com |555555   |
    And client is logged in
    And address is added before with data:
    |telephone |streetAddress |city   |state      |postalCode |country       |useAsMyDefaultBillingAddress |useAsMyDefaultShippingAddress |
    |random    |random        |random |California |random     |United States |0                            |0                             |

  Scenario Outline: Client can delete his address
    Given client is on the page <pageName>
    When client deletes address <numberAddress>
    Then address <numberAddress> should be deleted

  Examples:
    |pageName        |numberAddress |
    |AddressBookPage |Last          |
    |AddressBookPage |1             |