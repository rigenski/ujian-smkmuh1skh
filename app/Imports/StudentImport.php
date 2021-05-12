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
        foreach ($collection as $key => $row) {
            if ($key >= 1) {
                Student::create([
                    'nis' => $row[0],
                    'password' => bcrypt($row[1]),
                    'nama' => $row[2],
                    'kelas' => $row[3],
                    'username_ujian' => $row[4],
                    'password_ujian' => $row[5]
                ]);
            }
        }
    }
}
