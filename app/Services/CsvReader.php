<?php

namespace App\Services;

class CsvReader
{

    /**
     * @param string $filename
     * @param string $delimiter
     * @return array|bool
     */
    public function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 100000, $delimiter)) !== false) {
                if (!$header) {
                    $header = ['start_ip', 'end_ip', 'start_number_ip', 'end_number_ip', 'code', 'country'];
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }

}
