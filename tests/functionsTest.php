<?php

require_once 'src/functions.inc.php';

use function App\getMaxMin;

class functionsTest extends \PHPUnit\Framework\TestCase
{

    protected $testArray;

    /**
     * Set up and tear down testing variables before and after each test
     */
    protected function setUp(): void
    {
        $this->testArray = array(
            "Programming" => 54,
            "Cloud Computing" => 85,
            "Computing Foundations" => 64,
            "Databases" => 64,
            "Web Development" => 64,
            "Software Engineering" => 64,
            "Data Analysis" => 95,
            "User Experience" => 85,
        );
    }

    public function testMaxMin()
    {

        $maxMin = App\getMaxMin($this->testArray);
        $result = "MAX MODULE/S: Data Analysis = 95\r\nMIN MODULE/S: Programming = 54";

        $this->assertIsString($maxMin);
        $this->assertSame($result, $maxMin);
    }
}
