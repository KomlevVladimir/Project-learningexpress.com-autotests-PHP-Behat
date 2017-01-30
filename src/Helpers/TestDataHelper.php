<?php

namespace src\Helpers;

use Faker;
class TestDataHelper
{
    public static function GetRandomEmail()
    {
        $faker = Faker\Factory::create();

        return $faker->email;
    }

    public static function GetRandomFirstName()
    {
        $faker = Faker\Factory::create();

        return $faker->firstName;
    }

    public static function GetRandomLastName()
    {
        $faker = Faker\Factory::create();

        return $faker->lastName;
    }

    public static function GetRandomCountry()
    {
        $faker = Faker\Factory::create();

        return $faker->country;
    }

    public static function GetRandomStreet()
    {
        $faker = Faker\Factory::create();

        return $faker->streetAddress;
    }

    public static function GetRandomCity()
    {
        $faker = Faker\Factory::create();

        return $faker->city;
    }

    public static function GetRandomPostIndex()
    {
        $faker = Faker\Factory::create();

        return $faker->postcode;
    }

    public static function GetRandomPhoneNumber()
    {
        $faker = Faker\Factory::create();

        return $faker->phoneNumber;
    }

    public static function GetRandomRegion()
    {
        $faker = Faker\Factory::create();

        return $faker->countryCode;
    }

    public static function GetRandomCaptchaCode()
    {
        $faker = Faker\Factory::create();

        return $faker->password;
    }

    public static function GetRandomNumberCode()
    {
        $faker = Faker\Factory::create();

        return $faker->numberBetween(111111111, 999999999);
    }

    public static function GetRandomGiftCardAmount()
    {
        $faker = Faker\Factory::create();

        return $faker->numberBetween(1, 25);
    }
}