<?php

namespace src\Steps;

use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use src\Pages\FrontPages\MainPage;
use src\Pages\FrontPages\CatalogAdvancedSearchPage;
use src\Pages\FrontPages\ShopPage;
use src\Pages\FrontPages\PageElements\LeftSidebarBlockElements;
use src\Pages\FrontPages\CatalogSearchPage;
use src\Pages\FrontPages\PageElements\ProductsListElements;
use src\Pages\FrontPages\ItemPage;
use src\Pages\FrontPages\AddedToyToCartPopup;
use src\Pages\FrontPages\Shop\BabyBoutiquePage;
use src\Pages\FrontPages\ShoppingCartPage;
use src\Pages\FrontPages\Shop\ActiveToysPage;
use src\Pages\FrontPages\Shop\FashionPage;
use src\Pages\FrontPages\Shop\DevelopmentalToysPage;
use src\Pages\FrontPages\Shop\ArtAndCraftsPage;
use src\Pages\FrontPages\Shop\ToddlerToysPage;
use src\Pages\FrontPages\Shop\PuzzleAndGamesPage;
use src\Pages\FrontPages\PageElements\HeaderBlockElements;
use src\Pages\FrontPages\LoginOrCreateAnAccountPage;
use src\Pages\FrontPages\MyAccount\AccountDashboardPage;
use src\Pages\FrontPages\LogoutSuccessPage;
use src\Pages\FrontPages\AddProductToWishlistPopup;
use src\Pages\FrontPages\WishlistPage;
use src\Pages\FrontPages\Shop\PretendPlayPage;
use src\Pages\FrontPages\EditItemPage;
use src\Pages\FrontPages\Shop\BooksPage;
use src\Pages\FrontPages\MyAccount\EditAccountInformationPage;
use src\Pages\FrontPages\MyAccount\ChangePasswordPage;
use src\Pages\FrontPages\PageElements\MyAccountLeftSideBar;
use src\Pages\FrontPages\MyAccount\AddressBookPage;
use src\Pages\FrontPages\MyAccount\AddNewAddressPage;
use src\Pages\FrontPages\MyAccount\EditAddressPage;
use src\Pages\FrontPages\MyAccount\NewsLetterSubscriptionPage;
use src\Pages\FrontPages\PageElements\FooterBlockElements;

class BaseContext extends PageObjectContext
{
    /**
     * @return MainPage
     */
    public function getMainPage()
    {
        return $this->getPage("MainPage");
    }

    /**
     * @return CatalogAdvancedSearchPage
     */
    public function getCatalogAdvancedSearchPage()
    {
        return $this->getPage("CatalogAdvancedSearchPage");
    }

    /**
     * @return ShopPage
     */
    public function getShopPage()
    {
        return $this->getPage("ShopPage");
    }

    /**
     * @return LeftSidebarBlockElements
     */
    public function getLeftSidebarBlockElements()
    {
        return $this->getPage("LeftSidebarBlockElements");
    }

    /**
     * @return CatalogSearchPage
     */
    public function getCatalogSearchPage()
    {
        return $this->getPage("CatalogSearchPage");
    }

    /**
     * @return ProductsListElements
     */
    public function getProductsListElements()
    {
        return $this->getPage("ProductsListElements");
    }

    /**
     * @return ItemPage
     */
    public function getItemPage()
    {
        return $this->getPage("ItemPage");
    }

    /**
     * @return AddedToyToCartPopup
     */
    public function getAddedToyToCartPopup()
    {
        return $this->getPage("AddedToyToCartPopup");
    }

    /**
     * @return BabyBoutiquePage
     */
    public function getBabyBoutiquePage()
    {
        return $this->getPage("BabyBoutiquePage");
    }

    /**
     * @return ShoppingCartPage
     */
    public function getShoppingCartPage()
    {
        return $this->getPage("ShoppingCartPage");
    }

    /**
     * @return ActiveToysPage
     */
    public function getActiveToysPage()
    {
        return $this->getPage("ActiveToysPage");
    }

    /**
     * @return FashionPage
     */
    public function getFashionPage()
    {
        return $this->getPage("FashionPage");
    }

    /**
     * @return DevelopmentalToysPage
     */
    public function getDevelopmentalToysPage()
    {
        return $this->getPage("DevelopmentalToysPage");
    }

    /**
     * @return ArtAndCraftsPage
     */
    public function getArtAndCraftsPage()
    {
        return $this->getPage("ArtAndCraftsPage");
    }

    /**
     * @return ToddlerToysPage
     */
    public function getToddlerToysPage()
    {
        return $this->getPage("ToddlerToysPage");
    }

    /**
     * @return PuzzleAndGamesPage
     */
    public function getPuzzleAndGamesPage()
    {
        return $this->getPage("PuzzleAndGamesPage");
    }

    /**
     * @return HeaderBlockElements
     */
    public function getHeaderBlockElements()
    {
        return $this->getPage("HeaderBlockElements");
    }

    /**
     * @return LoginOrCreateAnAccountPage
     */
    public function getLoginOrCreateAnAccountPage()
    {
        return $this->getPage("LoginOrCreateAnAccountPage");
    }

    /**
     * @return AccountDashboardPage
     */
    public function getAccountDashboardPage()
    {
        return $this->getPage("AccountDashboardPage");
    }

    /**
     * @return LogoutSuccessPage
     */
    public function getLogoutSuccessPage()
    {
        return $this->getPage("LogoutSuccessPage");
    }

    /**
     * @return AddProductToWishlistPopup
     */
    public function getAddProductToWishlistPopup()
    {
        return $this->getPage("AddProductToWishlistPopup");
    }

    /**
     * @return WishlistPage
     */
    public function getWishlistPage()
    {
        return $this->getPage("WishlistPage");
    }

    /**
     * @return PretendPlayPage
     */
    public function getPretendPlayPage()
    {
        return $this->getPage("PretendPlayPage");
    }

    /**
     * @return EditItemPage
     */
    public function getEditItemPage()
    {
        return $this->getPage("EditItemPage");
    }

    /**
     * @return BooksPage
     */
    public function getBooksPage()
    {
        return $this->getPage("BooksPage");
    }

    /**
     * @return EditAccountInformationPage
     */
    public function getEditAccountInformationPage()
    {
        return $this->getPage("EditAccountInformationPage");
    }

    /**
     * @return ChangePasswordPage
     */
    public function getChangePasswordPage()
    {
        return $this->getPage("ChangePasswordPage");
    }

    /**
     * @return MyAccountLeftSideBar
     */
    public function getMyAccountLeftSideBar()
    {
        return $this->getPage("MyAccountLeftSideBar");
    }

    /**
     * @return AddressBookPage
     */
    public function getAddressBookPage()
    {
        return $this->getPage("AddressBookPage");
    }

    /**
     * @return AddNewAddressPage
     */
    public function getAddNewAddressPage()
    {
        return $this->getPage("AddNewAddressPage");
    }

    /**
     * @return EditAddressPage
     */
    public function getEditAddressPage()
    {
        return $this->getPage("EditAddressPage");
    }

    /**
     * @return NewsLetterSubscriptionPage
     */
    public function getNewsLetterSubscriptionPage()
    {
        return $this->getPage("NewsLetterSubscriptionPage");
    }

    /**
     * @return FooterBlockElements
     */
    public function getFooterBlockElements()
    {
        return $this->getPage("FooterBlockElements");
    }

}