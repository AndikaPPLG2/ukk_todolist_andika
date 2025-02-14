<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail Tugas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
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

        h1 {
            text-align: center;
            color: #333;
            font-weight: 700;
            margin-bottom: 20px;
        }

        /* Styling Tabel */
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
            transition: 0.3s;
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
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>detail Tugas</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Prioritas</th>
                    <th>ID List</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_list as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->status }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->prioritas }}</td>
                    <td>{{ $data->id_list }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->updated_at }}</td>
                    <td class="action-buttons">
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
    {{-- <a href="{{ url('../' . $data->id . '/edit') }}" class="btn btn-warning">Edit</a> --}}

    {{-- @if(Route::has('task.destroy'))
<form action="{{ route('task.destroy', $data->id) }}" method="POST">
@csrf
@method('DELETE')
<button type="submit">Delete</button>
</form>
@endif --}}
</body>
</html>
