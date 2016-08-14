<?php

namespace PhpSpreadsheet\Tests\Shared;

use PHPExcel\Shared\Date;

class DateTest extends \PHPUnit_Framework_TestCase
{
    public function testSetExcelCalendar()
    {
        $calendarValues = array(
            Date::CALENDAR_MAC_1904,
            Date::CALENDAR_WINDOWS_1900,
        );

        foreach ($calendarValues as $calendarValue) {
            $result = call_user_func(array(Date::class,'setExcelCalendar'), $calendarValue);
            $this->assertTrue($result);
        }
    }

    public function testSetExcelCalendarWithInvalidValue()
    {
        $unsupportedCalendar = '2012';
        $result = call_user_func(array(Date::class,'setExcelCalendar'), $unsupportedCalendar);
        $this->assertFalse($result);
    }

    /**
     * @dataProvider providerDateTimeExcelToTimestamp1900
     */
    public function testDateTimeExcelToTimestamp1900()
    {
        $result = call_user_func(
            array(Date::class,'setExcelCalendar'),
            Date::CALENDAR_WINDOWS_1900
        );

        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(array(Date::class, 'excelToTimestamp'), $args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerDateTimeExcelToTimestamp1900()
    {
        return include 'rawTestData/Shared/Date/ExcelToTimestamp1900.php';
    }

    /**
     * @dataProvider providerDateTimePHPToExcel1900
     */
    public function testDateTimePHPToExcel1900()
    {
        $result = call_user_func(
            array(Date::class,'setExcelCalendar'),
            Date::CALENDAR_WINDOWS_1900
        );

        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(array(Date::class,'PHPToExcel'), $args);
        $this->assertEquals($expectedResult, $result, null, 1E-5);
    }

    public function providerDateTimePHPToExcel1900()
    {
        return include 'rawTestData/Shared/Date/PHPToExcel1900.php';
    }

    /**
     * @dataProvider providerDateTimeFormattedPHPToExcel1900
     */
    public function testDateTimeFormattedPHPToExcel1900()
    {
        $result = call_user_func(
            array(Date::class,'setExcelCalendar'),
            Date::CALENDAR_WINDOWS_1900
        );

        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(array(Date::class,'formattedPHPToExcel'), $args);
        $this->assertEquals($expectedResult, $result, null, 1E-5);
    }

    public function providerDateTimeFormattedPHPToExcel1900()
    {
        return include 'rawTestData/Shared/Date/FormattedPHPToExcel1900.php';
    }

    /**
     * @dataProvider providerDateTimeExcelToTimestamp1904
     */
    public function testDateTimeExcelToTimestamp1904()
    {
        $result = call_user_func(
            array(Date::class,'setExcelCalendar'),
            Date::CALENDAR_MAC_1904
        );

        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(array(Date::class,'excelToTimestamp'), $args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerDateTimeExcelToTimestamp1904()
    {
        return include 'rawTestData/Shared/Date/ExcelToTimestamp1904.php';
    }

    /**
     * @dataProvider providerDateTimePHPToExcel1904
     */
    public function testDateTimePHPToExcel1904()
    {
        $result = call_user_func(
            array(Date::class,'setExcelCalendar'),
            Date::CALENDAR_MAC_1904
        );

        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(array(Date::class,'PHPToExcel'), $args);
        $this->assertEquals($expectedResult, $result, null, 1E-5);
    }

    public function providerDateTimePHPToExcel1904()
    {
        return include 'rawTestData/Shared/Date/PHPToExcel1904.php';
    }

    /**
     * @dataProvider providerIsDateTimeFormatCode
     */
    public function testIsDateTimeFormatCode()
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(array(Date::class,'isDateTimeFormatCode'), $args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerIsDateTimeFormatCode()
    {
        return include 'rawTestData/Shared/Date/FormatCodes.php';
    }

    /**
     * @dataProvider providerDateTimeExcelToTimestamp1900Timezone
     */
    public function testDateTimeExcelToTimestamp1900Timezone()
    {
        $result = call_user_func(
            array(Date::class,'setExcelCalendar'),
            Date::CALENDAR_WINDOWS_1900
        );

        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(array(Date::class,'excelToTimestamp'), $args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerDateTimeExcelToTimestamp1900Timezone()
    {
        return include 'rawTestData/Shared/Date/ExcelToTimestamp1900Timezone.php';
    }
}