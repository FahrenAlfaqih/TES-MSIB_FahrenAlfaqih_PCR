<?php
class UserModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($username, $referral_code) {
        try {
            // Check if username already exists
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
            $stmt->execute([$username]);
            if ($stmt->fetchColumn() > 0) {
                throw new Exception('Username already exists.');
            }

            // Insert new user with timestamp
            $stmt = $this->db->prepare("INSERT INTO users (username, referral_code, created_at) VALUES (?, ?, NOW())");
            $stmt->execute([$username, $referral_code]);
            return $this->db->lastInsertId();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getUserByReferralCode($code) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE referral_code = ?");
        $stmt->execute([$code]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUserPoints($id, $points) {
        $stmt = $this->db->prepare("UPDATE users SET points = points + ? WHERE id = ?");
        $stmt->execute([$points, $id]);
    }

    public function getAllUsers() {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}
