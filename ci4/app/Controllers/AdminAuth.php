<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class AdminAuth extends BaseController
{
    public function authentication(): RedirectResponse
    {
        if (!$this->request->is('post')) {
            return redirect()->to(site_url('Welcome/login'));
        }

        $session = session();
        $now = time();
        if ((int) $session->get('login_blocked_until') > $now) {
            return $this->failure('Terlalu banyak percobaan. Silakan tunggu sebentar.');
        }

        $captcha = trim((string) $this->request->getPost('cap'));
        $expected = (string) $session->get('login_captcha');
        $session->remove('login_captcha');
        if ($expected === '' || !hash_equals($expected, $captcha)) {
            return $this->recordFailure('Captcha salah. Silakan coba lagi.');
        }

        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('pass');
        if ($email === '' || $password === '') {
            return $this->failure('Email dan kata sandi wajib diisi.');
        }

        $user = model(UserModel::class)->authenticate($email, $password);
        if ($user === null) {
            return $this->recordFailure('Username atau password salah.');
        }

        $session->regenerate(true);
        $session->set('user_id', [
            'id' => $user['id'],
            'nama_user' => $user['nama'] ?? '',
            'bidang' => $user['bidang'] ?? '',
            'foto' => $user['file_foto'] ?? '',
        ]);
        $session->remove(['login_attempts', 'login_blocked_until']);
        return redirect()->to(site_url('Admin/Index'));
    }

    public function sign_out(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to(site_url('Welcome/login'));
    }

    private function recordFailure(string $message): RedirectResponse
    {
        $session = session();
        $attempts = (int) $session->get('login_attempts') + 1;
        if ($attempts >= 5) {
            $session->set('login_blocked_until', time() + 60);
            $attempts = 0;
        }
        $session->set('login_attempts', $attempts);
        return $this->failure($message);
    }

    private function failure(string $message): RedirectResponse
    {
        session()->setFlashdata('login_error', $message);
        return redirect()->to(site_url('Welcome/login'));
    }
}
