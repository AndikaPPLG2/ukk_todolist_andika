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

.action-buttons {
    display: flex;
    gap: 5px;
    align-items: center;
}

.action-buttons .btn {
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px 10px;
}


    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Task</h2>
        <form action="{{ route('list.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
        
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Task</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $data->nama }}" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Update nama</button>
        </form>
        
    </div>
</body>
</html>
