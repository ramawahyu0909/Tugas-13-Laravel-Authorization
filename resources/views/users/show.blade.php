
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pengguna</title>
</head>
<body>
    <h2>Detail Pengguna</h2>

    <p><strong>Nama:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>

    <a href="{{ route('users.index') }}">Kembali ke Daftar Pengguna</a>
</body>
</html>
