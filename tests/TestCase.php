<?php

namespace Felpado\Tests;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function indexedCollectionProvider()
    {
        return $this->collectionDataProvider(array(
            4,
            5,
            'foo',
            'bar',
        ));
    }

    public function associativeCollectionProvider()
    {
        return $this->collectionDataProvider(array(
            'one' => 1,
            'two' => 2,
            4     => 'four',
            5     => 'five',
        ));
    }

    public function oneItemCollectionProvider()
    {
        return $this->collectionDataProvider(array(2));
    }

    public function emptyCollectionProvider()
    {
        return $this->collectionDataProvider(array());
    }

    protected function collectionDataProvider(array $array)
    {
        return array(
            array($array),
            array(new \ArrayObject($array)),
        );
    }
}