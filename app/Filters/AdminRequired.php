<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTPResponseInterface;

class AdminRequired implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $user = session()->get('user_id');
        if (!is_array($user) || empty($user['id'])) {
            session()->setFlashdata('login_error', 'Silakan masuk terlebih dahulu.');
            return redirect()->to(site_url('Welcome/login'));
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return $response;
    }
}
