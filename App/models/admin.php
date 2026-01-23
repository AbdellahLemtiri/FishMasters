<?php
class Admin {
    private $id;
    private $name;
    private $email;
    private $password;
    private $db; 

    public function __construct($db) {
        $this->db = $db;
    }

    // Login admin
    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM admins WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            return true;
        }
        return false;
    }

    public function logout() {
        session_destroy();
    }

    public function updateProfile($data) {
        $stmt = $this->db->prepare("UPDATE admins SET name = :name, email = :email WHERE id = :id");
        return $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'id' => $this->id
        ]);
    }
}
?>