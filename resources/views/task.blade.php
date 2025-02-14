<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #8643bd, #8c77a0);
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 700px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }

        label {
            font-weight: 500;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            background: #343a40;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover {
            background: #23272b;
        }

        .table-container {
            width: 100%;
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .table th {
            background: #343a40;
            color: white;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        /* Navbar Styling */
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
                        <a class="nav-link" href="/task">task</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    
    
    

    <div class="container mt-4">
        <h2>Tambah Task</h2>
        <form action="/task/store" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Tugas</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="prioritas" class="form-label">Prioritas</label>
                <select name="prioritas" class="form-select">
                    <option value="1">1 (High)</option>
                    <option value="2">2 (Medium)</option>
                    <option value="3">3 (Low)</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="selesai">Selesai</option>
                    <option value="belum selesai">Belum Selesai</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <input type="hidden" name="id_list" value="{{ $id_list }}">

            <button type="submit" class="btn btn-dark w-100">Tambah</button>
        </form>
    </div>

    <div class="table-container mt-5">
        <h2>Daftar Tugas</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tugas</th>
                    <th>Status</th>
                    <th>Tanggal </th>
                     <th>Prioritas</th>
                    <th>ID List</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_task as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->status }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->prioritas }}</td>
                        <td>{{ $data->id_list }}</td>
                        
                        <td>
                            <div class="d-flex gap-2">
                                <a href="/task/{{ $data->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/task/{{ $data->id }}/delete" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
