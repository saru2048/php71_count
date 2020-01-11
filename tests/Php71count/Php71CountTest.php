<?php
declare (strict_types=1);

namespace Php71count;

use PHPUnit\Framework\TestCase;
use function Php71count\php71_count;

class Php71CountTest extends TestCase
{
    protected function phpNativeCount($value): int
    {
        $errorReporting = error_reporting();
        error_reporting(0);
        $nativeResult = count($value);
        error_reporting($errorReporting);

        return $nativeResult;
    }

    public function testNull()
    {
        $nullVar = null;
        
        $nativeResult = $this->phpNativeCount($nullVar);
        $altResult = php71_count($nullVar);

        $this->assertSame($nativeResult, $altResult);
    }

    public function testInt()
    {
        $intVar = 128;
        
        $nativeResult = $this->phpNativeCount($intVar);
        $altResult = php71_count($intVar);

        $this->assertSame($nativeResult, $altResult);
    }

    public function testBoolFalse()
    {
        $value = false;
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);

        $this->assertSame($nativeResult, $altResult); 
    }

    public function testBoolTrue()
    {
        $value = true;
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);

        $this->assertSame($nativeResult, $altResult); 
    }


    public function testArray()
    {
        $value = [10, 30];
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);

        $this->assertSame($nativeResult, $altResult); 
    }

    public function testEmptyArray()
    {
        $value = [];
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);

        $this->assertSame($nativeResult, $altResult); 
    }


    public function testStdClass()
    {
        $value = new \stdClass();
        $value->foo = 1;
        $value->bar = new \ArrayObject([1, 256, 65536]);
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);

        $this->assertSame($nativeResult, $altResult); 
    }

    public function testCountableClass()
    {
        $value = new \ArrayObject([1, 256, 65536]);
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);

        $this->assertSame($nativeResult, $altResult); 
    }

    public function testCallable()
    {
        $value = function ($aa) { return $aa; };
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);

        $this->assertSame($nativeResult, $altResult); 
    }
}
