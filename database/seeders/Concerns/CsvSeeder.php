<?php

namespace Database\Seeders\Concerns;

use Illuminate\Support\Facades\DB;

trait CsvSeeder
{
    /**
     * Importa un CSV (delimitado por ;) y lo inserta en la tabla indicada.
     * $map: ['destino' => 'columna_csv']
     * $transform: callback opcional fn(array $row, array $raw): array|null
     */
    protected function importCsv(string $filename, string $table, array $map, ?callable $transform = null, bool $timestamps = true): void
    {
        $path = database_path('seeders/data/' . $filename);
        if (!is_file($path)) {
            return;
        }

        $handle = fopen($path, 'r');
        if ($handle === false) {
            return;
        }

        $header = fgetcsv($handle, 0, ';');
        if ($header === false) {
            fclose($handle);
            return;
        }

        // Limpia BOM y espacios en encabezados
        $header = array_map(function ($h) {
            $h = ltrim($h, "\xEF\xBB\xBF");
            return trim($h);
        }, $header);

        $rows = [];
        while (($data = fgetcsv($handle, 0, ';')) !== false) {
            if ($data === [null] || $data === false) {
                continue;
            }
            $raw = array_combine($header, $data);
            if ($raw === false) {
                continue;
            }
            $row = [];
            foreach ($map as $to => $from) {
                $row[$to] = $raw[$from] ?? null;
            }
            if ($transform) {
                $row = $transform($row, $raw);
                if ($row === null) {
                    continue;
                }
            }
            $rows[] = $row;
        }

        fclose($handle);

        if (empty($rows)) {
            return;
        }

        if ($timestamps) {
            $now = now();
            foreach ($rows as &$r) {
                $r['created_at'] = $r['created_at'] ?? $now;
                $r['updated_at'] = $r['updated_at'] ?? $now;
            }
            unset($r);
        }

        foreach (array_chunk($rows, 1000) as $chunk) {
            DB::table($table)->insert($chunk);
        }
    }
}
