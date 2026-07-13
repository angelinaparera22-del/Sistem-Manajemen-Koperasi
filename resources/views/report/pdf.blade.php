<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Keuangan Koperasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            margin: 0;
            padding: 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .text-end {
            text-align: right;
        }
        .fw-bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>KOPERASI SIMPAN PINJAM</h2>
        <p>Laporan Keuangan Kumulatif</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th colspan="2">1. Arus Kas Simpanan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total Setoran Masuk</td>
                <td class="text-end">Rp {{ number_format($totalDeposit, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total Penarikan Keluar</td>
                <td class="text-end">Rp {{ number_format($totalWithdrawal, 0, ',', '.') }}</td>
            </tr>
            <tr class="fw-bold">
                <td>Saldo Simpanan Akhir</td>
                <td class="text-end">Rp {{ number_format($saldoSimpanan, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th colspan="2">2. Arus Kas Pinjaman & Angsuran</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total Pencairan Pinjaman</td>
                <td class="text-end">Rp {{ number_format($totalLoanDisbursed, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total Cicilan Pokok & Bunga Masuk</td>
                <td class="text-end">Rp {{ number_format($totalInstallmentPaid, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total Denda Keterlambatan Masuk</td>
                <td class="text-end">Rp {{ number_format($totalPenaltyPaid, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <p style="text-align: right; margin-top: 50px;">
        Dicetak pada: {{ $date }}
    </p>
</body>
</html>
