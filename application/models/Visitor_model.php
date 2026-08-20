<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitor_model extends CI_Model
{
    private function ensure_table()
    {
        if ($this->db->table_exists('site_visitors')) {
            return;
        }

        $this->db->query(
            'CREATE TABLE IF NOT EXISTS `site_visitors` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `visitor_hash` CHAR(64) NOT NULL,
                `visited_at` DATETIME NOT NULL,
                PRIMARY KEY (`id`),
                UNIQUE KEY `visitor_hash_unique` (`visitor_hash`),
                KEY `visited_at_index` (`visited_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
    }

    public function record_and_count()
    {
        $this->ensure_table();

        if (!$this->session->userdata('site_visitor_counted')) {
            $sessionId = session_id();
            if ($sessionId === '') {
                $sessionId = $this->input->ip_address() . '|' . (string) $this->input->user_agent();
            }

            $secret = (string) $this->config->item('encryption_key');
            $visitorHash = hash('sha256', $sessionId . '|' . $secret);
            $this->db->query(
                'INSERT IGNORE INTO `site_visitors` (`visitor_hash`, `visited_at`) VALUES (?, ?)',
                array($visitorHash, date('Y-m-d H:i:s'))
            );
            $this->session->set_userdata('site_visitor_counted', true);
        }

        return (int) $this->db->count_all('site_visitors');
    }
}
