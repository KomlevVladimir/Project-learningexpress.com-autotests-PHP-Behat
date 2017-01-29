Feature: Authorization on the web site

  Scenario Outline: Client can login
    Given client goes to login or create an account page from main page
    When client authorize with data: <emailAddress>, <password>, <rememberMe>
    Then client should be redirected to account dashboard

    Examples:
    |emailAddress       |password |rememberMe |
    |111@mailinator.com |555555   |0          |

  Scenario Outline: Client can logout
    Given client is logged on the web site with data: <emailAddress>, <password>, <rememberMe>
    When client clicks logout button
    Then logout message should be displayed
    And client should be redirected to the main page

  Examples:
  |emailAddress       |password |rememberMe |
  |111@mailinator.com |555555   |0          |