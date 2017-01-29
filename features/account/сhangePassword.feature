@setDefaultPassword
Feature: Change password

  Background:
    Given client with credentials:
      |emailAddress       |password |
      |111@mailinator.com |555555   |
    And client is logged in

  Scenario Outline: Change password
    Given client is on the account dashboard page
    When client changes current password <currentPassword>, to new password <newPassword>
    And client logout and login with email <emailAddress> and new password <newPassword>
    Then client should be logged in the web site
    And client should be redirected to account dashboard

  Examples:
    |currentPassword |newPassword |emailAddress       |
    |555555          |123456      |111@mailinator.com |

