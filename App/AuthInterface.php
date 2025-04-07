namespace App;

interface AuthInterface {
    public function login($email, $password);
    public function logout();
}
