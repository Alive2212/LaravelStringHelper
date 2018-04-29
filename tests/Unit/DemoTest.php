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
        $stringHelper = $this->app->make("StringHelper");
        echo "\n\n I am most powerful man in Dokhan\n\n";
        $this->assertTrue(true);
    }
}
