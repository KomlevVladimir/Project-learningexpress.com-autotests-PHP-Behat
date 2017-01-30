<?php


namespace src\Steps;

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\BeforeFeatureScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use src\Data\Item;
use src\Data\Client;
use src\Helpers\TestDataHelper;

class ClientContext extends BaseContext
{
    /**
     * @var \src\Data\Item
     */
    private $item;

    /**
     * @var \src\Data\Client
     */
    private $client;

    /**
     * @BeforeScenario
     * @param BeforeScenarioScope $scope
     */
    public function beforeScenario(BeforeScenarioScope $scope)
    {
        $this->item = new Item();
        $this->client = new Client();
    }

    /**
     * @AfterScenario @clearWishlist
     */
    public function clearWishlist(AfterScenarioScope $afterScenarioScope)
    {
        $wishlistPage = $this->getWishlistPage();
        $wishlistPage->getWishlistTable()->getCellLinkForRowContainsTextAndTh($this->item->name, 'Remove item')->click();
        $wishlistPage->confirmPopup();
        sleep(2);
    }

    /**
     * @AfterScenario @clearCart
     */
    public function clearCart(AfterScenarioScope $afterScenarioScope)
    {
        $this->clientClicksToClearCartButton();
    }

    /**
     * @AfterScenario @setDeafaultContactInformation
     */
    public function setDeafaultContactInformation(AfterScenarioScope $afterScenarioScope)
    {
        $this->clientEditHisContactData('John', 'Doe', '111@mailinator.com');
    }

    /**
     * @AfterScenario @setDefaultPassword
     */
    public function setDefaultPassword(AfterScenarioScope $afterScenarioScope)
    {
        $this->clientChangesCurrentPasswordToNewPassword('123456', '555555');
    }


    /**
     * @Given /^client is on the main page$/
     */
    public function clientIsOnTheMainPage()
    {
        $this->getMainPage()->open();
    }

    /**
     * @When /^client tries to find items using filter by age (.*)$/
     */
    public function clientTriesToFindItemsUsingFilterByAge($age)
    {
        $this->getMainPage()->selectAge($age);
        $this->getMainPage()->getBtnToyFinderSearch()->click();
    }

    /**
     * @Then /^items for selected age (.*) should be found$/
     */
    public function itemsForSelectedAgeShouldBeFound($age)
    {
        $actualResult = substr($this->getCatalogAdvancedSearchPage()->getTxtRecommendedAges()->getText(), 18);
        \PHPUnit_Framework_Assert::assertEquals($age, $actualResult);
        $itemsNumber = substr($this->getCatalogAdvancedSearchPage()->getTxtItemsNumber()->getText(), 10, -9);
        \PHPUnit_Framework_Assert::assertTrue($itemsNumber > 0, "items are not found");
    }

    /**
     * @When /^client tries to find items using filter by interest (.*)$/
     */
    public function clientTriesToFindItemsUsingFilterByInterest($interest)
    {
        $this->getMainPage()->selectInterest($interest);
        $this->getMainPage()->getBtnToyFinderSearch()->click();
    }

    /**
     * @Then /^items for selected interest (.*) should be found$/
     */
    public function itemsForSelectedInterestShouldBeFound($interest)
    {
        $actualResult = substr($this->getCatalogAdvancedSearchPage()->getTxtInterest()->getText(), 10);
        \PHPUnit_Framework_Assert::assertEquals($interest, $actualResult);
        $itemsNumber = substr($this->getCatalogAdvancedSearchPage()->getTxtItemsNumber()->getText(), 10, -9);
        $itemsNumber = (int)$itemsNumber;
        \PHPUnit_Framework_Assert::assertTrue($itemsNumber > 0, "Items are not found");
    }

    /**
     * @When /^client tries to find items using budget filter with from (.*), to (.*)$/
     */
    public function clientTriesToFindItemsUsingBudgetFilterWithFromTo($from, $to)
    {
        $this->getMainPage()->getFldBudgetFrom()->setValue($from);
        $this->getMainPage()->getFldBudgetTo()->setValue($to);
        $this->getMainPage()->getBtnToyFinderSearch()->click();
    }

    /**
     * @Then /^items within selected budget (.*) , (.*) should be found$/
     */
    public function itemsWithinSelectedBudgetShouldBeFound($from, $to)
    {
        for ($i = 1; $i <= 10; $i++) {
            $price = substr($this->getProductsListElements()->getItemPrice($i)->getText(), 1);
            $price = (float)$price;
            $from = (float)$from;
            $to = (float)$to;
            \PHPUnit_Framework_Assert::assertTrue($price >= $from, "Price is less than 'from' value");
            \PHPUnit_Framework_Assert::assertTrue($price <= $to, "Price is more than 'to' value");
        }
    }

    /**
     * @Given /^client is on the shop page$/
     */
    public function clientIsOnTheShopPage()
    {
        $this->getShopPage()->open();
    }

    /**
     * @When /^client clicks to link (.*) on the toy finder sidebar$/
     */
    public function clientClicksToLinkOnTheToyFinderSidebar($link)
    {
        $this->getShopPage()->getLink($link)->click();
    }

    /**
     * @Then /^items by link (.*) should be found$/
     */
    public function itemsShouldBeFound($link)
    {
        $actualResult = $this->getShopPage()->getTxtFilterParameter()->getText();
        \PHPUnit_Framework_Assert::assertEquals($link, $actualResult);
        $itemsNumber = substr($this->getShopPage()->getTxtItemsNumber()->getText(), 10, -9);
        $itemsNumber = (int)$itemsNumber;
        \PHPUnit_Framework_Assert::assertTrue($itemsNumber > 0, "Items are not found");
    }

    /**
     * @Given /^client clicks to clear all$/
     */
    public function clientClicksToClearAll()
    {
        $this->getShopPage()->getBtnClearAll()->click();
        sleep(2);
    }

    /**
     * @Then /^filter condition is removed$/
     */
    public function filterConditionIsRemoved()
    {
        \PHPUnit_Framework_Assert::assertFalse(
            $this->getShopPage()->txtFilterParameterIsPresent(),
            "Filter condition is not removed"
        );
    }

    /**
     * @When /^client uses search for find item (.*)$/
     */
    public function clientUsesSearchForFindItem($itemName)
    {
        $this->getLeftSidebarBlockElements()->getFldSearch()->setValue($itemName);
        $this->getLeftSidebarBlockElements()->getBtnSearch()->click();
    }

    /**
     * @Then /^item should be found$/
     */
    public function itemShouldBeFound()
    {
        $itemsNumber = substr($this->getCatalogAdvancedSearchPage()->getTxtItemsNumber()->getText(), 10, -9);
        $itemsNumber = (int)$itemsNumber;
        \PHPUnit_Framework_Assert::assertTrue($itemsNumber > 0, "Items are not found");
    }

    /**
     * @Then /^item should not be found$/
     */
    public function itemShouldNotBeFound()
    {
        \PHPUnit_Framework_Assert::assertEquals(
            "Your search returns no results.",
            $this->getCatalogSearchPage()->getTxtNoResultsMessage()->getText()
        );
    }

    /**
     * @When /^client clicks to advanced search link$/
     */
    public function clientClicksToAdvancedSearchLink()
    {
        $this->getLeftSidebarBlockElements()->getLnkAdvancedSearch()->click();
    }

    /**
     * @Given /^client uses advanced search with parameters: (.*), (.*), (.*), (.*), (.*), (.*), (.*), (.*), (.*), (.*), (.*)$/
     */
    public function clientUsesAdvancedSearchWithParameters(
        $name, $description, $shortDescription, $sku, $priceFrom,
        $priceTo, $manufacturer, $recommendedAges, $skillBuilders,
        $additionalShipping, $interest
    )
    {
        if ($manufacturer == 'Not selected') {
            $manufacturer = "";
        }
        if ($shortDescription == 'Not selected') {
            $shortDescription = "";
        }
        $this->getCatalogAdvancedSearchPage()->setSearchParameters(
            $name, $description, $shortDescription, $sku, $priceFrom,
            $priceTo, $manufacturer, $recommendedAges, $skillBuilders,
            $additionalShipping, $interest
        );
        $this->getCatalogAdvancedSearchPage()->getBtnSearch()->click();
    }

    /**
     * @Then /^item by search parameters should be found$/
     */
    public function itemBySearchParametersShouldBeFound()
    {
        $foundItems = substr($this->getCatalogAdvancedSearchPage()->getTxtResultMessage()->getText(), 0, 2);
        $foundItems = (int)$foundItems;
        \PHPUnit_Framework_Assert::assertTrue($foundItems > 0, "Item was not found");
    }

    /**
     * @Then /^item by search parameters should not be found$/
     */
    public function itemBySearchParametersShouldNotBeFound()
    {
        \PHPUnit_Framework_Assert::assertTrue(
            $this->getCatalogAdvancedSearchPage()->noResultMessageIsPresent(),
            "Item was found"
        );
    }

