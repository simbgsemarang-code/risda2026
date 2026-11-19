<?php

namespace App\Controllers;

use App\Models\MapModel;
use CodeIgniter\Exceptions\PageNotFoundException;

/** Detail pages migrated without relying on database access inside views. */
class Detail extends BaseController
{
    private const SIMPLE_DETAILS = [
        'drainase' => ['drainase', 'MultiLineString', 'detail_drainase', 2],
        'pembuang' => ['saluran_pembuang', 'MultiLineString', 'detail_pembuang', 3],
        'p_pembuang' => ['pelengkap_pembuang', 'Point', 'detail_b_pembuang', 3],
        'air_baku' => ['sumur', 'Point', 'detail_air_baku', 4],
        'p_irigasi' => ['p_irigasi', 'Point', 'detail_p_irigasi', 1],
        'sawah' => ['sawah', 'MultiPolygon', 'detail_sawah', 1],
    ];

    public function drainase(string $id): string { return $this->simple('drainase', $id); }
    public function bendung(string $id): string { return $this->generic('bendung', 'Point', $id, 'Detail Bendung', 1); }
    public function irigasi(string $id): string { return $this->generic('irigasi', 'MultiLineString', $id, 'Detail Saluran Irigasi', 1); }
    public function pembuang(string $id): string { return $this->simple('pembuang', $id); }
    public function p_pembuang(string $id): string { return $this->simple('p_pembuang', $id); }
    public function air_baku(string $id): string { return $this->simple('air_baku', $id); }
    public function p_irigasi(string $id): string { return $this->simple('p_irigasi', $id); }
    public function sawah(string $id): string { return $this->simple('sawah', $id); }

    private function simple(string $kind, string $id): string
    {
        [$table, $geometry, $view, $activeIndex] = self::SIMPLE_DETAILS[$kind];
        $map = model(MapModel::class);
        $features = $map->geoJsonFeatures($table, $geometry, 'id', $id);
        if ($features === []) {
            throw PageNotFoundException::forPageNotFound();
        }

        $inactive = 'nav-item nav-link';
        $active = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
        $classes = array_fill(0, 9, $inactive);
        $classes[$activeIndex] = $active;
        $content = view($view, [
            'c' => $classes,
            'kecamatan' => $this->fragment($map->geoJsonFeatures('kecamatan', 'MultiPolygon')),
            'uptd' => $this->fragment($map->geoJsonFeatures('uptd', 'MultiPolygon')),
            'bendung' => $this->fragment($features),
            'bendung1' => $features[0]['properties'],
            'Judul' => '',
        ]);

        return view('layouts/main', ['c' => $classes, 'visitorTotal' => 0, 'content' => $content]);
    }

    /** Lightweight fallbacks for legacy detail screens that previously loaded every related layer. */
    private function generic(string $table, string $geometry, string $id, string $title, int $activeIndex): string
    {
        $feature = model(MapModel::class)->geoJsonFeatures($table, $geometry, 'id', $id)[0] ?? null;
        if ($feature === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $classes = array_fill(0, 9, 'nav-item nav-link');
        $classes[$activeIndex] = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';
        return view('layouts/main', [
            'c' => $classes,
            'visitorTotal' => 0,
            'content' => view('detail_generic', ['title' => $title, 'data' => $feature['properties']]),
        ]);
    }

    /** Legacy scripts interpolate comma-separated GeoJSON feature objects. */
    private function fragment(array $features): string
    {
        $json = json_encode($features, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return $json === '[]' ? '' : substr((string) $json, 1, -1);
    }
}
