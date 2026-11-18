<?php

namespace App\Models;

use CodeIgniter\Model;

class MapModel extends Model
{
    protected $DBGroup = 'default';

    /**
     * Builds a GeoJSON feature collection from a legacy spatial table.
     * Table and geometry type must originate from a controller allow-list.
     *
     * @return array<int, array<string, mixed>>
     */
    public function geoJsonFeatures(string $table, string $geometryType, ?string $field = null, mixed $value = null): array
    {
        $builder = $this->db->table($table);
        if ($field !== null) {
            $builder->where($field, $value);
        }

        $features = [];
        foreach ($builder->get()->getResultArray() as $row) {
            $coordinates = json_decode((string) ($row['geojson'] ?? ''), true);
            if (!is_array($coordinates)) {
                continue;
            }

            unset($row['geojson']);
            $features[] = [
                'type'       => 'Feature',
                'properties' => $row,
                'geometry'   => [
                    'type'        => $geometryType,
                    'coordinates' => $coordinates,
                ],
            ];
        }

        return $features;
    }
}
