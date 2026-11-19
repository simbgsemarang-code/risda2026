<?php

namespace App\Controllers;

use App\Models\MapModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Database;

/**
 * Public CI4 routes migrated from the legacy Welcome controller.
 * Database table names and field names are fixed allow-lists; they never come
 * directly from a request.
 */
class Welcome extends BaseController
{
    private const FILTERABLE_LAYERS = [
        'irigasi' => ['irigasi', 'MultiLineString'],
        'saluran_pembuang' => ['saluran_pembuang', 'MultiLineString'],
        'drainase' => ['drainase', 'MultiLineString'],
        'p_irigasi' => ['p_irigasi', 'Point'],
    ];

    /**
     * Legacy public URL retained for links that were published while the
     * application still used CI3. The digital map is the CI4 replacement and
     * contains the drainase layer and its searchable records.
     */
    public function drainase(): ResponseInterface
    {
        return redirect()->to(site_url('Welcome/digital') . '#drainase');
    }

    public function digital(): string
    {
        $map = model(MapModel::class);
        $inactive = 'nav-item nav-link';
        $active = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';

        $content = view('digital', [
            'c' => [$inactive, $inactive, $inactive, $inactive, $inactive, $active, $inactive, $inactive, $inactive],
            'Judul' => '',
            'kecamatan1' => $map->options('kecamatan', ['id', 'KECAMATAN'], null, null),
            'uptd1' => $map->options('uptd', ['id', 'uptd'], null, null),
            'bendung1' => Database::connect()->table('bendung')->select('id_di, NAMA_DI')->distinct()->orderBy('NAMA_DI', 'ASC')->get()->getResult(),
            'drainase1' => $map->options('drainase', ['id', 'NAMAOBJ'], null, null),
            'pembuang1' => $map->options('saluran_pembuang', ['id', 'nama_saluran'], null, null),
            'pelengkap' => $map->options('pelengkap_pembuang', ['id', 'NAME'], null, null),
            'airbaku1' => $map->options('sumur', ['id', 'SumberDana'], null, null),
        ]);

        return view('layouts/main', [
            'c' => [$inactive, $inactive, $inactive, $inactive, $inactive, $active, $inactive, $inactive, $inactive],
            'visitorTotal' => 0,
            'content' => $content,
        ]);
    }

    public function layer_di(string $name): ResponseInterface
    {
        if (!isset(DigitalMap::LAYERS[$name])) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Layer tidak ditemukan.']);
        }

