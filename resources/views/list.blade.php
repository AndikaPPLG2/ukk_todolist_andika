<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar list</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Gaya Mewah untuk Halaman Daftar Task */
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #8643bd, #8c77a0);
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    max-width: 900px;
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: fadeIn 0.8s ease-in-out;
}

h2 {
    text-align: center;
    color: #333;
    font-weight: 700;
    margin-bottom: 20px;
}

/* Input Form */
.input-group {
    display: flex;
    border-radius: 8px;
    overflow: hidden;
}

.input-group input {
    flex: 1;
    padding: 12px;
    border: none;
    border-radius: 8px 0 0 8px;
    outline: none;
}

.btn-primary {
    background: #6a11cb;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    border: none;
    color: white;
    font-weight: bold;
    padding: 12px 20px;
    transition: 0.3s;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #2575fc, #6a11cb);
}

/* Tabel Styling */
.table {
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.table thead {
    background: #6a11cb;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: white;
}

.table tbody tr:hover {
    background: rgba(106, 17, 203, 0.1);
    transition: 0.3s;
}

/* Tombol Aksi */
.btn-warning {
    background: #ff9f43;
    border: none;
    transition: 0.3s;
}

.btn-warning:hover {
    background: #ff6b00;
}

.btn-danger {
    background: #e74c3c;
    border: none;
    transition: 0.4s;
}

.btn-danger:hover {
    background: #c0392b;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.action-buttons {
    display: flex;
    gap: 5px;
    align-items: center;
}

.action-buttons .btn {
    height: 32px; /* Sesuaikan tinggi agar seragam */
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px 10px;
}

.navbar {
    background: linear-gradient(135deg, #8643bd, #8c77a0);
    width: 100%;
    padding: 15px 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Brand Style */
.navbar-brand {
    font-size: 1.8rem;
    font-weight: bold;
    color: #fff !important;
    letter-spacing: 1px;
    transition: all 0.3s ease-in-out;
}

/* Navbar Link Styling */
.navbar-nav .nav-link {
    color: #fff !important;
    font-size: 1.1rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease-in-out;
    padding: 10px 15px;
}

/* Hover Effect */
.navbar-nav .nav-link:hover {
    color: #ffd700 !important;
    text-shadow: 0px 0px 8px rgba(255, 215, 0, 0.8);
}


/* Responsif */
@media (max-width: 991px) {
    .navbar-nav {
        text-align: center;
    }

    .navbar-nav .nav-item {
        margin-bottom: 10px;
    }
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 fixed-top">
        <div class="">
            <a class="navbar-brand" href="#">to do list</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/list">list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/taskk">task</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Daftar list</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form Tambah Task -->
        <form action="{{ route('list.store') }}" method="POST" class="mb-3">
            @csrf
            <div class="input-group">
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama " required>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>

        <!-- Tabel Responsif -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_list as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                            <div class="action-buttons">
                                <!-- Tombol Tambah Tugas -->
                                <a  href="{{ url("/task/$data->id")}}" class="btn btn-primary btn-sm">detail</a>
                                
                                <!-- Tombol Edit -->
                                <a href="{{ route('list.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                                <!-- Tombol Delete -->
                                <form action="{{ route('list.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus task ini?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
