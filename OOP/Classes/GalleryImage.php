<?php

/** GalleryImage.php
 *
 *@author: Daniel Swiatek
 *@email:	post@daniel-swiatek.de
 *
 **/

class GalleryImage extends Helper{
	
	
	
	public function GetComments(){
		
		$comments = Data::GetComments();
		$imageComments = array(); 
		foreach($comments as $item){
						
			if($this->GetUid()==$item['image_uid']){
				$imageComments[] = new GalleryImageComment($item);
			}
		}
		return $imageComments;
		
	}
}

?>