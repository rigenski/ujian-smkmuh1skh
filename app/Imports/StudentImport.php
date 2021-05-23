<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Student;

class StudentImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if ($row[0] !== null && gettype($row[0]) !== 'string') {
                Student::create([
                    'nis' => $row[1],
                    'password' => bcrypt($row[1] . strval($row[3])),
                    'nama' => $row[2],
                    'kelas' => $row[4],
                    'username_ujian' => $row[5],
                    'password_ujian' => $row[6],
                    'enable' => $row[7]
                ]);
            }
        }
    }
}
