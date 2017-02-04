Feature: Give a review
  In order to receive feedback
  As a marketing specialist
  I want to user to be able to give a review

  Scenario Outline: Give a review
    Given client chooses item <itemNumber> from page <pageName>
    When client gives a review with data: <nickName>, <summaryOfYourReview>, <review>, <quality>, <price>, <value>
    Then review should be done

  Examples:
    |itemNumber |pageName           |nickName |summaryOfYourReview |review            |quality |price |value |
    |2          |PuzzleAndGamesPage |random   |Very good           |It is a good item |5       |4     |5     |