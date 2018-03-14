<?php
/**
 * This file is part of the BEAR.Package package.
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace BEAR\Package;

use PHPUnit\Framework\TestCase;

class CompilerTest extends TestCase
{
    public function testInvoke()
    {
        $compiledFile1 = __DIR__ . '/Fake/fake-app/var/tmp/prod-cli-app/__FakeVendor_HelloWorld_Resource_Page_Index-.php';
        $compiledFile2 = __DIR__ . '/Fake/fake-app/var/tmp/prod-cli-app/FakeVendor_HelloWorld_Resource_Page_Index-';
        $compiledFile3 = __DIR__ . '/Fake/fake-app/var/tmp/prod-cli-app/FakeVendor_HelloWorld_Resource_Page_Index-.php'; // php7.1 Ray.Compiler v1.1.7
        @unlink($compiledFile1);
        @unlink($compiledFile2);
        @unlink($compiledFile3);
        (new Compiler)->__invoke('FakeVendor\HelloWorld', 'prod-cli-app', __DIR__ . '/Fake/fake-app');
        $this->assertTrue(file_exists($compiledFile1) || file_exists($compiledFile2) || $compiledFile3);
    }
}
