<?php

class ReferralModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createReferral($referrer_id, $new_user_id) {
        $stmt = $this->db->prepare("INSERT INTO referrals (referrer_id, new_user_id) VALUES (?, ?)");
        $stmt->execute([$referrer_id, $new_user_id]);
    }
}
