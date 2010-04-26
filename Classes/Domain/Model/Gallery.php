<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Martin Franke <erix@redix24.net>, redix24.net
*  			
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Gallery
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_MfGallery_Domain_Model_Gallery extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * src
	 * @var string
	 * @validate NotEmpty
	 */
	protected $src;
	
	/**
	 * title
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;
	
	/**
	 * width
	 * @var string
	 * @validate NotEmpty
	 */
	protected $width;
	
	/**
	 * description
	 * @var string
	 */
	protected $description;
	
	
	
	/**
	 * Setter for src
	 *
	 * @param string $src src
	 * @return void
	 */
	public function setSrc($src) {
		$this->src = $src;
	}

	/**
	 * Getter for src
	 *
	 * @return string src
	 */
	public function getSrc() {
		return $this->src;
	}
	
	/**
	 * Setter for title
	 *
	 * @param string $title title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Getter for title
	 *
	 * @return string title
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * Setter for width
	 *
	 * @param string $width width
	 * @return void
	 */
	public function setWidth($width) {
		$this->width = $width;
	}

	/**
	 * Getter for width
	 *
	 * @return string width
	 */
	public function getWidth() {
		return $this->width;
	}
	
	/**
	 * Setter for description
	 *
	 * @param string $description description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Getter for description
	 *
	 * @return string description
	 */
	public function getDescription() {
		return $this->description;
	}
	
}
?>