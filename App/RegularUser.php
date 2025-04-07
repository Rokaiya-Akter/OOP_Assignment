namespace App;

use App\AbstractUser;
use App\AuthInterface;
use App\DB;

class RegularUser extends AbstractUser implements AuthInterface {
    public function userRole() {
        return "Regular";
    }

    public function login($email, $password) {
        $db = DB::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND role = 'regular'");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }

    public function logout() {
        session_destroy();
        return true;
    }
}