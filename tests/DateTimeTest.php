<?php
use PHPUnit\Framework\TestCase;

class DateTimeTest extends TestCase
{
    public function testDateTimeCreation()
    {
        $dateTime = new DateTime('2023-10-01');
        $this->assertInstanceOf(DateTime::class, $dateTime);
    }

    public function testDateTimeFormat()
    {
        $dateTime = new DateTime('2023-10-01');
        $this->assertEquals('2023-10-01', $dateTime->format('Y-m-d'));
    }

    public function testDateTimeAdd()
    {
        $dateTime = new DateTime('2023-10-01');
        $dateTime->add(new DateInterval('P1D'));
        $this->assertEquals('2023-10-02', $dateTime->format('Y-m-d'));
    }
}