    /**
     * @Given /^search parameters (.*), (.*), (.*), (.*) should be matched with result$/
     */
    public function searchParametersShouldBeMatchedWithResult($name, $priceFrom, $priceTo, $description)
    {
        for ($i = 1; $this->getProductsListElements()->getItemPrice($i) == null; $i++) {
            $price = substr($this->getProductsListElements()->getItemPrice($i)->getText(), 1);
            $price = (float)$price;
            $from = (float)$priceFrom;
            $to = (float)$priceTo;
            \PHPUnit_Framework_Assert::assertTrue($price >= $from, "Price is less than 'from' value");
            \PHPUnit_Framework_Assert::assertTrue($price <= $to, "Price is more than 'to' value");

            $actualName = $this->getProductsListElements()->getItemName($i)->getText();
            \PHPUnit_Framework_Assert::assertEquals($name, $actualName, "Name is not match");

            $actualDescription = $this->getProductsListElements()->getItemDescription($i)->getText();
            \PHPUnit_Framework_Assert::assertEquals($description, $actualDescription, "Description is not match");
        }
    }

    /**
     * @Given /^client found the product by item name (.*) using search$/
     */
    public function clientFoundTheProductByItemNameUsingSearch($itemName)
    {
        $this->getMainPage()->open();
        $this->clientUsesSearchForFindItem($itemName);
    }

    /**
     * @When /^client chooses (.*) from product list$/
     */
    public function clientChoosesFromProductList($itemNumber)
    {
        $this->item->name = $this->getProductsListElements()->getItemName($itemNumber)->getText();
        $this->item->price = $this->getProductsListElements()->getItemPrice($itemNumber)->getText();
        $this->getProductsListElements()->getLnkItemName($itemNumber)->click();
    }

    /**
     * @Then /^item page should be opened$/
     */
    public function itemPageShouldBeOpened()
    {
        $itemName = $this->item->name;
        $itemPrice = $this->item->price;

        \PHPUnit_Framework_Assert::assertEquals(
            $itemName,
            $this->getItemPage()->getTxtItemName()->getText(),
            "Item name does not match"
        );
        \PHPUnit_Framework_Assert::assertEquals(
            $itemPrice,
            $this->getItemPage()->getTxtItemPrice()->getText(),
            "Item price does not match"
        );
    }

    /**
     * @When /^client zooms the item$/
     */
    public function clientZoomsTheItem()
    {
        $this->getItemPage()->getItemImage()->focus();
    }

    /**
     * @Then /^item image should be zoomed$/
     */
    public function itemImageShouldBeZoomed()
    {
        \PHPUnit_Framework_Assert::assertTrue(
            $this->getItemPage()->zoomedImageIsPresent(),
            "Item image is not zoomed"
        );
    }

    /**
     * @When /^client clicks to additional information tab$/
     */
    public function clientClicksToAdditionalInformationTab()
    {
        $this->getItemPage()->getLnkAdditionalInformationTab()->click();
    }

    /**
     * @Then /^additional information should be visible$/
     */
    public function additionalInformationShouldBeVisible()
    {
        \PHPUnit_Framework_Assert::assertTrue(
            $this->getItemPage()->getTxtAdditionalInformationContent()->isVisible(),
            "Additional information is invisible"
        );
    }

    /**
     * @When /^client sorts the items by grid$/
     */
    public function clientSortsTheItemsByGrid()
    {
        $this->getProductsListElements()->getBtnGridSorting()->click();
    }

    /**
     * @Then /^items should be sorted by grid$/
     */
    public function itemsShouldBeSortedByGrid()
    {
        \PHPUnit_Framework_Assert::assertTrue(
            $this->getProductsListElements()->imagesItemsSortedByGridIsPresent(),
            "Items is not sorted by grid"
        );
    }

    /**
     * @Given /^items sorted by grid$/
     */
    public function itemsSortedByGrid()
    {
        $this->clientSortsTheItemsByGrid();

        \PHPUnit_Framework_Assert::assertTrue(
            $this->getProductsListElements()->imagesItemsSortedByGridIsPresent(),
            "Items is not sorted by grid"
        );
    }

    /**
     * @When /^client sorts the items by list$/
     */
    public function clientSortsTheItemsByList()
    {
        $this->getProductsListElements()->getBtnListSorting()->click();
    }

    /**
     * @Then /^items should be sorted by list$/
     */
    public function itemsShouldBeSortedByList()
    {
        \PHPUnit_Framework_Assert::assertTrue(
            $this->getProductsListElements()->imagesItemsSortedByListIsPresent(),
            "Items is not sorted by list"
        );
    }

    /**
     * @When /^client sorts items by show per page with number of items (.*)$/
     */
    public function clientSortsItemsByShowPerPageWithNumberOfItems($itemsNumber)
    {
        $this->getProductsListElements()->getLstShowPerPage()->selectOption($itemsNumber);
        sleep(5);
    }

    /**
     * @Then /^items sorted by number of items (.*) show per page should be displayed on the page$/
     */
    public function itemsSortedByNumberShouldBeDisplayedOnThePage($itemsNumber)
    {
        \PHPUnit_Framework_Assert::assertEquals(
            $itemsNumber,
            $this->getProductsListElements()->allItemsCount(),
            "Items number not equals " . $itemsNumber
        );
    }

    /**
     * @When /^client sets quantity (.*) of items$/
     */
    public function clientSetsQuantityOfItems($quantity)
    {
        $this->item->quantity = $quantity;
        $this->getItemPage()->getFldQuantity()->setValue($quantity);
    }

    /**
     * @Given /^client adds item to cart$/
     */
    public function clientAddsItemToCart()
    {
        $this->getItemPage()->getBtnAddToCart()->click();
    }

    /**
     * @Given /^client is on the page (.*)$/
     */
    public function clientIsOnThePage($pageName)
    {
        $this->getPage($pageName)->open();
    }

    /**
     * @Then /^item should be displayed on the cart popup$/
     */
    public function itemShouldBeDisplayedOnTheCartPopup()
    {
        $expectedItemName = $this->item->name;
        $actualItemName = $this->getAddedToyToCartPopup()->getLnkItemName()->getText();
        \PHPUnit_Framework_Assert::assertEquals(
            mb_strtolower($expectedItemName),
            mb_strtolower($actualItemName),
            "Wrong item name on the cart popup"
        );
    }

