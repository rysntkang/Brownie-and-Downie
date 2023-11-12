<?php

class CreateUserProfileController extends UserProfileEntity
{
    public function createUserProfile($profileName, $description, $role, $activated) {
        $profile = new UserProfileEntity();
        $profile->set_profileName($profileName);
        $profile->set_description($description);
        $profile->set_role($role);
        $profile->set_activated($activated);

        $error = $profile->create();
        return $error;
    }
}
?>