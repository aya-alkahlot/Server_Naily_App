{{-- @extends('layouts.master') --}}

<html>
<title>All Contact Us</title>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Massage</th>
                <th scope="col">pre</th>
                <td>
                    <a class="btn btn-Danger" href="{{ route('admin.contact.delete.all') }}" role="button">Delete
                        All</a>
                    <a class="btn btn-Danger" href="{{ route('page.delete.all.truncate') }}" role="button">Delete All
                        Truncate</a>
                </td>

            </tr>
        </thead>
        <tbody>
            @foreach ($contact_us as $contact)
                <tr>
                    <th scope="row">{{ $contact->id }}</th>
                    <td>{{ $contact->FullName }}</td>
                    <td>{{ $contact->Email }}</td>
                    <td>{{ $contact->Massage }}</td>
                    <td>
                        <a class="btn btn-Danger" href="{{ route('pages.delete', $contact->id) }}"
                            role="button">Delete</a>
                    </td>
            @endforeach
            </tr>

        </tbody>
    </table>
</body>

</html>
