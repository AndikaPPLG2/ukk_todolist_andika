<!DOCTYPE html>
<html lang="id">
<head>
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
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg mx-auto" style="max-width: 600px;">
            <div class="card-header bg-black text-white text-center">
                <h3>Edit Task</h3>
            </div>
            <div class="card-body">
                <form action="/task/{{$data_task->id}}/update" method="POST">
                    @csrf

                    <!-- Nama Task -->
                    <div class="mb-3">
                        <label class="form-label">Nama Task</label>
                        <input type="text" name="nama" value="{{ $data_task->nama }}" placeholder="Nama Task" required class="form-control">
                        <input type="hidden" name="id_list" value="{{ $data_task->id_list }}">
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="belum selesai" {{ $data_task->status == 'belum selesai' ? 'selected' : '' }}>Belum Selesai</option>
                            <option value="selesai" {{ $data_task->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <div class="row">
                        <!-- Prioritas -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Prioritas</label>
                            <select name="prioritas" class="form-select">
                                <option value="1" {{ $data_task->prioritas == '1' ? 'selected' : '' }}>1 (High)</option>
                                <option value="2" {{ $data_task->prioritas == '2' ? 'selected' : '' }}>2 (Medium)</option>
                                <option value="3" {{ $data_task->prioritas == '3' ? 'selected' : '' }}>3 (Low)</option>
                            </select>
                        </div>

                        <!-- Tanggal -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" value="{{ $data_task->tanggal }}" required class="form-control">
                        </div>
                    </div>

                    <!-- Button -->
                    <button type="submit" class="btn btn-primary w-100">Update Task</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
