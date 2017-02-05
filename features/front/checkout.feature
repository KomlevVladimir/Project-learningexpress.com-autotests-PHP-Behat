Feature: Checkout

  @not-run
  Scenario Outline: Client checkout item
    Given client is logged in with data: <emailAddress>, <password>
    And item <itemNumber> from <pageName> is added to cart
    And client is on the cart page
    When client checkout his order with data: <selectBillingAddress>, <shipToThisAddress>, <shipToDifferentAddress>, <selectShippingAddress>, <useBillingAddress>, <shippingOption>, <addGiftWrapping>, <useGiftCardToCheckout>, <creditCardNumber>, <expirationMonth>, <expirationYear>, <cardVerificationNumber>
    Then checkout should be done

  Examples:
    |emailAddress       |password |itemNumber |pageName         |selectBillingAddress                                                    |shipToThisAddress |shipToDifferentAddress |selectShippingAddress                                                   |useBillingAddress |shippingOption               |addGiftWrapping |useGiftCardToCheckout |creditCardNumber |expirationMonth |cardVerificationNumber |
    |111@mailinator.com |555555   |3          |ArtAndCraftsPage |John Doe, 5597 Casper Keys, East Carolanne, Kansas 69518, United States |1                 |0                      |John Doe, 5597 Casper Keys, East Carolanne, Kansas 69518, United States |1                 |Standard (3 to 8 Days) $9.99 |0               |8408375938401139      |04-April         |2019            |005                    |
  