<?php

declare(strict_types=1);

namespace App;

class TwelveDaysOfChristmas
{
    public function twelveDaysOfChristmas(int $day): string
    {
        if ($day < 1 || $day > 12) {
            throw new \InvalidArgumentException("There are only between 1 and 12 days of Christmas you dummy.");
        }

        $formatter = new \NumberFormatter('en_GB', \NumberFormatter::SPELLOUT);
        $formatter->setTextAttribute(\NumberFormatter::DEFAULT_RULESET, "%spellout-ordinal");

        $firstTwoLines = "on the " . $formatter->format($day) . " day of Christmas,\nmy true love gave to me:\n";

        return implode(
            "\n",
            array_map(
                'ucfirst',
                explode(
                    "\n",
                    $firstTwoLines . $this->recursiveVerseGenerator($day)
                )
            )
        );
    }

    private function recursiveVerseGenerator(int $day): string
    {
        $map = [
            1 => "a partridge in a pear tree.",
            2 => "two turtle doves,\nand ",
            3 => "three French hens,\n",
            4 => "four calling birds,\n",
            5 => "five golden rings,\n",
            6 => "six geese a-laying,\n",
            7 => "seven swans a-swimming,\n",
            8 => "eight maids a-milking,\n",
            9 => "nine ladies dancing,\n",
            10 => "ten lords a-leaping,\n",
            11 => "eleven pipers piping,\n",
            12 => "twelve drummers drumming,\n",
        ];

        switch ($day) {
            case 1:
                return $map[$day];
            default:
                return $map[$day] . $this->recursiveVerseGenerator($day - 1);
        }
    }
}
