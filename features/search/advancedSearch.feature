Feature: Advanced search
  In order to find particular item
  As a client
  I want to be able to use advanced search

  Scenario Outline: Search for an existing item using anvanced search
    Given client is on the main page
    When client clicks to advanced search link
    And client uses advanced search with parameters: <name>, <description>, <shortDescription>, <sku>, <priceFrom>, <priceTo>, <manufacturer>, <recommendedAges>, <skillBuilders>, <additionalShipping>, <interest>
    Then item by search parameters should be found
    And search parameters <name>, <priceFrom>, <priceTo>, <description> should be matched with result

  Examples:
    |name       |description             |shortDescription |sku  |priceFrom |priceTo |manufacturer |recommendedAges |skillBuilders |additionalShipping |interest             |
    |NOGGINSTIK |The NogginStik features |Ages birth +     |1    |10        |30      |Smartnoggin  |0-12 Months     |Cognitive     |Not selected       | Science & Discovery |
    |BOOK       |girl                    |Not selected     |1    |5         |20      |Not selected |8-10 Years      |Cognitive     |Not selected       |Books                |

  Scenario Outline: Search for a nonexistent item using advanced search
    Given client is on the main page
    When client clicks to advanced search link
    And client uses advanced search with parameters: <name>, <description>, <shortDescription>, <sku>, <priceFrom>, <priceTo>, <manufacturer>, <recommendedAges>, <skillBuilders>, <additionalShipping>, <interest>
    Then item by search parameters should not be found

  Examples:
    |name    |description      |shortDescription |sku  |priceFrom |priceTo |manufacturer |recommendedAges |skillBuilders |additionalShipping |interest             |
    |Toy car |Some description |Some description |1    |10        |100     |Smartnoggin  |5-7 Years       |General       |Not selected       | Science & Discovery |