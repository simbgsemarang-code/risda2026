<?php

namespace App\Models;

use CodeIgniter\Model;

class VisitorModel extends Model
{
    protected $table            = 'site_visitors';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['visitor_hash', 'visited_at'];
    protected $useTimestamps    = false;

    public function recordAndCount(): int
    {
        $db = $this->db;
        if (! $db->tableExists($this->table)) {
            $forge = \Config\Database::forge();
            $forge->addField([
                'id' => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
                'visitor_hash' => ['type' => 'CHAR', 'constraint' => 64],
                'visited_at' => ['type' => 'DATETIME'],
            ]);
            $forge->addKey('id', true);
            $forge->addUniqueKey('visitor_hash');
            $forge->addKey('visited_at');
            $forge->createTable($this->table, true);
        }

        $session = session();
        if (! $session->get('site_visitor_counted')) {
            $sessionId = session_id() ?: service('request')->getIPAddress();
            $hash = hash('sha256', $sessionId . '|' . (string) config('Encryption')->key);
            $db->table($this->table)->ignore(true)->insert([
                'visitor_hash' => $hash,
                'visited_at'   => date('Y-m-d H:i:s'),
            ]);
            $session->set('site_visitor_counted', true);
        }

        return $db->table($this->table)->countAllResults();
    }
}
