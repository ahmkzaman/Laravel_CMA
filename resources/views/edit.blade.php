
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Contact</title>

</head>
<body class="container mt-5">
    <h1 class="mb-4 text-center text-success font-weight-bold" style="font-size: 2.5rem; padding-bottom: 10px;">
        Edit Contact
    </h1>

    <div class="d-flex justify-content-center">
        <form action="{{ route('contacts.update', $contact->id) }}" method="POST" style="width: 50%;">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $contact->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $contact->email }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ $contact->phone }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ $contact->address }}">
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Contact</button>
        </form>
    </div>

</body>
</html>
