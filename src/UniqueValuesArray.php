<?php

declare( strict_types = 1 );
namespace WaughJ\UniqueValuesArray
{
	class UniqueValuesArray
	{
		public function __construct( array $list )
		{
			$this->list = self::removeDuplicates( $list );
		}

		public function add( $new_value ) : UniqueValuesArray
		{
			return new UniqueValuesArray( array_merge( $this->getList(), [ $new_value ] ) );
		}

		public function remove( $value ) : UniqueValuesArray
		{
			$list = $this->list;
			$list_count = count( $list );
			for ( $i = 0; $i < $list_count; $i++ )
			{
				if ( $list[ $i ] === $value )
				{
					unset( $list[ $i ] );
					$list = array_values( $list ); // Since we've unset value, we need to resort array so there are no index holes.
					break; // Since we don't allow duplicates, we only need to check for value once.
				}
			}
			return new UniqueValuesArray( $list );
		}

		public function getList() : array
		{
			return $this->list;
		}

		private static function removeDuplicates( array $list ) : array
		{
			$new_list = [];
			foreach ( $list as $item )
			{
				if ( !in_array( $item, $new_list ) )
				{
					$new_list[] = $item;
				}
			}
			return $new_list;
		}

		private $list;
	}
}
