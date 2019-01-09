<?php

use PHPUnit\Framework\TestCase;
use WaughJ\UniqueValuesArray\UniqueValuesArray;

class UniqueValuesArrayTest extends TestCase
{
	public function testBasic()
	{
		$list = new UniqueValuesArray([ 'bread', 2, 'milk', 'bread', 'cheese' ]);
		$list = $list->add( 'corn' );
		$list = $list->add( 'milk' );
		$this->assertEquals( [ 'bread', 2, 'milk', 'cheese', 'corn' ], $list->getList() );
	}

	public function testRemove()
	{
		$list = new UniqueValuesArray([ 'bread', 2, 'milk', 'bread', 'cheese' ]);
		$list = $list->remove( 'milk' );
		$list = $list->remove( 'cookies' );
		$this->assertEquals( [ 'bread', 2, 'cheese' ], $list->getList() );
	}

	public function testAddList()
	{
		$list = new UniqueValuesArray([ 'bread', 2, 'milk', 'bread', 'cheese' ]);
		$list = $list->addList([ 'cookies', 'bread', 2, 'corn' ]);
		$this->assertEquals( [ 'bread', 2, 'milk', 'cheese', 'cookies', 'corn' ], $list->getList() );
	}

	public function testRemoveList()
	{
		$list = new UniqueValuesArray([ 'bread', 2, 'milk', 'bread', 'cheese' ]);
		$list = $list->removeList([ 'cookies', 'bread', 2, 'corn' ]);
		$this->assertEquals( [ 'milk', 'cheese' ], $list->getList() );
	}
}
