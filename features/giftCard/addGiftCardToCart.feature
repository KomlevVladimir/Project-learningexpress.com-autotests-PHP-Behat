Feature: Add a gift card to cart
  In order to buy a gift card
  As a client
  I want to be able add a gift card to cart

  Scenario Outline: Add a gift card to cart
    Given client is on the page <pageName>
    When client enters gift card amount <amount>
    And client activates send gift card to friend checkbox <sendGiftCardToFriend> and fill forms <recipientName>, <recipientEmail>, <customMessage>
    And client sets quantity <quantity> of gift cards
    And client adds gift card to cart
    Then gift card should be displayed on the cart popup
    And gift card with quantity, price, recipient data and custom message <customMessage> should be displayed

  Examples:
    |pageName               |amount |sendGiftCardToFriend |recipientName |recipientEmail |customMessage |quantity |
    |ElectronicGiftCardPage |random |1                    |random        |random         |Some text     |2        |
