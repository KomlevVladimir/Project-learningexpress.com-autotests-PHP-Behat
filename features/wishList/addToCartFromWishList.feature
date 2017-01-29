@clearCart
Feature: Add items to cart from the wish list page
  In order to buy item from wishlist
  As a client
  I want to be able to add item to the cart from the wish list

  Background:
    Given client with credentials:
      |emailAddress       |password |
      |111@mailinator.com |555555   |
    And client is logged in

  Scenario Outline: Add item to the cart from the wish list
    Given item <itemNumber> from <pageName> is added to wish list
    And client is on the wish list page
    When client adds item to the cart from the wish list
    Then the item should be presented on the cart page

  Examples:
    |itemNumber |pageName        |
    |6          |ToddlerToysPage |

  Scenario Outline: Add all items to cart
    Given items <firstItem> and <secondItem> from <pageName> is added to wish list
    And client is on the wish list page
    When client adds all items to cart
    Then client should redirect to the cart page
    And items <firstItem> and <secondItem> should be added to cart

    Examples:
    |pageName  |firstItem            |secondItem                |
    |BooksPage |Welcome to Shopville |Free Spirit Coloring Book |