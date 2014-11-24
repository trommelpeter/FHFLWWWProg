<?php
/** GalleryCollection.php
 *
 *@author: Daniel Swiatek
 *@email:	post@daniel-swiatek.de
 *
 **/
require_once 'Helper.php';

class GalleryCollection extends Helper
{
	
	public function Get(){
		$list =  Data::GetImagesData();
		$listobject = array();
		
		foreach($list as $item){
			$listobject[]= new GalleryImage($item);
		}
		return $listobject;
	}
}
?>