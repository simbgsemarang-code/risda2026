<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['pass'];

    /** @return array<string, mixed>|null */
    public function authenticate(string $email, string $password): ?array
    {
        $user = $this->where('email', $email)->first();
        if (!is_array($user)) {
            return null;
        }

        $stored = (string) ($user['pass'] ?? '');
        $modernHash = password_get_info($stored)['algo'] !== null;
        $valid = $modernHash
            ? password_verify($password, $stored)
            : hash_equals($stored, sha1($password));

        if (!$valid) {
            return null;
        }

        // A successful legacy SHA-1 login is transparently upgraded.
        if (!$modernHash || password_needs_rehash($stored, PASSWORD_DEFAULT)) {
            $this->update($user['id'], ['pass' => password_hash($password, PASSWORD_DEFAULT)]);
        }

        return $user;
    }
}
