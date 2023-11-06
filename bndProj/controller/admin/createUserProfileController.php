<?php

class CreateUserProfileController extends UserProfileEntity
{
    public function createUserProfile($profileName, $description, $role) {
        $profile = new UserProfileEntity();
        $profile->set_profileName($profileName);
        $profile->set_description($description);
        $profile->set_role($role);

        $error = $profile->create();
        return $error;
    }
}
?>