    /**
     * @Given /^item with quantity and price should be displayed on the cart page$/
     */
    public function itemWithQuantityAndPriceShouldBeDisplayedOnTheCartPage()
    {
        $this->getAddedToyToCartPopup()->getBtnGoToShoppingCart()->doubleClick();
        $shoppingCartPage = $this->getShoppingCartPage();
        $expectedItemName = $this->item->name;
        $actualItemName = $shoppingCartPage->getCartTable()->getCellTextLinkForRowContainsTextAndTh(
            $this->item->name, 'Product Name')->getText();
        $expectedItemPrice = $this->item->price;
        $actualItemPrice = $shoppingCartPage->getCartTable()->getCellSpanElementForRowContainsTextAndTh(
            $this->item->name, 'Unit Price')->getText();
        $expectedQuantity = $this->item->quantity;
        $actualQuantity = $shoppingCartPage->getCartTable()->getCellInputForRowContainsTextAndTh(
            $this->item->name, 'Qty')->getValue();

        \PHPUnit_Framework_Assert::assertEquals(
            $expectedItemName,
            $actualItemName,
            "Wrong item name"
        );
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedItemPrice,
            $actualItemPrice,
            "Wrong item price"
        );
        \PHPUnit_Framework_Assert::assertEquals($expectedQuantity, $actualQuantity, "Wrong quantity");


    }

    /**
     * @When /^client adds item (.*) to cart on the products list$/
     */
    public function clientAddsItemToCartOnTheProductsList($itemNumber)
    {
        $this->item->quantity = 1;
        $this->item->name = $this->getProductsListElements()->getItemName($itemNumber)->getText();
        $this->item->price = $this->getProductsListElements()->getItemPrice($itemNumber)->getText();
        $this->getProductsListElements()->getBtnAddToCartByItemNumber($itemNumber)->click();
    }

    /**
     * @When /^client makes (.*) clicks increase button$/
     */
    public function clientClicksToIncreaseButton($numberClicks)
    {
        $this->item->quantity = $this->getItemPage()->getFldQuantity()->getValue();
        do {
            $this->getItemPage()->getBtnIncreaseQuantity()->click();
        } while ($this->getItemPage()->getFldQuantity()->getValue() < $this->item->quantity + $numberClicks);
    }

    /**
     * @Then /^quantity of items should increase by (.*) on the cart page$/
     */
    public function quantityOfItemsShouldIncreaseOnTheCartPage($numberClicks)
    {
        $this->getAddedToyToCartPopup()->getBtnGoToShoppingCart()->click();
        $shoppingCartPage = $this->getShoppingCartPage();
        $expectedQuantity = $this->item->quantity + $numberClicks;
        $actualQuantity = $shoppingCartPage->getCartTable()->getCellInputForRowContainsTextAndTh(
            $this->item->name, 'Qty')->getValue();
        \PHPUnit_Framework_Assert::assertEquals($expectedQuantity, $actualQuantity, "Wrong quantity");
    }

    /**
     * @When /^client makes (.*) clicks decrease button$/
     */
    public function clientMakesClicksDecreaseButton($numberClicks)
    {
        do {
            $this->getItemPage()->getBtnDecreaseQuantity()->click();
        } while ($this->getItemPage()->getFldQuantity()->getValue() > $this->item->quantity - $numberClicks);
    }

    /**
     * @Then /^quantity of items should decrease by (.*) on the cart page$/
     */
    public function quantityOfItemsShouldDecreaseByOnTheCartPage($numberClicks)
    {
        $this->getAddedToyToCartPopup()->getBtnGoToShoppingCart()->click();
        $shoppingCartPage = $this->getShoppingCartPage();
        $expectedQuantity = $this->item->quantity - $numberClicks;
        $actualQuantity = $shoppingCartPage->getCartTable()->getCellInputForRowContainsTextAndTh(
            $this->item->name, 'Qty')->getValue();
        \PHPUnit_Framework_Assert::assertEquals($expectedQuantity, $actualQuantity, "Wrong quantity");
    }

    /**
     * @Given /^item (.*) from (.*) is added to cart$/
     */
    public function itemFromIsAddedToCart($itemNumber, $pageName)
    {
        $this->clientIsOnThePage($pageName);
        $this->item->name = $this->getProductsListElements()->getItemName($itemNumber)->getText();
        $this->item->price = $this->getProductsListElements()->getItemPrice($itemNumber)->getText();
        $this->getProductsListElements()->getBtnAddToCartByItemNumber($itemNumber)->click();
    }

    /**
     * @Given /^client is on the cart page$/
     */
    public function clientIsOnTheCartPage()
    {
        $this->getAddedToyToCartPopup()->getBtnGoToShoppingCart()->click();
    }

    /**
     * @When /^client changes quantity of items by (.*)$/
     */
    public function clientChangesQuantityOfItemsBy($changedQuantity)
    {
        $shoppingCartPage = $this->getShoppingCartPage();
        $shoppingCartPage->getCartTable()->getCellInputForRowContainsTextAndTh(
            $this->item->name, 'Qty')->setValue($changedQuantity);
    }

    /**
     * @Given /^client clicks to update button$/
     */
    public function clientClicksToUpdateButton()
    {
        $this->getShoppingCartPage()->getBtnUpdateCart()->click();
    }

    /**
     * @Then /^quantity of items should equal (.*)$/
     */
    public function quantityOfItemsShouldEqual($changedQuantity)
    {
        $shoppingCartPage = $this->getShoppingCartPage();
        $actualQuantity = $shoppingCartPage->getCartTable()->getCellInputForRowContainsTextAndTh(
            $this->item->name, 'Qty')->getValue();
        \PHPUnit_Framework_Assert::assertEquals(
            $changedQuantity,
            $actualQuantity,
            "Quantity does not equal " . $changedQuantity
        );
    }

    /**
     * @Given /^subtotal amount should be changed depend on (.*)/
     */
    public function subtotalAmountShouldBeChanged($changedQuantity)
    {
        $shoppingCartPage = $this->getShoppingCartPage();
        $expectedSubtotalAmount = substr($this->item->price, 1) * $changedQuantity;
        $subtotalAmount = $shoppingCartPage->getCartTable()->getCellSpanElementForRowContainsTextAndTh(
            $this->item->name, 'Subtotal')->getText();
        $actualSubtotalAmount = substr($subtotalAmount, 1);

        \PHPUnit_Framework_Assert::assertEquals(
            $expectedSubtotalAmount,
            $actualSubtotalAmount,
            "Subtotal is not changed"
        );
    }

    /**
     * @Given /^items (.*), (.*), (.*) from (.*) are added to cart$/
     */
    public function itemsFromIsAddedToCart($numberOfItemOne, $numberOfItemTwo, $numberOfItemThree, $pageName)
    {
        $this->clientIsOnThePage($pageName);
        $this->getProductsListElements()->getBtnAddToCartByItemNumber($numberOfItemOne)->click();
        $this->getAddedToyToCartPopup()->getBtnContinueShopping()->click();
        $this->getProductsListElements()->getBtnAddToCartByItemNumber($numberOfItemTwo)->click();
        $this->getAddedToyToCartPopup()->getBtnContinueShopping()->click();
        $this->getProductsListElements()->getBtnAddToCartByItemNumber($numberOfItemThree)->click();
    }

    /**
     * @When /^client clicks to clear cart button$/
     */
    public function clientClicksToClearCartButton()
    {
        $this->getShoppingCartPage()->getBtnClearCart()->click();
    }

    /**
     * @Then /^cart should be empty$/
     */
    public function cartShouldBeEmpty()
    {
        \PHPUnit_Framework_Assert::assertEquals(
            'Shopping Cart is Empty',
            $this->getShoppingCartPage()->getTxtCartIsEmpty()->getText(),
            "The cart is not empty"
        );
    }

    /**
     * @When /^client removes item$/
     */
    public function clientRemovesItem()
    {
        $shoppingCartPage = $this->getShoppingCartPage();
        $shoppingCartPage->getCartTable()->getCellLinkForRowContainsTextAndTh($this->item->name, 'Remove item')->click();
        $shoppingCartPage->confirmPopup();
        sleep(2);
    }

    /**
     * @Then /^item should be removed from cart$/
     */
    public function itemShouldBeRemovedFromCart()
    {
        \PHPUnit_Framework_Assert::assertFalse($this->getShoppingCartPage()->cartTableIsPresent());

    }

    /**
     * @When /^client clicks to continue shopping button on the cart popup$/
     */
    public function clientClicksToContinueShoppingButtonOnTheCartPopup()
    {
        $this->getAddedToyToCartPopup()->getBtnContinueShopping()->click();
    }

    /**
     * @Then /^cart popup should not be present on the page$/
     */
    public function cartPopupShouldNotBePresent()
    {
        \PHPUnit_Framework_Assert::assertFalse(
            $this->getProductsListElements()->cartPopupIsPresent(),
            "Popup is present"
        );
    }

    /**
     * @When /^client clicks to continue shopping button on the cart page$/
     */
    public function clientClicksToContinueShoppingButtonOnTheCartPage()
    {
        $this->getShoppingCartPage()->getBtnContinueShopping()->click();
    }

    /**
     * @Then /^client should be redirected to the shop page$/
     */
    public function clientShouldBeRedirectedToTheShopPage()
    {
        $currentUrl = $this->getShoppingCartPage()->getSession()->getCurrentUrl();
        \PHPUnit_Framework_Assert::assertContains('/shop-online/', $currentUrl, "This is not shop page");
    }

    /**
     * @When /^client adds item (.*) from page (.*) with (.*)$/
     */
    public function clientAddsItemFromPageWith($itemNumber, $pageName, $quantity)
    {
        $this->clientIsOnThePage($pageName);
        $this->clientChoosesFromProductList($itemNumber);
        $this->clientSetsQuantityOfItems($quantity);
        $this->clientAddsItemToCart();
    }

    /**
     * @Then /^total amount due should be displayed correctly on the shopping cart page$/
     */
    public function totalAmountDueShouldBeDisplayedCorrectlyOnTheShoppingCartPage()
    {
        $this->getAddedToyToCartPopup()->getBtnGoToShoppingCart()->click();
        $itemPrice = substr($this->item->price, 1);
        $expectedAmount = (float)$itemPrice * $this->item->quantity;
        $actualAmount = substr($this->getShoppingCartPage()->getTxtTotalAmountDue()->getText(), 1);
        \PHPUnit_Framework_Assert::assertEquals($expectedAmount, $actualAmount, "Wrong total amount due");
    }

    /**
     * @Given /^client goes to login or create an account page from main page$/
     */
    public function clientGoesToLoginOrCreateAnAccountPageFromMainPage()
    {
        $this->clientIsOnTheMainPage();
        $this->getHeaderBlockElements()->getBtnMyAccount()->click();
    }

    /**
     * @When /^client authorize with data: (.*), (.*), (.*)$/
     */
    public function clientAuthorizeWithData($emailAddress, $password, $rememberMe)
    {
        $this->getLoginOrCreateAnAccountPage()->fillLoginForms($emailAddress, $password, $rememberMe);
        $this->getLoginOrCreateAnAccountPage()->getBtnLogin()->click();
    }

    /**
     * @Then /^client should be redirected to account dashboard$/
     */
    public function clientShouldBeRedirectedToAccountDashboard()
    {
        \PHPUnit_Framework_Assert::assertEquals(
            'My Dashboard',
            $this->getAccountDashboardPage()->getTxtHeader()->getText(),
            "This is not account dashboard page"
        );
    }

    /**
     * @Given /^client is logged on the web site with data: (.*), (.*), (.*)$/
     */
    public function clientIsLoggedOnTheWebSiteWithData($emailAddress, $password, $rememberMe)
    {
        $this->clientGoesToLoginOrCreateAnAccountPageFromMainPage();
        $this->clientAuthorizeWithData($emailAddress, $password, $rememberMe);
    }

    /**
     * @When /^client clicks logout button$/
     */
    public function clientClicksLogoutButton()
    {
        $this->getHeaderBlockElements()->getBtnLogout()->click();
    }

    /**
     * @Then /^logout message should be displayed$/
     */
    public function logoutMessageShouldBeDisplayed()
    {
        \PHPUnit_Framework_Assert::assertEquals(
            'You are now logged out',
            $this->getLogoutSuccessPage()->getTxtHeader()->getText(),
            "Not logged out"
        );
    }

    /**
     * @Given /^client should be redirected to the main page$/
     */
    public function clientShouldBeRedirectedToTheMainPage()
    {
        sleep(6);
        \PHPUnit_Framework_Assert::assertEquals(
            'https://learningexpress.com/',
            $this->getLogoutSuccessPage()->getSession()->getCurrentUrl(),
            "This is not main page"
        );
    }

    /**
     * @Given /^client with credentials:$/
     */
    public function clientWithCredentials(TableNode $table)
    {
        foreach ($table as $row) {
            $this->client->emailAddress = $row['emailAddress'];
            $this->client->password = $row['password'];
        }
    }

    /**
     * @Given /^client is logged in$/
     */
    public function clientIsLoggedIn()
    {
        $this->getPage('LoginOrCreateAnAccountPage')->open();
        $this->getLoginOrCreateAnAccountPage()->getFldEmailAddress()->setValue($this->client->emailAddress);
        $this->getLoginOrCreateAnAccountPage()->getFldPassword()->setValue($this->client->password);
        $this->getLoginOrCreateAnAccountPage()->getChkRememberMe()->setValue('0');
        $this->getLoginOrCreateAnAccountPage()->getBtnLogin()->click();
    }

    /**
     * @Given /^client adds item (.*) to wish list from the products list$/
     */
    public function clientAddsItemToWishList($itemNumber)
    {
        $this->item->quantity = 1;
        $this->item->name = $this->getProductsListElements()->getItemName($itemNumber)->getText();
        $this->item->price = $this->getProductsListElements()->getItemPrice($itemNumber)->getText();
        $this->getProductsListElements()->getBtnAddToWishList($itemNumber)->click();
    }

    /**
     * @Then /^item should be displayed on the wish list popup$/
     */
    public function itemShouldBeDisplayedOnTheWishListPopup()
    {
        $expectedItemName = $this->item->name;
        $actualItemName = $this->getAddProductToWishlistPopup()->getLnkItemName()->getText();
        \PHPUnit_Framework_Assert::assertEquals(
            mb_strtolower($expectedItemName),
            mb_strtolower($actualItemName),
            "Wrong item name on the cart popup"
        );
    }

    /**
     * @Given /^client adds item to wish list from item page$/
     */
    public function clientAddsItemToWishListFromItemPage()
    {
        $this->getItemPage()->getBtnWishList()->click();
    }

    /**
     * @Given /^item with quantity and price should be displayed on the wish list page$/
     */
    public function itemWithQuantityAndPriceShouldBeDisplayedOnTheWishListPage()
    {
        $this->getAddProductToWishlistPopup()->getBtnGoToWishList()->doubleClick();

        $wishlistPage = $this->getWishlistPage();
        $expectedItemName = $this->item->name;
        $actualItemName = $wishlistPage->getWishlistTable()->getCellH3TextLinkForRowContainsTextAndTh(
            $this->item->name, 'Product Details and Comment')->getText();
        $expectedItemPrice = $this->item->price;
        $actualItemPrice = $wishlistPage->getWishlistTable()->getCellSpanTextForRowContainsTextAndTh(
            $this->item->name, 'Add to Cart')->getText();
        $expectedQuantity = $this->item->quantity;
        $actualQuantity = $wishlistPage->getWishlistTable()->getCellDivInputForRowContainsTextAndTh(
            $this->item->name, 'Add to Cart')->getValue();
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedItemName,
            $actualItemName,
            "Wrong item name"
        );
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedItemPrice,
            $actualItemPrice,
            "Wrong item price"
        );
        \PHPUnit_Framework_Assert::assertEquals($expectedQuantity, $actualQuantity, "Wrong quantity");


    }

    /**
     * @Given /^item (.*) from (.*) is added to wish list$/
     */
    public function itemFromIsAddedToWishList($itemNumber, $pageName)
    {
        $this->clientIsOnThePage($pageName);
        $this->item->name = $this->getProductsListElements()->getItemName($itemNumber)->getText();
        $this->item->price = $this->getProductsListElements()->getItemPrice($itemNumber)->getText();
        $this->getProductsListElements()->getBtnAddToWishList($itemNumber)->click();
    }

    /**
     * @Given /^client is on the wish list page$/
     */
    public function clientIsOnTheWishListPage()
    {
        $this->getAddProductToWishlistPopup()->getBtnGoToWishList()->doubleClick();
    }

    /**
     * @When /^client removes item from wish list$/
     */
    public function clientRemovesItemFromWishList()
    {
        $wishlistPage = $this->getWishlistPage();
        $wishlistPage->getWishlistTable()->getCellLinkForRowContainsTextAndTh(
            $this->item->name, 'Remove item')->click();
        $wishlistPage->confirmPopup();
        sleep(2);
    }

    /**
     * @Then /^item should be removed from wish list$/
     */
    public function itemShouldBeRemovedFromWishList()
    {
        \PHPUnit_Framework_Assert::assertFalse($this->getWishlistPage()->wishlistTableIsPresent());
    }

    /**
     * @When /^client adds item to the cart from the wish list$/
     */
    public function clientAddsItemToTheCartFromWishList()
    {
        $wishlistPage = $this->getWishlistPage();
        $wishlistPage->getWishlistTable()->getCellButtonForRowContainsTextAndTh(
            $this->item->name, 'Add to Cart')->click();
    }

    /**
     * @Then /^the item should be presented on the cart page$/
     */
    public function theItemShouldBePresentedOnTheCartPage()
    {
        $shoppingCartPage = $this->getShoppingCartPage();
        $expectedResult = $this->item->name;
        $actualResult = $shoppingCartPage->getCartTable()->getCellTextLinkForRowContainsTextAndTh(
            $this->item->name, 'Product Name')->getText();
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedResult,
            $actualResult,
            "The item is not added to cart"
        );
    }

    /**
     * @When /^client changes quantity (.*) of item$/
     */
    public function clientChangesQuantityOfItem($quantity)
    {
        $wishlistPage = $this->getWishlistPage();
        $wishlistPage->getWishlistTable()->getCellDivInputForRowContainsTextAndTh(
            $this->item->name, 'Add to Cart')->setValue($quantity);
    }

    /**
     * @Given /^client enters comments (.*) about item$/
     */
    public function clientEntersCommentsAboutItem($comments)
    {
        $wishlistPage = $this->getWishlistPage();
        $wishlistPage->getWishlistTable()->getCellTextAreaForRowContainsTextAndTh(
            $this->item->name, 'Product Details and Comment')->setValue($comments);
    }

    /**
     * @Given /^client clicks update wishlist button$/
     */
    public function clientClicksUpdateWishlistButton()
    {
        $this->getWishlistPage()->getBtnUpdateWishlist()->click();
    }

    /**
     * @Then /^quantity (.*) and comments (.*) should be changed$/
     */
    public function quantityAndCommentsShouldBeChanged($quantity, $comments)
    {
        $wishlistPage = $this->getWishlistPage();
        $expectedQuantity = $quantity;
        $actualQuantity = $wishlistPage->getWishlistTable()->getCellDivInputForRowContainsTextAndTh(
            $this->item->name, 'Add to Cart')->getValue();

        $expectedComments = $comments;
        $actualComments = $wishlistPage->getWishlistTable()->getCellTextAreaForRowContainsTextAndTh(
            $this->item->name, 'Product Details and Comment')->getText();

        \PHPUnit_Framework_Assert::assertEquals(
            $expectedQuantity,
            $actualQuantity,
            "Quantity is not updated"
        );
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedComments,
            $actualComments,
            "Comments is not updated"
        );
    }

    /**
     * @When /^client clicks edit link$/
     */
    public function clientClicksEditLink()
    {
        $wishlistPage = $this->getWishlistPage();
        $wishlistPage->getWishlistTable()->getCellDivLinkForRowContainsTextAndTh(
            $this->item->name, 'Add to Cart')->click();
    }

    /**
     * @Given /^client edits quantity (.*) of item and clicks update wishlist button on the item page$/
     */
    public function clientEditsQuantityOfItemAndClicksUpdateWishlistButtonOnTheItemPage($quantity)
    {
        \PHPUnit_Framework_Assert::assertContains(
            '/wishlist/index/configure/id/',
            $this->getWishlistPage()->getSession()->getCurrentUrl(),
            "Edit item page is not loaded"
        );
        $this->getEditItemPage()->getFldQuantity()->setValue($quantity);
        $this->getEditItemPage()->getBtnUpdateWishList()->click();
    }

    /**
     * @Then /^item should be edited with changed quantity (.*) on the wishlist page$/
     */
    public function itemShouldBeEditedWithChangedQuantityOnTheWishlistPage($quantity)
    {
        $wishlistPage = $this->getWishlistPage();
        $expectedQuantity = $quantity;
        $actualQuantity = $wishlistPage->getWishlistTable()->getCellDivInputForRowContainsTextAndTh(
            $this->item->name, 'Add to Cart')->getValue();
        \PHPUnit_Framework_Assert::assertEquals($expectedQuantity, $actualQuantity, "Item is not edited");
    }

    /**
     * @Given /^items (.*) and (.*) from (.*) is added to wish list$/
     */
    public function itemsAndFromIsAddedToWishList($firstItem, $secondItem, $pageName)
    {
        $this->clientIsOnThePage($pageName);
        $this->getProductsListElements()->getItemByName($firstItem)->click();
        $this->getItemPage()->getBtnWishList()->click();
        $this->clientIsOnThePage($pageName);
        $this->getProductsListElements()->getItemByName($secondItem)->click();
        $this->getItemPage()->getBtnWishList()->click();
    }

    /**
     * @When /^client adds all items to cart$/
     */
    public function clientAddsAllItemsToCart()
    {
        $this->getWishlistPage()->getBtnAddAllToCart()->click();
    }

    /**
     * @Then /^client should redirect to the cart page$/
     */
    public function clientShouldRedirectToTheCartPage()
    {
        \PHPUnit_Framework_Assert::assertContains(
            '/checkout/cart/',
            $this->getWishlistPage()->getSession()->getCurrentUrl(),
            "This is not cart page"
        );
    }

    /**
     * @Given /^items (.*) and (.*) should be added to cart$/
     */
    public function itemsAndShouldBeAddedToCart($firstItem, $secondItem)
    {
        $shoppingCartPage = $this->getShoppingCartPage();
        $expectedMessage = '2 product(s) have been added to shopping cart: "' . $firstItem . '", "' . $secondItem . '".';
        $actualMessage = $this->getShoppingCartPage()->getTxtMessageItemHasBeenAdded()->getText();
        \PHPUnit_Framework_Assert::assertEquals($expectedMessage,
            $actualMessage,
            "Successful message is not displayed"
        );
        $expectedFirstItem = mb_strtoupper($firstItem);
        $actualFirstName = $shoppingCartPage->getCartTable()->getCellTextLinkForRowContainsTextAndTh(
            mb_strtoupper($firstItem), 'Product Name')->getText();
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedFirstItem,
            $actualFirstName,
            "First item is not added to cart"
        );
        $expectedSecondItem = mb_strtoupper($secondItem);
        $actualSecondItem = $shoppingCartPage->getCartTable()->getCellTextLinkForRowContainsTextAndTh(
            mb_strtoupper($secondItem), 'Product Name')->getText();
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedSecondItem,
            $actualSecondItem,
            "Second item is not added to cart"
        );
    }

    /**
     * @Given /^client is on the account dashboard page$/
     */
    public function clientIsOnTheAccountDashboardPage()
    {
        $this->getPage('AccountDashboardPage')->open();
    }

    /**
     * @When /^client edits his contact data: (.*), (.*), (.*)$/
     */
    public function clientEditHisContactData($firstName, $lastName, $emailAddress)
    {
        $this->getAccountDashboardPage()->getLnkEditContactInformation()->click();
        if ($firstName == 'random') {
            $firstName = TestDataHelper::GetRandomFirstName();
        }
        if ($lastName == 'random') {
            $lastName = TestDataHelper::GetRandomLastName();
        }
        if ($emailAddress == 'random') {
            $emailAddress = TestDataHelper::GetRandomEmail();
        }
        $this->getEditAccountInformationPage()->fillForms($firstName, $lastName, $emailAddress);
        $this->client->firstName = $this->getEditAccountInformationPage()->getFldFirstName()->getValue();
        $this->client->lastName = $this->getEditAccountInformationPage()->getFldLastName()->getValue();
        $this->client->emailAddress = $this->getEditAccountInformationPage()->getFldEmailAddress()->getValue();
        $this->getEditAccountInformationPage()->getBtnSave()->click();
    }

    /**
     * @Then /^contact information should be changed$/
     */
    public function contactDataShouldBeChanged()
    {
        $firstName = $this->client->firstName;
        $lastName = $this->client->lastName;
        $emailAddress = $this->client->emailAddress;
        $expectedResult = "$firstName $lastName $emailAddress";
        $actualResult = substr($this->getAccountDashboardPage()->getTxtContactInformation()->getText(), 0, -16);
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedResult,
            $actualResult,
            "Contact information is not changed"
        );
    }

    /**
     * @When /^client changes current password (.*), to new password (.*)$/
     */
    public function clientChangesCurrentPasswordToNewPassword($currentPassword, $newPassword)
    {
        $this->getAccountDashboardPage()->getLnkChangePassword()->click();
        $this->getChangePasswordPage()->fillChangePasswordForms($currentPassword, $newPassword);
        $this->getChangePasswordPage()->getBtnSave()->click();
    }

    /**
     * @Given /^client logout and login with email (.*) and new password (.*)$/
     */
    public function clientLogoutAndLoginWithNewPassword($emailAddress, $newPassword)
    {
        \PHPUnit_Framework_Assert::assertEquals(
            'The account information has been saved.',
            $this->getAccountDashboardPage()->gettxtInformationHasBeenSavedMessage()->getText(),
            "New password has not been saved"
        );
        $this->clientClicksLogoutButton();
        sleep(3);
        $this->getPage('LoginOrCreateAnAccountPage')->open();
        $this->getLoginOrCreateAnAccountPage()->getFldEmailAddress()->setValue($emailAddress);
        $this->getLoginOrCreateAnAccountPage()->getFldPassword()->setValue($newPassword);
        $this->getLoginOrCreateAnAccountPage()->getChkRememberMe()->setValue('0');
        $this->getLoginOrCreateAnAccountPage()->getBtnLogin()->click();
    }

    /**
     * @Then /^client should be logged in the web site$/
     */
    public function clientShouldBeLoggedInTheWebSite()
    {
        \PHPUnit_Framework_Assert::assertContains(
            '/customer/account/',
            $this->getLoginOrCreateAnAccountPage()->getSession()->getCurrentUrl(),
            "This is not account dashboard page"
        );
        \PHPUnit_Framework_Assert::assertTrue(
            $this->getAccountDashboardPage()->txtHelloMessageIsPresent(),
            "Client is not logged in"
        );
    }

    /**
     * @When /^client adds new billing address with data: (.*), (.*), (.*), (.*), (.*), (.*), (.*), (.*)$/
     */
    public function clientAddsNewAddressWithData(
        $telephone, $streetAddress, $city, $state, $postalCode,
        $country, $useAsMyDefaultBillingAddress, $useAsMyDefaultShippingAddress
    )
    {
        $this->getMyAccountLeftSideBar()->getLnkAddressBook()->click();
        $this->getAddressBookPage()->getBtnAddNewAddress()->click();
        if ($telephone == 'random') {
            $telephone = TestDataHelper::GetRandomPhoneNumber();
        }
        if ($streetAddress == 'random') {
            $streetAddress = TestDataHelper::GetRandomStreet();
        }
        if ($city == 'random') {
            $city = TestDataHelper::GetRandomCity();
        }
        if ($postalCode == 'random') {
            $postalCode = TestDataHelper::GetRandomPostIndex();
        }
        $this->getAddNewAddressPage()->fillForms(
            $telephone, $streetAddress, $city, $state, $postalCode,
            $country, $useAsMyDefaultBillingAddress, $useAsMyDefaultShippingAddress
        );
        $this->client->firstName = $this->getAddNewAddressPage()->getFldFirstName()->getValue();
        $this->client->lastName = $this->getAddNewAddressPage()->getFldLastName()->getValue();
        $this->client->phone = $this->getAddNewAddressPage()->getFldTelephone()->getValue();
        $this->client->streetAddress = $this->getAddNewAddressPage()->getFldStreetAddress()->getValue();
        $this->client->city = $this->getAddNewAddressPage()->getFldCity()->getValue();
        $this->client->postalCode = $this->getAddNewAddressPage()->getFldPostalCode()->getValue();
        $this->client->state = $state;
        $this->client->country = $country;
        $this->getAddNewAddressPage()->getBtnSaveAddress()->click();

    }

    /**
     * @Then /^billing address should be added$/
     */
    public function billingAddressWithDataShouldBeAdded()
    {
        $firstName = $this->client->firstName;
        $lastName = $this->client->lastName;
        $telephone = $this->client->phone;
        $streetAddress = $this->client->streetAddress;
        $city = $this->client->city;
        $postalCode = $this->client->postalCode;
        $state = $this->client->state;
        $country = $this->client->country;
        $expectedResult = "$firstName $lastName $streetAddress $city, $state, $postalCode $country T: $telephone";
        $actualResult = $this->getAddressBookPage()->getTxtBillingAddress()->getText();
        \PHPUnit_Framework_Assert::assertEquals(
            'The address has been saved.',
            $this->getAddressBookPage()->getTxtAddressHasBeenSaved()->getText(),
            "Billing address has not been saved"
        );
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedResult,
            $actualResult,
            "Billing address is not added"
        );
    }

    /**
     * @When /^client adds new shipping address with data: (.*), (.*), (.*), (.*), (.*), (.*), (.*), (.*)$/
     */
    public function clientAddsNewShippingAddressWithData(
        $telephone, $streetAddress, $city, $state, $postalCode,
        $country, $useAsMyDefaultBillingAddress, $useAsMyDefaultShippingAddress
    )
    {
        $this->clientAddsNewAddressWithData(
            $telephone, $streetAddress, $city, $state, $postalCode,
            $country, $useAsMyDefaultBillingAddress, $useAsMyDefaultShippingAddress
        );
    }

    /**
     * @Then /^shipping address should be added$/
     */
    public function shippingAddressWithDataShouldBeAdded()
    {
        $firstName = $this->client->firstName;
        $lastName = $this->client->lastName;
        $telephone = $this->client->phone;
        $streetAddress = $this->client->streetAddress;
        $city = $this->client->city;
        $postalCode = $this->client->postalCode;
        $state = $this->client->state;
        $country = $this->client->country;
        $expectedResult = "$firstName $lastName $streetAddress $city, $state, $postalCode $country T: $telephone";
        $actualResult = $this->getAddressBookPage()->getTxtShippingAddress()->getText();
        \PHPUnit_Framework_Assert::assertEquals(
            'The address has been saved.',
            $this->getAddressBookPage()->getTxtAddressHasBeenSaved()->getText(),
            "Billing address has not been saved"
        );
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedResult,
            $actualResult,
            "Billing address is not added"
        );
    }

    /**
     * @When /^client adds new additional address entries with data: (.*), (.*), (.*), (.*), (.*), (.*), (.*), (.*)$/
     */
    public function clientAddsNewAdditionalAddressEntriesWithData(
        $telephone, $streetAddress, $city, $state, $postalCode, $country,
        $useAsMyDefaultBillingAddress, $useAsMyDefaultShippingAddress
    )
    {
        $this->getMyAccountLeftSideBar()->getLnkAddressBook()->click();
        $oldAddressesList = $this->getAddressBookPage()->getAdditionalAddressCount();
        $this->client->addressesCount = $oldAddressesList;
        $this->getAddressBookPage()->getBtnAddNewAddress()->click();
        if ($telephone == 'random') {
            $telephone = TestDataHelper::GetRandomPhoneNumber();
        }
        if ($streetAddress == 'random') {
            $streetAddress = TestDataHelper::GetRandomStreet();
        }
        if ($city == 'random') {
            $city = TestDataHelper::GetRandomCity();
        }
        if ($postalCode == 'random') {
            $postalCode = TestDataHelper::GetRandomPostIndex();
        }
        $this->getAddNewAddressPage()->fillForms(
            $telephone, $streetAddress, $city, $state, $postalCode,
            $country, $useAsMyDefaultBillingAddress, $useAsMyDefaultShippingAddress
        );
        $this->client->firstName = $this->getAddNewAddressPage()->getFldFirstName()->getValue();
        $this->client->lastName = $this->getAddNewAddressPage()->getFldLastName()->getValue();
        $this->client->phone = $this->getAddNewAddressPage()->getFldTelephone()->getValue();
        $this->client->streetAddress = $this->getAddNewAddressPage()->getFldStreetAddress()->getValue();
        $this->client->city = $this->getAddNewAddressPage()->getFldCity()->getValue();
        $this->client->postalCode = $this->getAddNewAddressPage()->getFldPostalCode()->getValue();
        $this->client->state = $state;
        $this->client->country = $country;
        $this->getAddNewAddressPage()->getBtnSaveAddress()->click();
    }

    /**
     * @Then /^additional address entries should be added$/
     */
    public function additionalAddressEntriesShouldBeAdded()
    {
        $expectedAddressList = $this->client->addressesCount + 1;
        $actualAddressList = $this->getAddressBookPage()->getAdditionalAddressCount();
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedAddressList,
            $actualAddressList,
            "Additional address entries is not added"
        );
        $firstName = $this->client->firstName;
        $lastName = $this->client->lastName;
        $telephone = $this->client->phone;
        $streetAddress = $this->client->streetAddress;
        $city = $this->client->city;
        $postalCode = $this->client->postalCode;
        $state = $this->client->state;
        $country = $this->client->country;
        $expectedResult = "$firstName $lastName $streetAddress $city, $state, $postalCode $country T: $telephone";
        $actualResult = $this->getAddressBookPage()->getAdditionalAddressByNumber($actualAddressList)->getText();
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedResult,
            $actualResult,
            "Wrong address"
        );
    }

    /**
     * @When /^client edits billing address with data: (.*), (.*), (.*), (.*), (.*), (.*)$/
     */
    public function clientEditsBillingAddressWithData(
        $telephone, $streetAddress, $city, $state, $postalCode, $country
    )
    {
        $this->getMyAccountLeftSideBar()->getLnkAddressBook()->click();
        $this->getAddressBookPage()->getLnkChangeBillingAddress()->click();
        if ($telephone == 'random') {
            $telephone = TestDataHelper::GetRandomPhoneNumber();
        }
        if ($streetAddress == 'random') {
            $streetAddress = TestDataHelper::GetRandomStreet();
        }
        if ($city == 'random') {
            $city = TestDataHelper::GetRandomCity();
        }
        if ($postalCode == 'random') {
            $postalCode = TestDataHelper::GetRandomPostIndex();
        }
        $this->getEditAddressPage()->fillForms(
            $telephone, $streetAddress, $city, $state, $postalCode, $country);
        $this->client->firstName = $this->getEditAddressPage()->getFldFirstName()->getValue();
        $this->client->lastName = $this->getEditAddressPage()->getFldLastName()->getValue();
        $this->client->phone = $this->getEditAddressPage()->getFldTelephone()->getValue();
        $this->client->streetAddress = $this->getEditAddressPage()->getFldStreetAddress()->getValue();
        $this->client->city = $this->getEditAddressPage()->getFldCity()->getValue();
        $this->client->postalCode = $this->getEditAddressPage()->getFldPostalCode()->getValue();
        $this->client->state = $state;
        $this->client->country = $country;
        $this->getEditAddressPage()->getBtnSaveAddress()->click();
    }

    /**
     * @Then /^billing address should be edited$/
     */
    public function billingAddressShouldBeEdited()
    {
        $firstName = $this->client->firstName;
        $lastName = $this->client->lastName;
        $telephone = $this->client->phone;
        $streetAddress = $this->client->streetAddress;
        $city = $this->client->city;
        $postalCode = $this->client->postalCode;
        $state = $this->client->state;
        $country = $this->client->country;
        $expectedResult = "$firstName $lastName $streetAddress $city, $state, $postalCode $country T: $telephone";
        $actualResult = $this->getAddressBookPage()->getTxtBillingAddress()->getText();
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedResult,
            $actualResult,
            "Billing address is not edited"
        );
        \PHPUnit_Framework_Assert::assertEquals(
            'The address has been saved.',
            $this->getAddressBookPage()->getTxtAddressHasBeenSaved()->getText(),
            "Changes has not been saved"
        );
    }

    /**
     * @When /^client edits shipping address with data: (.*), (.*), (.*), (.*), (.*), (.*)$/
     */
    public function clientEditsShippingAddressWithData(
        $telephone, $streetAddress, $city, $state, $postalCode, $country
    )
    {
        $this->getMyAccountLeftSideBar()->getLnkAddressBook()->click();
        $this->getAddressBookPage()->getLnkChangeShippingAddress()->click();
        if ($telephone == 'random') {
            $telephone = TestDataHelper::GetRandomPhoneNumber();
        }
        if ($streetAddress == 'random') {
            $streetAddress = TestDataHelper::GetRandomStreet();
        }
        if ($city == 'random') {
            $city = TestDataHelper::GetRandomCity();
        }
        if ($postalCode == 'random') {
            $postalCode = TestDataHelper::GetRandomPostIndex();
        }
        $this->getEditAddressPage()->fillForms(
            $telephone, $streetAddress, $city, $state, $postalCode, $country);
        $this->client->firstName = $this->getEditAddressPage()->getFldFirstName()->getValue();
        $this->client->lastName = $this->getEditAddressPage()->getFldLastName()->getValue();
        $this->client->phone = $this->getEditAddressPage()->getFldTelephone()->getValue();
        $this->client->streetAddress = $this->getEditAddressPage()->getFldStreetAddress()->getValue();
        $this->client->city = $this->getEditAddressPage()->getFldCity()->getValue();
        $this->client->postalCode = $this->getEditAddressPage()->getFldPostalCode()->getValue();
        $this->client->state = $state;
        $this->client->country = $country;
        $this->getEditAddressPage()->getBtnSaveAddress()->click();
    }

    /**
     * @Then /^shipping address should be edited$/
     */
    public function shippingAddressShouldBeEdited()
    {
        $firstName = $this->client->firstName;
        $lastName = $this->client->lastName;
        $telephone = $this->client->phone;
        $streetAddress = $this->client->streetAddress;
        $city = $this->client->city;
        $postalCode = $this->client->postalCode;
        $state = $this->client->state;
        $country = $this->client->country;
        $expectedResult = "$firstName $lastName $streetAddress $city, $state, $postalCode $country T: $telephone";
        $actualResult = $this->getAddressBookPage()->getTxtShippingAddress()->getText();
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedResult,
            $actualResult,
            "Billing address is not edited"
        );
        \PHPUnit_Framework_Assert::assertEquals(
            'The address has been saved.',
            $this->getAddressBookPage()->getTxtAddressHasBeenSaved()->getText(),
            "Changes has not been saved"
        );
    }

    /**
     * @When /^client edits additional address entries (.*) with data: (.*), (.*), (.*), (.*), (.*), (.*)$/
     */
    public function clientEditsAdditionalAddressEntriesWithData(
        $numberOfAddress, $telephone, $streetAddress, $city, $state, $postalCode, $country
    )
    {
        $this->getMyAccountLeftSideBar()->getLnkAddressBook()->click();

        $addressesCount = $this->getAddressBookPage()->getAdditionalAddressCount();

        if ($numberOfAddress == 'Last') {
            $this->getAddressBookPage()->getLnkEditAddressByNumber($addressesCount)->click();
        } else {
            $this->getAddressBookPage()->getLnkEditAddressByNumber($numberOfAddress)->click();
        }
        if ($telephone == 'random') {
            $telephone = TestDataHelper::GetRandomPhoneNumber();
        }
        if ($streetAddress == 'random') {
            $streetAddress = TestDataHelper::GetRandomStreet();
        }
        if ($city == 'random') {
            $city = TestDataHelper::GetRandomCity();
        }
        if ($postalCode == 'random') {
            $postalCode = TestDataHelper::GetRandomPostIndex();
        }
        $this->getEditAddressPage()->fillForms(
            $telephone, $streetAddress, $city, $state, $postalCode, $country);
        $this->client->firstName = $this->getEditAddressPage()->getFldFirstName()->getValue();
        $this->client->lastName = $this->getEditAddressPage()->getFldLastName()->getValue();
        $this->client->phone = $this->getEditAddressPage()->getFldTelephone()->getValue();
        $this->client->streetAddress = $this->getEditAddressPage()->getFldStreetAddress()->getValue();
        $this->client->city = $this->getEditAddressPage()->getFldCity()->getValue();
        $this->client->postalCode = $this->getEditAddressPage()->getFldPostalCode()->getValue();
        $this->client->state = $state;
        $this->client->country = $country;
        $this->getEditAddressPage()->getBtnSaveAddress()->click();
    }

    /**
     * @Then /^additional address entries (.*) should be edited$/
     */
    public function additionalAddressEntriesShouldBeEdited($numberOfAddress)
    {
        \PHPUnit_Framework_Assert::assertEquals(
            'The address has been saved.',
            $this->getAddressBookPage()->getTxtAddressHasBeenSaved()->getText(),
            "Changes has not been saved"
        );
        $firstName = $this->client->firstName;
        $lastName = $this->client->lastName;
        $telephone = $this->client->phone;
        $streetAddress = $this->client->streetAddress;
        $city = $this->client->city;
        $postalCode = $this->client->postalCode;
        $state = $this->client->state;
        $country = $this->client->country;
        $addressesCount = $this->getAddressBookPage()->getAdditionalAddressCount();

        if ($numberOfAddress == 'Last') {
            $expectedResult = "$firstName $lastName $streetAddress $city, $state, $postalCode $country T: $telephone";
            $actualResult = $this->getAddressBookPage()->getAdditionalAddressByNumber($addressesCount)->getText();
            \PHPUnit_Framework_Assert::assertEquals(
                $expectedResult,
                $actualResult, "Additional address entries is not edited");
        } else {
            $expectedResult = "$firstName $lastName $streetAddress $city, $state, $postalCode $country T: $telephone";
            $actualResult = $this->getAddressBookPage()->getAdditionalAddressByNumber($numberOfAddress)->getText();
            \PHPUnit_Framework_Assert::assertEquals(
                $expectedResult,
                $actualResult,
                "Additional address entries is not edited"
            );
        }
    }

    /**
     * @When /^client deletes address (.*)$/
     */
    public function clientDeletesAddress($numberAddress)
    {
        $oldAddressList = $this->getAddressBookPage()->getAdditionalAddressCount();
        $this->client->addressesCount = $oldAddressList;

        if ($numberAddress == 'Last') {
            $this->client->address = $this->getAddressBookPage()->getAdditionalAddressByNumber($oldAddressList)->getText();
            $this->getAddressBookPage()->getLnkDeleteAddressByNumber($oldAddressList)->click();
        } else {
            $this->client->address = $this->getAddressBookPage()->getAdditionalAddressByNumber($numberAddress)->getText();
            $this->getAddressBookPage()->getLnkDeleteAddressByNumber($numberAddress)->click();
        }
        $this->getAddressBookPage()->confirmPopup();
    }

    /**
     * @Then /^address (.*) should be deleted$/
     */
    public function addressShouldBeDeleted($numberAddress)
    {
        $expectedAddressList = $this->client->addressesCount - 1;
        $actualAddressList = $this->getAddressBookPage()->getAdditionalAddressCount();
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedAddressList,
            $actualAddressList,
            "No delete address"
        );
        if ($numberAddress == 'Last') {
            $numberAddress = $this->client->addressesCount - 1;
        }
        if ($this->getAddressBookPage()->txtNoAddressesIsPresent()) {
            $result = True;
            \PHPUnit_Framework_Assert::assertTrue($result);
        } elseif ($this->getAddressBookPage()->getAdditionalAddressByNumber($numberAddress)->getText() == $this->client->address) {
            $result = False;
            \PHPUnit_Framework_Assert::assertTrue($result);
        }
    }

    /**
     * @Given /^address is added before with data:$/
     */
    public function addressIsAddedBeforeWithData(TableNode $table)
    {
        foreach ($table as $row) {
            $telephone = $row['telephone'];
            $streetAddress = $row['streetAddress'];
            $city = $row['city'];
            $state = $row['state'];
            $postalCode = $row['postalCode'];
            $country = $row['country'];
            $useAsMyDefaultBillingAddress = $row['useAsMyDefaultBillingAddress'];
            $useAsMyDefaultShippingAddress = $row['useAsMyDefaultShippingAddress'];

            if ($telephone == 'random') {
                $telephone = TestDataHelper::GetRandomPhoneNumber();
            }
            if ($streetAddress == 'random') {
                $streetAddress = TestDataHelper::GetRandomStreet();
            }
            if ($city == 'random') {
                $city = TestDataHelper::GetRandomCity();
            }
            if ($postalCode == 'random') {
                $postalCode = TestDataHelper::GetRandomPostIndex();
            }
            $this->getPage('AddressBookPage')->open();
            $this->getAddressBookPage()->getBtnAddNewAddress()->click();
            $this->getAddNewAddressPage()->fillForms(
                $telephone, $streetAddress, $city, $state, $postalCode,
                $country, $useAsMyDefaultBillingAddress, $useAsMyDefaultShippingAddress
            );
            $this->getAddNewAddressPage()->getBtnSaveAddress()->click();
        }
    }

    /**
     * @When /^client subscribes to newsletter$/
     */
    public function clientSubscribesToNewsletter()
    {
        $this->getAccountDashboardPage()->getLnkEditNewsLetterSubscription()->click();
        $this->getNewsLetterSubscriptionPage()->getChkGeneralSubscription()->setValue('1');
        $this->getNewsLetterSubscriptionPage()->getbtnSave()->click();
    }

    /**
     * @Then /^client should be subscribed to newsletter$/
     */
    public function clientShouldBeSubscribedToNewsletter()
    {
        $expectedMessage = 'The subscription has been saved.';
        $actualMessage = $this->getAccountDashboardPage()->getTxtSubscriptionMessage()->getText();
        \PHPUnit_Framework_Assert::assertEquals($expectedMessage, $actualMessage);
        $expectedDescription = 'You are currently subscribed to \'General Subscription\'.';
        $actualDescription = $this->getAccountDashboardPage()->getTxtNewsletterSubscription()->getText();
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedDescription,
            $actualDescription,
            "Client has not been subscribed to newsletter"
        );
    }

    /**
     * @When /^client removes his subscription to newsletter$/
     */
    public function clientRemovesHisSubscriptionToNewsletter()
    {
        $this->getAccountDashboardPage()->getLnkEditNewsLetterSubscription()->click();
        $this->getNewsLetterSubscriptionPage()->getChkGeneralSubscription()->setValue('0');
        $this->getNewsLetterSubscriptionPage()->getbtnSave()->click();
    }

    /**
     * @Then /^subscription should be removed$/
     */
    public function subscriptionShouldBeRemoved()
    {
        $expectedMessage = 'The subscription has been removed.';
        $actualMessage = $this->getAccountDashboardPage()->getTxtSubscriptionMessage()->getText();
        \PHPUnit_Framework_Assert::assertEquals($expectedMessage, $actualMessage);
        $expectedDescription = 'You are currently not subscribed to any newsletter.';
        $actualDescription = $this->getAccountDashboardPage()->getTxtNewsletterSubscription()->getText();
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedDescription,
            $actualDescription,
            "Client has not been subscribed to newsletter"
        );
    }

    /**
     * @When /^client clicks to my account menu link (.*)$/
     */
    public function clientClicksToMyAccountMenuLink($linkName)
    {
        $this->getMyAccountLeftSideBar()->getLinkMenuByName($linkName)->click();
    }

    /**
     * @Then /^page with URL (.*) should be opened$/
     */
    public function pageWithUrlShouldBeOpened($url)
    {
        \PHPUnit_Framework_Assert::assertContains(
            $url,
            $this->getMyAccountLeftSideBar()->getSession()->getCurrentUrl(),
            "Wrong page"
        );
    }

    /**
     * @When /^client clicks to header menu link (.*)$/
     */
    public function clientClicksToHeaderMenuLink($linkName)
    {
        $this->getHeaderBlockElements()->getLnkHeaderMenuByName($linkName)->click();
    }

    /**
     * @When /^client clicks to shop submenu link (.*)$/
     */
    public function clientClicksToShopSubmenuLink($linkName)
    {
        $this->getHeaderBlockElements()->getLnkHeaderMenuByName('Shop')->mouseOver();
        if ($linkName == 'All Categories' || $linkName == 'Advanced Search' ||
            $linkName == 'Catalogs' || $linkName == 'Specials and Promotions '
        ) {
            $this->getHeaderBlockElements()->getLnkSubmenuStrongTagByName($linkName)->click();
        } else {
            $this->getHeaderBlockElements()->getLnkSubmenuByName($linkName)->click();
        }
    }

    /**
     * @When /^client clicks to franchise submenu link (.*)$/
     */
    public function clientClicksToFranchiseSubmenuLink($linkName)
    {
        $this->getHeaderBlockElements()->getLnkHeaderMenuByName('Franchise')->mouseOver();
        if ($linkName == 'Welcome') {
            $this->getHeaderBlockElements()->getLnkFranchiseSubmenuByName($linkName)->click();
        } elseif ($linkName == 'News') {
            $this->getHeaderBlockElements()->getLnkMeuItemNews()->click();
        } else {
            $this->getHeaderBlockElements()->getLnkSubmenuByName($linkName)->click();
        }
    }

    /**
     * @When /^client clicks to blog submenu link (.*)$/
     */
    public function clientClicksToBlogSubmenuLink($linkName)
    {
        $this->getHeaderBlockElements()->getLnkHeaderMenuByName('Blog')->mouseOver();
        if ($linkName == 'Franchising') {
            $this->getHeaderBlockElements()->getLnkMenuItemFranchising()->click();
        } else {
            $this->getHeaderBlockElements()->getLnkSubmenuByName($linkName)->click();
        }
    }

    /**
     * @When /^client clicks to footer menu link (.*)$/
     */
    public function clientClicksToFooterMenuLink($linkName)
    {
        if ($linkName == 'Check Order Status') {
            $this->getFooterBlockElements()->getLnkFooterMenuByName($linkName)->click();
            $this->getLoginOrCreateAnAccountPage()->getFldEmailAddress()->setValue('111@mailinator.com');
            $this->getLoginOrCreateAnAccountPage()->getFldPassword()->setValue('555555');
            $this->getLoginOrCreateAnAccountPage()->getChkRememberMe()->setValue('0');
            $this->getLoginOrCreateAnAccountPage()->getBtnLogin()->click();
        } else {
            $this->getFooterBlockElements()->getLnkFooterMenuByName($linkName)->click();
        }
    }

    /**
     * @When /^client enters invalid gift card code (.*) and captcha code (.*)$/
     */
    public function clientEntersInvalidGiftCardCodeAndCaptchaCode($giftCardCode, $captchaCode)
    {
        if ($giftCardCode == 'random') {
            $giftCardCode = TestDataHelper::GetRandomNumberCode();
        }

        if ($captchaCode == 'random') {
            $captchaCode = TestDataHelper::GetRandomCaptchaCode();
        }
        $this->getCheckGiftCardInformationPage()->fillForms($giftCardCode, $captchaCode);
        $this->getCheckGiftCardInformationPage()->getBtnCheckGiftCard()->click();
    }

    /**
     * @Then /^error message should be displayed$/
     */
    public function errorMessageShouldBeDisplayed()
    {
        $expectedResult = 'Captcha invalid';
        $actualResult = $this->getCheckGiftCardInformationPage()->getErrorMessage()->getText();
        \PHPUnit_Framework_Assert::assertEquals($expectedResult, $actualResult);
    }

    /**
     * @When /^client enters gift card amount (.*)$/
     */
    public function clientEntersGiftCardAmount($amount)
    {
        $this->item->name = $this->getElectronicGiftCardPage()->getTxtHeaderGiftCard()->getText();
        if ($amount == 'random') {
            $amount = TestDataHelper::GetRandomGiftCardAmount();
        }
        $this->getElectronicGiftCardPage()->getFldEnterAmount()->setValue($amount);
        $this->item->price = $this->getElectronicGiftCardPage()->getFldEnterAmount()->getValue();
    }

    /**
     * @Given /^client activates send gift card to friend checkbox (.*) and fill forms (.*), (.*), (.*)$/
     */
    public function clientActivatesSendGiftCardToFriendCheckboxAndFillForms($sendGiftCardToFriend, $recipientName, $recipientEmail, $customMessage)
    {
        if ($sendGiftCardToFriend == '1') {
            $this->getElectronicGiftCardPage()->getChkSendGiftCardToFriend()->click();
        }
        if ($recipientName == 'random') {
            $recipientName = TestDataHelper::GetRandomFirstName();
        }
        if ($recipientEmail == 'random') {
            $recipientEmail = TestDataHelper::GetRandomEmail();
        }
        $this->getElectronicGiftCardPage()->getFldRecipientName()->setValue($recipientName);
        $this->getElectronicGiftCardPage()->getFldRecipientEmail()->setValue($recipientEmail);
        $this->getElectronicGiftCardPage()->getFldCustomMessage()->setValue($customMessage);
        $this->client->firstName = $this->getElectronicGiftCardPage()->getFldRecipientName()->getValue();
        $this->client->emailAddress = $this->getElectronicGiftCardPage()->getFldRecipientEmail()->getValue();
    }

    /**
     * @Given /^client sets quantity (.*) of gift cards$/
     */
    public function clientSetsQuantityOfGiftCards($quantity)
    {
        $this->getElectronicGiftCardPage()->getFldQuantity()->setValue($quantity);
        $this->item->quantity = $quantity;
    }

    /**
     * @Given /^client adds gift card to cart$/
     */
    public function clientAddsGiftCardToCart()
    {
        $this->getElectronicGiftCardPage()->getBtnAddToCard()->click();
    }

    /**
     * @Then /^gift card should be displayed on the cart popup$/
     */
    public function giftCardShouldBeDisplayedOnTheCartPopup()
    {
        $this->itemShouldBeDisplayedOnTheCartPopup();
    }

    /**
     * @Given /^gift card with quantity, price, recipient data and custom message (.*) should be displayed$/
     */
    public function giftCardWithQuantityPriceAndRecipientDataShouldBeDisplayed($customMessage)
    {
        $this->getAddedToyToCartPopup()->getBtnGoToShoppingCart()->doubleClick();

        $shoppingCartPage = $this->getShoppingCartPage();
        $expectedItemName = $this->item->name;
        $actualItemName = $shoppingCartPage->getCartTable()->getCellTextLinkForRowContainsTextAndTh(
            $this->item->name, 'Product Name')->getText();
        $expectedItemPrice = $this->item->price;
        $actualItemPrice = $shoppingCartPage->getCartTable()->getCellSpanElementForRowContainsTextAndTh(
            $this->item->name, 'Unit Price')->getText();
        $expectedQuantity = $this->item->quantity;
        $actualQuantity = $shoppingCartPage->getCartTable()->getCellInputForRowContainsTextAndTh(
            $this->item->name, 'Qty')->getValue();
        $actualRecipientInfo = $shoppingCartPage->getCartTable()->getCellDlTextForRowContainsTextAndTh(
            $this->client->firstName, 'Product Name')->getText();
        $expectedRecipientInfo = "Recipient name " . $this->client->firstName . " Recipient email " .
            $this->client->emailAddress . " Custom message " . $customMessage;

        \PHPUnit_Framework_Assert::assertEquals(
            $expectedItemName,
            $actualItemName,
            "Wrong item name"
        );
        \PHPUnit_Framework_Assert::assertEquals(
            "$" . $expectedItemPrice,
            substr($actualItemPrice, 0, -3),
            "Wrong item price"
        );
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedQuantity,
            $actualQuantity,
            "Wrong quantity"
        );
        \PHPUnit_Framework_Assert::assertEquals(
            $expectedRecipientInfo,
            $actualRecipientInfo,
            "Recipient info does not match"
        );
    }


}