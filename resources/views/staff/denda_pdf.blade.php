<!DOCTYPE html>
<html>
<head>
    <title>Laporan Denda</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
    </style>
</head>
<body>

<h2>Laporan Denda</h2>

<table>
    <thead>
        <tr>
            <th>User</th>
            <th>Alat</th>
            <th>Denda</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $p)
        <tr>
            <td>{{ $p->user->nama }}</td>
            <td>{{ $p->alat->nama }}</td>
            <td>Rp {{ number_format($p->denda, 0, ',', '.') }}</td>
            <td>{{ $p->status_denda }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>