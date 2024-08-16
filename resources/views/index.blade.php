<!DOCTYPE html>
<html>
<head>
    <title>Contact List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Contact List</h1>

        <form action="{{ route('contacts.index') }}" method="GET" class="d-flex flex-column flex-md-row justify-content-center mb-4">
            <input type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}" class="form-control mb-2 mb-md-0 mr-md-3" style="max-width: 250px;">
            <button type="submit" class="btn btn-warning">Search</button>
        </form>

         <!-- Sorting -->
        <div class="mb-4 text-center">
            <!-- Sort by Name Link -->
            <a href="{{ route('contacts.index', [
                'sort' => 'name', 
                'direction' => $sortColumn == 'name' ? ($sortDirection == 'asc' ? 'desc' : 'asc') : 'asc',
                'search' => request('search')
            ]) }}" class="btn btn-link text-decoration-none">
                Sort by Name {{ $sortColumn == 'name' ? ($sortDirection == 'asc' ? '▲' : '▼') : '▲' }}
            </a>
            
            <!-- Sort by Date Link -->
            <a href="{{ route('contacts.index', [
                'sort' => 'created_at', 
                'direction' => $sortColumn == 'created_at' ? ($sortDirection == 'asc' ? 'desc' : 'asc') : 'asc',
                'search' => request('search')
            ]) }}" class="btn btn-link text-decoration-none">
                Sort by Date {{ $sortColumn == 'created_at' ? ($sortDirection == 'asc' ? '▲' : '▼') : '▲' }}
            </a>
        </div>
        

        <button class="btn btn-primary mb-4">
            <a href="{{ route('contacts.create') }}" class="text-white text-decoration-none">Add Data</a>
        </button>

        @if (count($contacts) > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark table-primary">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Action</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>{{$contact->created_at}}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-between" style="gap: 10px;">
                                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-success btn-sm flex-fill text-center">Show</a>
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm flex-fill text-center">Edit</a>
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="flex-fill text-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm w-100">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center">No contacts found.</p>
        @endif
    </div>
</body>
</html>
