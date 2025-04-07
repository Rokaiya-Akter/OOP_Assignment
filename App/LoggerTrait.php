namespace App;

trait LoggerTrait {
    public function logActivity($message) {
        echo "[LOG]: $message<br>";
    }
}