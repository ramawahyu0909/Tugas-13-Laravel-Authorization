
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 30px;
        }

        .container {
            background: white;
            padding: 25px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
        }

        h2 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button, a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #198754;
            color: white;
        }

        a {
            background: #6c757d;
            color: white;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Pengguna</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama</label>
        <input
            type="text"
            name="name"
            value="{{ old('name', $user->name) }}"
            required
        >

        <label>Email</label>
        <input
            type="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            required
        >

        <label>Password Baru</label>
        <input
            type="password"
            name="password"
            placeholder="Kosongkan jika tidak ingin mengubah password"
        >

        <label>Role</label>
        <select name="role" required>
            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                Admin
            </option>
            <option value="petugas" {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>
                Petugas
            </option>
        </select>

        <button type="submit">Simpan Perubahan</button>

        <a href="{{ route('users.index') }}">Kembali</a>
    </form>
</div>

</body>
</html>
