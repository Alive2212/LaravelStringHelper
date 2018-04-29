<?php

namespace Alive2212\LaravelStringHelper\Unit;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;
use PHPUnit\Framework\TestCase;

class DemoTest extends TestCase
{
    /**
     * @var string
     */
    private $PACKAGE_NAME = "LaravelStringHelper";

    /**
     * @var array
     */
    private $PACKAGE_CLASSES = [
        "StringHelper",
    ];

    protected $app;

    public function __construct()
    {
        parent::__construct();
        $this->createApplication();
    }

    public function createApplication()
    {
        $app = new Container();
        $app->bind('app', 'Illuminate\Container\Container');

        foreach ($this->PACKAGE_CLASSES as $PACKAGE_CLASS) {
            $app->bind($PACKAGE_CLASS, 'Alive2212\\'.$this->PACKAGE_NAME.'\\'.$PACKAGE_CLASS);
        }

        $this->app = $app;
        Facade::setFacadeApplication($app);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // create String Helper
        $stringHelper = $this->app->make("StringHelper");

        // check toTag method
        $this->assertTrue($stringHelper->toTag("TestCase")=="test_case");

        // upperFirstLetter
        $this->assertTrue($stringHelper->upperFirstLetter("testCase")=="TestCase");

        // lowerFirstLetter
        $this->assertTrue($stringHelper->lowerFirstLetter("TestCase")=="testCase");

        // toCamel
        $this->assertTrue($stringHelper->toCamel("test_case")=="testCase");

        // toPascal
        $this->assertTrue($stringHelper->toPascal("test_case")=="TestCase");
    }
}
