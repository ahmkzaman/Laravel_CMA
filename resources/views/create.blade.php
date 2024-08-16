
<!DOCTYPE html>
<html>
<head>
    <title>Create Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container mt-5">
    <h1 class="mb-4 text-center text-success font-weight-bold" style="font-size: 2.5rem; padding-bottom: 10px;">
        Create Contact
    </h1>
    
    <div class="d-flex justify-content-center">
        <form action="{{ route('contacts.store') }}" method="POST" style="width: 50%;">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <textarea name="address" id="address" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Save Contact</button>
        </form>
    </div>

    
</body>
</html>
