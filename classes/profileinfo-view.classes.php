<?php

// class ProfileInfoView extends ProfileInfo {
     
//     public function fetchAbout(){
//         $profileInfo = $this->getProfileInfo($userId);

//         echo $profileInfo[0]["profiles_about"];
//     }
//     public function fetchTitle(){
//         $profileInfo = $this->getProfileInfo($userId);

//         echo $profileInfo[0]["profiles_introtitle"];
//     }
//     public function fetchText(){
//         $profileInfo = $this->getProfileInfo($userId);

//         echo $profileInfo[0]["profiles_introtext"];
//     }
// }


class ProfileInfoView extends ProfileInfo {

    public function fetchAbout($userId) { // Added $userId as a parameter
        $profileInfo = $this->getProfileInfo($userId);

        echo $profileInfo[0]["profiles_about"];
    }

    public function fetchTitle($userId) { // Added $userId as a parameter
        $profileInfo = $this->getProfileInfo($userId);

        echo $profileInfo[0]["profiles_introtitle"];
    }

    public function fetchText($userId) { // Added $userId as a parameter
        $profileInfo = $this->getProfileInfo($userId);

        echo $profileInfo[0]["profiles_introtext"];
    }
}




// class ProfileInfoView extends ProfileInfo {

//     public function fetchTitle($userId) {
//         $profileData = $this->getProfileInfo($userId);
        
//         if (!$profileData) {
//             echo "Title not found"; // Display a message if no data is found
//         } else {
//             echo $profileData['profiles_introtitle'];
//         }
//     }

//     public function fetchText($userId) {
//         $profileData = $this->getProfileInfo($userId);
        
//         if (!$profileData) {
//             echo "Text not found";
//         } else {
//             echo $profileData['profiles_introtext'];
//         }
//     }

//     public function fetchAbout($userId) {
//         $profileData = $this->getProfileInfo($userId);
        
//         if (!$profileData) {
//             echo "About not found";
//         } else {
//             echo $profileData['profiles_about'];
//         }
//     }

// }
