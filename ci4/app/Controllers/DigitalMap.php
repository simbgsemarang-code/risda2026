<?php

namespace App\Controllers;

use App\Models\MapModel;
use CodeIgniter\HTTP\ResponseInterface;

class DigitalMap extends BaseController
{
    private const LAYERS = [
        'kecamatan'           => ['kecamatan', 'MultiPolygon'],
        'desa'                => ['desa', 'MultiPolygon'],
        'uptd'                => ['uptd', 'MultiPolygon'],
        'bendung'             => ['bendung', 'Point'],
        'irigasi'             => ['irigasi', 'MultiLineString'],
        'p_irigasi'           => ['p_irigasi', 'Point'],
        'sawah'               => ['sawah', 'MultiPolygon'],
        'drainase'            => ['drainase', 'MultiLineString'],
        'saluran_pembuang'    => ['saluran_pembuang', 'MultiLineString'],
        'pelengkap_pembuang'  => ['pelengkap_pembuang', 'Point'],
        'sumur'               => ['sumur', 'Point'],
    ];

    public function layer(string $name): ResponseInterface
    {
        if (!array_key_exists($name, self::LAYERS)) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Layer tidak ditemukan.']);
        }

        [$table, $geometryType] = self::LAYERS[$name];
        $features = model(MapModel::class)->geoJsonFeatures($table, $geometryType);

        return $this->response
            ->setHeader('Cache-Control', 'public, max-age=300')
            ->setJSON($features);
    }
}
