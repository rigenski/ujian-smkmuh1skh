<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function index()
    {
        return view("/index");
    }

    public function admin()
    {
        if (request()->has('query')) {
            $query = request('query');
            $data = Student::all();

            $students = Student::where("nama", "like", "%$query%")
                ->orWhere('nis', 'LIKE', '%' . $query . '%')
                ->orWhere('kelas', 'LIKE', '%' . $query . '%')
                ->paginate(36);
            $students->appends(['query' => $query]);
        } else {
            $students = Student::oldest()->paginate(36);
        }

        return view("/admin.index", compact('students'));
    }

    public function import()
    {

        Excel::import(new \App\Imports\StudentImport, request()->file('students_data'));

        return redirect('admin')->with('mess', 'Data berhasil diimport');
    }

    public function check()
    {

        if (Student::where('nis', request()->nis)->get()->count()) {
            $student = Student::where('nis', request()->nis)->get();
            $student = $student[0];
            if (Hash::check(request()->password, $student->password)) {
                if ($student->enable == 1) {

                    $bg = asset('/assets/img/bg-card.png');

                    $html = "
                    <html>
                    <head>
                    
                    </head>
                    <body>
                    <img src='" . $bg . "' />
                    </body>
                    </html>
                    ";


                    $mpdf = new Mpdf();
                    $mpdf->showImageErrors = true;
                    $mpdf->WriteHTML($html);
                    $mpdf->SetFont('Arial', 'B', 11);
                    $mpdf->SetXY(55, 20.5);
                    $mpdf->WriteCell(6.4, 0.4, 'KARTU PESERTA', 0, 'C');
                    $mpdf->SetXY(38, 25);
                    $mpdf->WriteCell(6.4, 0.4, 'PENILAIAN AKHIR SEMESTER GENAP', 0, 'C');
                    $mpdf->SetXY(37.5, 29.5);
                    $mpdf->WriteCell(6.4, 0.4, 'SMK MUHAMMADIYAH 1 SUKOHARJO', 0, 'C');
                    $mpdf->SetXY(44, 34);
                    $mpdf->WriteCell(6.4, 0.4, 'TAHUN PELAJARAN 2020/2021', 0, 'C');
                    $mpdf->SetFont('Arial', '', 10);
                    $mpdf->SetXY(18, 44);
                    $mpdf->WriteCell(4.4, 0.3, 'Nama Peserta', 0, 'L');
                    $mpdf->SetXY(46, 44);
                    $mpdf->WriteCell(4.4, 0.3, ':', 0, 'L');
                    $mpdf->SetXY(50, 44);
                    $mpdf->WriteCell(4.4, 0.3, $student->nama, 0, 'L');
                    $mpdf->SetXY(18, 49);
                    $mpdf->WriteCell(4.4, 0.3, 'Nomor Induk', 0, 'L');
                    $mpdf->SetXY(46, 49);
                    $mpdf->WriteCell(4.4, 0.3, ':', 0, 'L');
                    $mpdf->SetXY(50, 49);
                    $mpdf->WriteCell(4.4, 0.3, $student->nis, 0, 'L');
                    $mpdf->SetXY(18, 54);
                    $mpdf->WriteCell(4.4, 0.3, 'User / Pass', 0, 'L');
                    $mpdf->SetXY(46, 54);
                    $mpdf->WriteCell(4.4, 0.3, ':', 0, 'L');
                    $mpdf->SetXY(50, 54);
                    $mpdf->WriteCell(4.4, 0.3, $student->username_ujian . ' / ' . $student->password_ujian, 0, 'L');
                    $mpdf->SetXY(46, 59);
                    $mpdf->WriteCell(4.4, 0.3, ':', 0, 'L');
                    $mpdf->SetXY(50, 59);
                    $mpdf->WriteCell(4.4, 0.3, $student->kelas, 0, 'L');
                    $mpdf->SetXY(18, 64);
                    $mpdf->WriteCell(4.4, 0.3, 'Server / Sesi', 0, 'L');
                    $mpdf->SetXY(46, 64);
                    $mpdf->WriteCell(4.4, 0.3, ':', 0, 'L');
                    $mpdf->SetXY(50, 64);
                    $mpdf->WriteCell(4.4, 0.3, '1 / 1 ', 0, 'L');
                    $mpdf->Output('kartu ulangan - ' . $student->nama . '.pdf', 'I');
                    exit;

                    return redirect('/')->with('success', 'Data berhasil diunduh');
                }

                return redirect('/')->with('fail', 'Hubungi panitia untuk unduh kartu');
            }

            return redirect('/')->with('fail', 'Data yang dimasukkan salah');
        }

        return redirect('/')->with('fail', 'Data yang dimasukkan salah');
    }

    public function enable(Student $student)
    {
        // dd($student->enable);
        if ($student->enable == 0) {
            $student->update([
                'enable' => 1
            ]);

            return Redirect::back()->with('mess', $student->nama . ' telah aktif');
        } else {
            $student->update([
                'enable' => 0
            ]);

            return Redirect::back()->with('mess', $student->nama . ' telah non-aktif');
        }
    }
}
