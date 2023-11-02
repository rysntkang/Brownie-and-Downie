<?php

class CreateUserProfileController extends UserProfileEntity
{
    public function createUserProfile($name, $description, $role) {
        $profile = new UserProfileEntity();
        $profile->set_profileName($name);
        $profile->set_description($description);
        $profile->set_role($role);

        $error = $profile->create();
        return $error;
    }
}
?>