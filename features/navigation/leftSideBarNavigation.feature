Feature: Left sidebar navigation

  Scenario: Go to skill builders catalog
    Given client is on the shop page
    When client clicks the skill builders catalog button
    Then skill builders catalog should be opened

  Scenario: Go to calico critters headquarters page
    Given client is on the skill builders catalog page
    When client clicks to the visit calico critters headquarters button
    Then calico critters headquarters page should be opened

  Scenario Outline: Recent post sidebar navigation
    Given client is on the skill builders catalog page
    When client clicks post link <linkName>
    Then page by link <linkName> should be opened

    Examples:
    |linkName                                                 |
    |5 Ways Your Kid Can Be an Inventor                       |
    |5 Retro Toys That Are Making a Comeback (Or Never Left!) |

  Scenario Outline: Categories sidebar navigation
    Given client is on the skill builders catalog page
    When client clicks category link <linkName>
    Then page with URL <url> should be opened

  Examples:
    |linkName       |url                          |
    |Events         |/events/                     |
    |Initiatives    |/initiatives/                |
    |LE Stores      |/le-stores/                  |
    |Baby Boutique  |/baby-boutique/              |
    |Exclusives     |/exclusives/                 |
    |Franchising    |/franchising/                |
    |New Toys       |/new-toys/                   |
    |Parenting      |/parenting/                  |
    |Skill Building |/shop-online/skill-builders/ |
    |Special Needs  |/special-needs/              |
    |Top Toys       |/top-toys/                   |
    |Toy Business   |/toy-business/               |
    |Toy Review     |/toy-review/                 |


  Scenario Outline: Archive navigation
    Given client is on the skill builders catalog page
    When client selects date <date>
    Then <date> archive page should be opened

  Examples:
    |date          |
    |December 2016 |
    |November 2016 |
