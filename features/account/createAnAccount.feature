Feature: Create an account
  In order to move through the checkout process faster, store multiple shipping addresses, view and track my orders in my account
  As a client
  I want to be able create an account

  Scenario Outline: Create an account
    Given client goes to login or create an account page from main page
    When client creates an account with data: <firstName>, <lastName>, <emailAddress>, <signUpForNewsletter>, <password>, <confirmPassword>, <rememberMe>
    Then account should be created
    And client should be able to login with data: <rememberMe>

    Examples:
    |firstName |lastName |emailAddress |signUpForNewsletter |password |confirmPassword |rememberMe |
    |random    |random   |random       |random              |random   |random          |0          |