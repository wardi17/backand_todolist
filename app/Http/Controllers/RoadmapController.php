<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Exception;

class RoadmapController extends Controller
{
    // Data roadmap
    protected $roadmap = [
        ["BULAN 1–2: Upgrade Backend → Laravel + REST API", "Minggu 1–2", [
            "Install Laravel & buat project pertama",
            "Pelajari routing, controller, dan model dasar",
            "Buat fitur CRUD sederhana (contoh: data produk)"
        ]],
        ["", "Minggu 3–4", [
            "Pelajari migration, seeder, dan relasi tabel",
            "Pelajari konsep MVC Laravel",
            "Tambahkan fitur autentikasi (Login/Register)"
        ]],
        ["", "Minggu 5–6", [
            "Buat REST API (GET, POST, PUT, DELETE)",
            "Gunakan Postman untuk testing API",
            "Simpan data ke SQL Server via Laravel (atau MySQL jika lebih mudah)"
        ]],
        ["BULAN 3–4: Buat Portofolio Project #1 (Dashboard Penjualan)", "Minggu 7–8", [
            "Rancang UI dashboard (pakai Bootstrap atau React jika siap)",
            "Buat halaman login + role admin"
        ]],
        ["", "Minggu 9–10", [
            "Tambahkan halaman CRUD produk, pelanggan, dan transaksi",
            "Tambahkan fitur filter tanggal + search"
        ]],
        ["", "Minggu 11–12", [
            "Tambahkan grafik penjualan (Chart.js)",
            "Export laporan ke PDF dan Excel"
        ]],
        ["BULAN 5–6: Upgrade Frontend (React + Tailwind CSS)", "Minggu 13–14", [
            "Belajar dasar React (component, props, state)",
            "Buat UI form dan list dari dummy data"
        ]],
        ["", "Minggu 15–16", [
            "Fetch data dari REST API Laravel",
            "Buat form input dan update via API"
        ]],
        ["", "Minggu 23–24", [
            "Tambahkan notifikasi email saat booking",
            "Deploy app ke web (pakai Netlify/Vercel/Render)"
        ]],
        ["BULAN 9–10: Bangun Personal Branding & Apply Kerja", "Minggu 25–26", [
            "Perbaiki profil LinkedIn (isi lengkap, pakai kata kunci yang relevan)",
            "Upload semua project ke GitHub dengan README menarik"
        ]],
        ["", "Minggu 27–28", [
            "Buat CV PDF modern (gunakan Canva/FlowCV)",
            "Gabung ke grup kerja remote: Discord, Telegram, LinkedIn Jobs"
        ]],
        ["", "Minggu 29–30", [
            "Apply ke 5–10 lowongan/minggu (startup, remote, freelance)"
        ]],
        ["BULAN 11–12: Portofolio #3 + Negosiasi Gaji / Freelance", "Minggu 31–34", [
            "Buat mini project tambahan (pilih: sistem manajemen gudang / laporan keuangan / sistem inventory)",
            "Gunakan Laravel + React jika memungkinkan"
        ]],
        ["", "Minggu 35–36", [
            "Buat video demo project (pakai Loom atau OBS Studio)",
            "Kirim ke recruiter / perusahaan saat apply"
        ]],
        ["", "Minggu 37–40", [
            "Mulai negosiasi gaji / kontrak kerja",
            "Bangun koneksi + test freelance via Upwork/Fiverr"
        ]],
    ];

    public function export()
    {
       
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Roadmap Programmer');

        // Set header kolom
        $sheet->setCellValue('A1', 'Bulan');
        $sheet->setCellValue('B1', 'Minggu');
        $sheet->setCellValue('C1', 'Task Utama');

        $row = 2;
        $prevBulan = ''; // Inisialisasi awal

        foreach ($this->roadmap as $item) {
            $bulan = $item[0];
            $minggu = $item[1];
            $tasks = $item[2];

            if ($bulan === "") {
                $bulan = $prevBulan;
            } else {
                $prevBulan = $bulan;
            }

            foreach ($tasks as $task) {
                $sheet->setCellValue("A{$row}", $bulan);
                $sheet->setCellValue("B{$row}", $minggu);
                $sheet->setCellValue("C{$row}", $task);
                $row++;
            }
        }

        $writer = new Xlsx($spreadsheet);
        $filename = public_path("Roadmap_Programmer.xlsx");

        try {
            $writer->save($filename);
            return response()->download($filename)->deleteFileAfterSend(true);
        } catch (Exception $e) {
            return response()->json(['error' => 'Gagal menyimpan file: ' . $e->getMessage()], 500);
        }
    }
}
