<?php
namespace common\commands;

use Yii;
use common\commands\RemoveAccents;

class CreateTag
{
	/**
	 * Takes a string and strips all non-alphanumerical characters
	 * 
	 * @param string $name
	 * @return string $tag
	 */
	public function CreateTagFromName($name){  
		// Name to lowercase
		$tag = strtolower($name);
		
		// Replace accented letters
		$RemoveAccents = new RemoveAccents($tag);
		$tag = $RemoveAccents->get();

		// Remove illegal characters
		$tag = preg_replace("/[^A-Za-z0-9]/", '', $tag);

		// Allow 16 characters or less
		$tag = substr($tag, 0, 16);

		return $tag;
	}
}