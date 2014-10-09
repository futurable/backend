<?php

namespace common\components;

class AccessRule extends \yii\filters\AccessRule
{
    private $rights = ['user'=>10, 'instructor'=>20, 'manager'=>30, 'admin'=>40];
    
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role === '?' && $user->getIsGuest()) {
                return true;
            } elseif ($role === '@' && !$user->getIsGuest()) {
                return true;
            } elseif (!$user->getIsGuest()) {
                // user is not guest, let's check his role (or do something else)
                if ($this->rights[$role] === $user->identity->role) {
                    return true;
                }
            }
        }
        return false;
    }
}

?>