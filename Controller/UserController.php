<?php
class UserController {
    protected $userModel;
    protected $referralModel;

    public function __construct($userModel, $referralModel) {
        $this->userModel = $userModel;
        $this->referralModel = $referralModel;
    }
    

    public function registerUser($username, $referral_code = null) {
        $new_referral_code = $this->generateReferralCode();
        try {
            $user_id = $this->userModel->createUser($username, $new_referral_code);

            $referrer_id = null;
            $points = 0;

            if ($referral_code) {
                $referrer = $this->userModel->getUserByReferralCode($referral_code);
                if ($referrer) {
                    $referrer_id = $referrer['id'];
                    $this->userModel->updateUserPoints($referrer_id, 50);
                    $this->referralModel->createReferral($referrer_id, $user_id);
                    $points = 50;
                }
            }

            if ($points > 0) {
                $this->userModel->updateUserPoints($user_id, $points);
            }

            return ['code' => $new_referral_code, 'error' => null];
        } catch (Exception $e) {
            return ['code' => null, 'error' => $e->getMessage()];
        }
    }

    private function generateReferralCode() {
        return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 10);
    }

    public function showAllUsers() {
        return $this->userModel->getAllUsers();
    }
}
