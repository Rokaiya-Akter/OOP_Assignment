namespace App;

use App\AbstractUser;
use App\AuthInterface;
use App\LoggerTrait;
use App\DB;

class Admin extends AbstractUser implements AuthInterface {
    use LoggerTrait;

    public function userRole() {
        return "Admin";
    }

    public function login($email, $password) {
        $db = DB::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND role = 'admin'");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            $this->logActivity("Admin {$user['name']} logged in.");
            return true;
        }
        return false;
    }

    public function logout() {
        session_destroy();
        return true;
    }
}