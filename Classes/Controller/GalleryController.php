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
 * Controller for the Gallery object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

// TODO: As your extension matures, you should use Tx_Extbase_MVC_Controller_ActionController as base class, instead of the ScaffoldingController used below.
class Tx_MfGallery_Controller_GalleryController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * @var Tx_MfGallery_Domain_Repository_GalleryRepository
	 */
	protected $galleryRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
		$this->galleryRepository = t3lib_div::makeInstance('Tx_MfGallery_Domain_Repository_GalleryRepository');
	}
	/**
	 * List action for this controller. Displays all Galleries.
	 */
	public function indexAction() {
		$galleries = $this->galleryRepository->findAll();
		$this->view->assign('galleries', $galleries);
	}

	/**
	 * Action that displays a single Gallery
	 *
	 * @param Tx_MfGallery_Domain_Model_Gallery $gallery The Gallery to display
	 */
	public function showAction(Tx_MfGallery_Domain_Model_Gallery $gallery) {
		
		$photos = array();
		$handle = opendir($gallery->getSrc());
		while ($file = readdir ($handle)) {
			if($file != "." && $file != "..") {
				$compl = $gallery->getSrc()."/".$file;
				array_push($photos, $compl);
			}
		}
		closedir($handle);
		$this->view->assign('gallery', $gallery);
		$this->view->assign('photos', $photos);
	}

	/**
	 * Displays a form for creating a new Gallery
	 *
	 * @param Tx_MfGallery_Domain_Model_Gallery $newGallery A fresh Gallery object taken as a basis for the rendering
	 * @dontvalidate $newGallery
	 */
	public function newAction(Tx_MfGallery_Domain_Model_Gallery $newGallery = NULL) {
		$this->view->assign('newGallery', $newGallery);
	}

	/**
	 * Creates a new Gallery and forwards to the index action.
	 *
	 * @param Tx_MfGallery_Domain_Model_Gallery $newGallery A fresh Gallery object which has not yet been added to the repository
	 */
	public function createAction(Tx_MfGallery_Domain_Model_Gallery $newGallery) {
		$this->galleryRepository->add($newGallery);
		$this->flashMessageContainer->add('Your new Gallery was created.');
		$this->redirect('index');
	}

	/**
	 * Displays a form to edit an existing Gallery
	 *
	 * @param Tx_MfGallery_Domain_Model_Gallery $gallery The Gallery to display
	 * @dontvalidate $gallery
	 */
	public function editAction(Tx_MfGallery_Domain_Model_Gallery $gallery) {
		$this->view->assign('gallery', $gallery);
	}

	/**
	 * Updates an existing Gallery and forwards to the index action afterwards.
	 *
	 * @param Tx_MfGallery_Domain_Model_Gallery $gallery The Gallery to display
	 */
	public function updateAction(Tx_MfGallery_Domain_Model_Gallery $gallery) {
		$this->galleryRepository->update($gallery);
		$this->flashMessageContainer->add('Your Gallery was updated.');
		$this->redirect('index');
	}

	/**
	 * Deletes an existing Gallery
	 *
	 * @param Tx_MfGallery_Domain_Model_Gallery $gallery The Gallery to be deleted
	 */
	public function deleteAction(Tx_MfGallery_Domain_Model_Gallery $gallery) {
		$this->galleryRepository->remove($gallery);
		$this->flashMessageContainer->add('Your Gallery was removed.');
		$this->redirect('index');
	}
	

	
}
?>