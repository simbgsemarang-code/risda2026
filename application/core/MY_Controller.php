<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base controller for every authenticated administration endpoint.
 */
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $user = $this->session->userdata('user_id');
        if (!is_array($user) || empty($user['id'])) {
            $this->session->set_flashdata('login_error', 'Silakan masuk untuk melanjutkan.');
            redirect('Welcome/login');
            exit;
        }

        $this->output
            ->set_header('X-Content-Type-Options: nosniff')
            ->set_header('X-Frame-Options: SAMEORIGIN')
            ->set_header('Referrer-Policy: strict-origin-when-cross-origin')
            ->set_header('Permissions-Policy: geolocation=(self), camera=(), microphone=()');
    }

    /** Validate and store an uploaded image without trusting its original name. */
    protected function store_image($field, $directory, $maxBytes = 5242880)
    {
        if (empty($_FILES[$field]) || $_FILES[$field]['error'] === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        $file = $_FILES[$field];
        if ($file['error'] !== UPLOAD_ERR_OK || $file['size'] < 1 || $file['size'] > $maxBytes || !is_uploaded_file($file['tmp_name'])) {
            throw new RuntimeException('Berkas unggahan tidak valid atau terlalu besar.');
        }

        $allowed = array('image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp');
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);
        if (!isset($allowed[$mime]) || @getimagesize($file['tmp_name']) === false) {
            throw new RuntimeException('Hanya gambar JPG, PNG, atau WebP yang diperbolehkan.');
        }

        $directory = rtrim($directory, '/\\');
        if (!is_dir($directory) && !mkdir($directory, 0755, true)) {
            throw new RuntimeException('Folder unggahan tidak dapat dibuat.');
        }

        $name = bin2hex(random_bytes(16)) . '.' . $allowed[$mime];
        if (!move_uploaded_file($file['tmp_name'], $directory . DIRECTORY_SEPARATOR . $name)) {
            throw new RuntimeException('Berkas gagal disimpan.');
        }

        return $name;
    }
}
