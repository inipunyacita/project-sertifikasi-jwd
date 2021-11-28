<?php
// Load file koneksi.php
include "koneksi.php";
// Load file autoload.php
require 'vendor/autoload.php';
// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
$sheet->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai F1
$sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
$sheet->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
// Buat header tabel nya pada baris ke 3
$sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
$sheet->setCellValue('B3', "NAMA"); // Set kolom B3 dengan tulisan "NIS"
$sheet->setCellValue('C3', "NISN"); // Set kolom C3 dengan tulisan "NAMA"
$sheet->setCellValue('D3', "NILAI UN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$sheet->setCellValue('E3', "NILAI UAS"); // Set kolom E3 dengan tulisan "TELEPON"
$sheet->setCellValue('F3', "ALAMAT"); // Set kolom F3 dengan tulisan "ALAMAT"
$sheet->setCellValue('G3', "ASAL SEKOLAH");
$sheet->setCellValue('H3', "ID_STATUS");
$sheet->setCellValue('I3', "ID_USER");

// Buat query untuk menampilkan semua data siswa
$sql = mysqli_query($conn, "SELECT * 
FROM tb_regis INNER JOIN tb_regissiswa 
ON tb_regissiswa.id_status = tb_regis.id_status");
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$row = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
    $sheet->setCellValue('A' . $row, $no);
    $sheet->setCellValue('B' . $row, $data['nama_siswa']);
    $sheet->setCellValue('C' . $row, $data['nisn']);
    $sheet->setCellValue('D' . $row, $data['nilai_un']);
    $sheet->setCellValue('E' . $row, $data['nilai_uas']);
    $sheet->setCellValue('F' . $row, $data['alamat']);
    $sheet->setCellValue('G' . $row, $data['asal_sekolah']);
    $sheet->setCellValueExplicit('H' . $row, $data['status_siswa'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet->setCellValueExplicit('I' . $row, $data['id_user'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $no++; // Tambah 1 setiap kali looping
    $row++; // Tambah 1 setiap kali looping
}

$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
        ],
    ],
];

$sheet->getStyle('A1:I' . $row)->applyFromArray($styleArray);
$sheet->getColumnDimension('B')->setWidth(50);
$sheet->getColumnDimension('C')->setWidth(30);
$sheet->getColumnDimension('F')->setWidth(30);
$sheet->getColumnDimension('G')->setWidth(30);

$sheet->getStyle("A1:I1")->getFont()->setBold(true);
// Proses file excel
$writer = new Xlsx($spreadsheet);
$filename = 'Data-Calon-Siswa';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="' . $filename . '.xls"'); // Set nama file excel nya
header('Cache-Control: max-age=0');
$writer->save('php://output');
