<?php

declare(strict_types=1);

namespace App\Tests;

use App\TwelveDaysOfChristmas;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TwelveDaysOfChristmas::class)]
class TwelveDaysOfChristmasTest extends TestCase
{
    public function testInvalidArguments() :void {
        $tdc = new TwelveDaysOfChristmas();
        $this->expectException(\InvalidArgumentException::class);
        $tdc->twelveDaysOfChristmas(0);
        $tdc->twelveDaysOfChristmas(13);
    }

    #[DataProvider('inputOutputMappingProvider')]
    public function testExhaustively(int $input, string $output): void
    {
        $tdc = new TwelveDaysOfChristmas();
        $this->assertEquals($output, $tdc->twelveDaysOfChristmas($input));
    }

    /**
     * @return array<array<int,string>>
     */
    public static function inputOutputMappingProvider(): array
    {
        return [
            [1, "On the first day of Christmas,\nMy true love gave to me:\nA partridge in a pear tree."],
            [2, "On the second day of Christmas,\nMy true love gave to me:\nTwo turtle doves,\nAnd a partridge in a pear tree."],
            [12, "On the twelfth day of Christmas,\nMy true love gave to me:\nTwelve drummers drumming,\nEleven pipers piping,\nTen lords a-leaping,\nNine ladies dancing,\nEight maids a-milking,\nSeven swans a-swimming,\nSix geese a-laying,\nFive golden rings,\nFour calling birds,\nThree French hens,\nTwo turtle doves,\nAnd a partridge in a pear tree."],
        ];
    }
}
