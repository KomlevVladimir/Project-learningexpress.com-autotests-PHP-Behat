Feature: Check a gift card balance

  @not-auto
  Scenario: Check a gift card balance with valid credentials
    Given client is on the check gift card information page
    When client enters valid gift card code and captcha
    Then gift card balance should be displayed

  Scenario Outline: Check a gift card balance with invalid credentials
    Given client is on the page <pageName>
    When client enters invalid gift card code <giftCardCode> and captcha code <captchaCode>
    Then error message should be displayed

  Examples:
    |pageName                     |giftCardCode |captchaCode  |
    |CheckGiftCardInformationPage |random       |random       |

