<?php
declare (strict_types=1);

namespace Php71count;

use PHPUnit\Framework\TestCase;
use function Php71count\php71_count;

class Php71CountTest extends TestCase
{
    /**
     * 
     * @param mixed $value
     * @param int $mode optional COUNT_NORMAL, COUNT_RECURSIVE
     * @return int
     */
    protected function phpNativeCount($value, int $mode = \COUNT_NORMAL): int
    {
        $errorReporting = error_reporting();
        error_reporting(0);
        $nativeResult = count($value, $mode);
        error_reporting($errorReporting);

        return $nativeResult;
    }

    public function testNull()
    {
        $nullVar = null;
        
        $nativeResult = $this->phpNativeCount($nullVar);
        $altResult = php71_count($nullVar);
        $this->assertSame($nativeResult, $altResult);
        
        $nativeRecursiveResult = $this->phpNativeCount($nullVar, \COUNT_RECURSIVE);
        $altRecursiveResult = php71_count($nullVar, \COUNT_RECURSIVE);        
        $this->assertSame($nativeRecursiveResult, $altRecursiveResult);
    }

    public function testInt()
    {
        $intVar = 128;
        
        $nativeResult = $this->phpNativeCount($intVar);
        $altResult = php71_count($intVar);
        $this->assertSame($nativeResult, $altResult);
        
        $nativeRecursiveResult = $this->phpNativeCount($intVar, \COUNT_RECURSIVE);
        $altRecursiveResult = php71_count($intVar, \COUNT_RECURSIVE);
        $this->assertSame($nativeRecursiveResult, $altRecursiveResult);
    }

    public function testBoolFalse()
    {
        $value = false;
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);
        $this->assertSame($nativeResult, $altResult);
        
        $nativeRecursiveResult = $this->phpNativeCount($value, \COUNT_RECURSIVE);
        $altRecursiveResult = php71_count($value, \COUNT_RECURSIVE);
        $this->assertSame($nativeRecursiveResult, $altRecursiveResult);
    }

    public function testBoolTrue()
    {
        $value = true;
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);
        $this->assertSame($nativeResult, $altResult);
        
        $nativeRecursiveResult = $this->phpNativeCount($value, \COUNT_RECURSIVE);
        $altRecursiveResult = php71_count($value, \COUNT_RECURSIVE);
        $this->assertSame($nativeRecursiveResult, $altRecursiveResult);
    }


    public function testArray()
    {
        $value = [10, 30];
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);
        $this->assertSame($nativeResult, $altResult); 
        
        $nativeRecursiveResult = $this->phpNativeCount($value, \COUNT_RECURSIVE);
        $altRecursiveResult = php71_count($value, \COUNT_RECURSIVE);
        $this->assertSame($nativeRecursiveResult, $altRecursiveResult);
    }

    public function testEmptyArray()
    {
        $value = [];
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);
        $this->assertSame($nativeResult, $altResult);
        
        $nativeRecursiveResult = $this->phpNativeCount($value, \COUNT_RECURSIVE);
        $altRecursiveResult = php71_count($value, \COUNT_RECURSIVE);
        $this->assertSame($nativeRecursiveResult, $altRecursiveResult);
    }


    public function testStdClass()
    {
        $value = new \stdClass();
        $value->foo = 1;
        $value->bar = new \ArrayObject([1, 256, 65536]);
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);
        $this->assertSame($nativeResult, $altResult);
        
        $nativeRecursiveResult = $this->phpNativeCount($value, \COUNT_RECURSIVE);
        $altRecursiveResult = php71_count($value, \COUNT_RECURSIVE);
        $this->assertSame($nativeRecursiveResult, $altRecursiveResult);
    }
    
    public function testStdRecursiveClass()
    {
        $value = new \stdClass();
        $value->foo = 1;
        $value->bar = new \ArrayObject([1, 256, 65536, $value]);
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);
        $this->assertSame($nativeResult, $altResult);
        
        
        $nativeRecursiveResult = $this->phpNativeCount($value, \COUNT_RECURSIVE);
        $altRecursiveResult = php71_count($value, \COUNT_RECURSIVE);
        $this->assertSame($nativeRecursiveResult, $altRecursiveResult);
    }

    public function testCountableClass()
    {
        $value = new \ArrayObject([1, 256, 65536]);
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);
        $this->assertSame($nativeResult, $altResult);
        
        $nativeRecursiveResult = $this->phpNativeCount($value, \COUNT_RECURSIVE);
        $altRecursiveResult = php71_count($value, \COUNT_RECURSIVE);
        $this->assertSame($nativeRecursiveResult, $altRecursiveResult);
    }

    public function testCallable()
    {
        $value = function ($aa) { return $aa; };
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);
        $this->assertSame($nativeResult, $altResult);
        
        $nativeRecursiveResult = $this->phpNativeCount($value, \COUNT_RECURSIVE);
        $altRecursiveResult = php71_count($value, \COUNT_RECURSIVE);
        $this->assertSame($nativeRecursiveResult, $altRecursiveResult);
    }
    
    public function testString()
    {
        $value = 'the quick brown fox jumps over the lazy dog.';
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);
        $this->assertSame($nativeResult, $altResult);
        
        $nativeRecursiveResult = $this->phpNativeCount($value, \COUNT_RECURSIVE);
        $altRecursiveResult = php71_count($value, \COUNT_RECURSIVE);
        $this->assertSame($nativeRecursiveResult, $altRecursiveResult);
    }
    
    
    public function testFloat()
    {
        $value = 3.1415926535;
        
        $nativeResult = $this->phpNativeCount($value);
        $altResult = php71_count($value);
        $this->assertSame($nativeResult, $altResult);
        
        $nativeRecursiveResult = $this->phpNativeCount($value, \COUNT_RECURSIVE);
        $altRecursiveResult = php71_count($value, \COUNT_RECURSIVE);
        $this->assertSame($nativeRecursiveResult, $altRecursiveResult);
    }
}
