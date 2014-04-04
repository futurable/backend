<?php
namespace app\commands;

use Yii;
use app\commands\RemoveAccents;

class CreateTag
{
    /**
     * Takes a string and strips all non-alphanumerical characters
     * 
     * @param string $name
     * @return string $tag
     */
    public function createTagFromName($name){                  
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
    
    public function createBusinessID($prefix = false){
        require_once('CommonServices/createBusinessID.php');
        $createBusinessID = new createBusinessID(true);
        $businessID = $createBusinessID->run($prefix);
        
        return $businessID;
    }
    
    public function generatePassword($length = 8){
        $characters = array_merge( range('a','z'), range('A', 'Z'), range(1,9));
        $count = count($characters);
        $password = null;
        
        for($i=0; $i<$length; $i++){
            $rand = rand(0,$count-1);
            $password .= $characters[$rand];
        }
        
        return $password;
    }
}