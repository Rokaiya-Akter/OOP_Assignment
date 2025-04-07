namespace App;

use App\AuthInterface;

class AuthService {
    public function authenticate(AuthInterface $user, $email, $password) {
        return $user->login($email, $password);
    }
}
