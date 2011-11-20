<?php

/**
 * Map
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    unramalak
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Map extends BaseMap
{
  /**
   * Return the cell where map should start
   * @return mixed
   */
	public function getStartingCell()
	{
	  return CellTable::getInstance()->find($this->getStartingCellId());
	}

  /**
   * Return the last cell to be generated
   * @param Point $point
   * @param $limit
   * @return Doctrine_Collection|mixed
   */
	public function getEndingCell(Point $point, $limit)
	{
	  $ending_point = new Point($point->getX() + $limit[0], $point->getY() + $limit[1]);
	  $ending_cell = CellTable::getInstance()->getCellByPosition($this->getId(), $ending_point);
	  
	  if(!$ending_cell){
	    $ending_cell = CellTable::getInstance()->getLastCell($this_>getId());
	  }
	  return $ending_cell;
	}
}