        [$table, $geometry] = DigitalMap::LAYERS[$name];
        return $this->jsonFeatures($table, $geometry);
    }

    public function cari(string $keyword = 'semua'): string
    {
        $keyword = trim(rawurldecode($keyword));
        $builder = Database::connect()->table('bendung')->select('id_di, NAMA_DI')->distinct()->orderBy('NAMA_DI', 'ASC')->limit(20);
        if ($keyword !== '' && mb_strtolower($keyword) !== 'semua') {
            $builder->like('NAMA_DI', $keyword, 'both');
        }

        return view('pencari', ['temp_data' => $builder->get()->getResult()]);
    }

    public function cari_di(string $id): ResponseInterface
    {
        return $this->jsonFeatures('bendung', 'Point', 'id_di', $id);
    }

    public function cari_iri(string $id, string $layer, string $unused = ''): ResponseInterface
    {
        if (!isset(self::FILTERABLE_LAYERS[$layer])) {
            return $this->response->setStatusCode(400)->setJSON(['message' => 'Layer tidak valid.']);
        }

        [$table, $geometry] = self::FILTERABLE_LAYERS[$layer];
        return $this->jsonFeatures($table, $geometry, 'id', $id);
    }

    public function cari_pel(string $id): ResponseInterface
    {
        return $this->jsonFeatures('pelengkap_pembuang', 'Point', 'id', $id);
    }

    public function cari_desa1(string $kecamatanId): string
    {
        return $this->optionHtml('desa', 'id_kecamatan', $kecamatanId, 'id', 'DESA');
    }

    public function cari_kemantren1(string $uptd): string
    {
        return $this->optionHtml('kemantren', 'uptd', $uptd, 'id', 'kemantren');
    }

    public function cari_di_desa(string $desaId): string
    {
        return $this->optionHtml('bendung', 'id_desa', $desaId, 'id_di', 'NAMA_DI', true);
    }

    public function cari_di_kemantren(string $kemantrenId): string
    {
        return $this->optionHtml('bendung', 'id_kemantren', $kemantrenId, 'id_di', 'NAMA_DI', true);
    }

    public function cari_irigasi(string $diId): string
    {
        return $this->optionHtml('irigasi', 'id_di', $diId, 'id', 'NAMA');
    }

    public function cari_pirigasi(string $diId): string
    {
        return $this->optionHtml('p_irigasi', 'id_di', $diId, 'id', 'NAMA');
    }

    public function buku_petunjuk(): string|ResponseInterface
    {
        $session = session();
        $now = time();
        $unlockedAt = (int) $session->get('buku_petunjuk_unlocked_at');
        $unlocked = $unlockedAt > 0 && ($now - $unlockedAt) < 7200;
        $error = '';

        if ($this->request->getMethod() === 'POST' && !$unlocked) {
            $token = (string) $this->request->getPost('buku_token');
            $sessionToken = (string) $session->get('buku_petunjuk_token');
            $blockedUntil = (int) $session->get('buku_petunjuk_blocked_until');

            if ($blockedUntil > $now) {
                $error = 'Terlalu banyak percobaan. Silakan tunggu sebentar.';
            } elseif ($sessionToken === '' || !hash_equals($sessionToken, $token)) {
                $error = 'Sesi formulir tidak valid. Silakan muat ulang halaman.';
            } elseif (password_verify((string) $this->request->getPost('password'), '$2y$10$79nTQaTB2pUeUmXl4uAkDO56srlnUusAFb4R3buGjjqTLVx/d1ZLi')) {
                $session->regenerate(true);
                $session->set('buku_petunjuk_unlocked_at', $now);
                $session->remove(['buku_petunjuk_attempts', 'buku_petunjuk_blocked_until', 'buku_petunjuk_token']);
                return redirect()->to(site_url('Welcome/buku_petunjuk'));
            } else {
                $attempts = (int) $session->get('buku_petunjuk_attempts') + 1;
                if ($attempts >= 5) {
                    $session->set('buku_petunjuk_blocked_until', $now + 60);
                    $attempts = 0;
                }
                $session->set('buku_petunjuk_attempts', $attempts);
                $error = 'Password yang dimasukkan salah.';
            }
        }

        $token = '';
        if (!$unlocked) {
            $token = bin2hex(random_bytes(32));
            $session->set('buku_petunjuk_token', $token);
        }

        $inactive = 'nav-item nav-link';
        $active = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
        return view('layouts/main', [
            'c' => [$inactive, $inactive, $inactive, $inactive, $inactive, $inactive, $inactive, $active, $inactive],
            'visitorTotal' => 0,
            'content' => view('buku_petunjuk', compact('unlocked', 'error', 'token') + ['buku_token' => $token]),
        ]);
    }

    public function manual_book(): ResponseInterface
    {
        $unlockedAt = (int) session()->get('buku_petunjuk_unlocked_at');
        if ($unlockedAt < 1 || (time() - $unlockedAt) >= 7200) {
            session()->remove('buku_petunjuk_unlocked_at');
            return redirect()->to(site_url('Welcome/buku_petunjuk'));
        }

        $file = WRITEPATH . 'private/Manual-Book.pdf';
        if (!is_readable($file)) {
            return $this->response->setStatusCode(404)->setBody('Buku petunjuk tidak tersedia.');
        }

        return $this->response
            ->download($file, null)
            ->setFileName('Manual-Book-RISDA.pdf')
            ->setHeader('Content-Type', 'application/pdf')
            ->setHeader('Content-Disposition', 'inline; filename="Manual-Book-RISDA.pdf"')
            ->setHeader('Cache-Control', 'private, no-store, max-age=0')
            ->setHeader('X-Content-Type-Options', 'nosniff')
            ->setHeader('X-Frame-Options', 'SAMEORIGIN');
    }

    public function login(): string
    {
        $rows = Database::connect()->table('bendung')->select('NAMA_DI')->limit(600)->get()->getResultArray();
        $captchaValues = array_values(array_filter(array_map(
            static fn (array $row): string => preg_replace('/\\s+/', '', (string) ($row['NAMA_DI'] ?? '')) ?? '',
            $rows
        )));
        $captcha = $captchaValues === [] ? strtoupper(bin2hex(random_bytes(3))) : $captchaValues[array_rand($captchaValues)];
        session()->set('login_captcha', $captcha);

        return view('layouts/main', [
            'c' => array_fill(0, 9, 'nav-item nav-link'),
            'visitorTotal' => 0,
            'content' => view('admin_login', ['alert' => (string) session()->getFlashdata('login_error'), 'captcha' => $captcha]),
        ]);
    }

    private function jsonFeatures(string $table, string $geometry, ?string $field = null, mixed $value = null): ResponseInterface
    {
        return $this->response
            ->setHeader('Cache-Control', $field === null ? 'public, max-age=300' : 'private, max-age=120')
            ->setJSON(model(MapModel::class)->geoJsonFeatures($table, $geometry, $field, $value));
    }

    private function optionHtml(string $table, string $whereColumn, string $whereValue, string $valueColumn, string $labelColumn, bool $appendRefresh = false): string
    {
        $rows = Database::connect()->table($table)
            ->select([$valueColumn, $labelColumn])
            ->where($whereColumn, $whereValue)
            ->orderBy($labelColumn, 'ASC')
            ->get()
            ->getResultArray();

        $html = '';
        foreach ($rows as $row) {
            $html .= '<option value="' . esc((string) $row[$valueColumn], 'attr') . '">' . esc((string) $row[$labelColumn]) . '</option>';
        }
        return $appendRefresh ? $html . '<option value="SEMAU">REFRESH</option>' : $html;
    }
}
