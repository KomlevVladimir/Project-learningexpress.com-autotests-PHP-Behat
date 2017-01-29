@setDeafaultContactInformation
Feature: Edit contact information
  In order to change my contact information
  As a client
  I want to have a possibility edit my profile

  Background:
    Given client with credentials:
      |emailAddress       |password |
      |111@mailinator.com |555555   |
    And client is logged in

  Scenario Outline: Edit contact information
    Given client is on the account dashboard page
    When client edits his contact data: <firstName>, <lastName>, <emailAddress>
    Then contact information should be changed

    Examples:
    |firstName |lastName |emailAddress |
    |random    |random   |random       |