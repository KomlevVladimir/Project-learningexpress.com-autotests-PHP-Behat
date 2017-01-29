Feature: Subscribe to newsletter
  In order to get information about the different events
  As a client
  I want to be able to subscribe to newsletter

  Background:
    Given client with credentials:
      |emailAddress       |password |
      |111@mailinator.com |555555   |
    And client is logged in

  Scenario: Subscribe to newsletter
    Given client is on the account dashboard page
    When client subscribes to newsletter
    Then client should be subscribed to newsletter

  Scenario: Remove subscription to newsletter
    Given client is on the account dashboard page
    When client removes his subscription to newsletter
    Then subscription should be removed
