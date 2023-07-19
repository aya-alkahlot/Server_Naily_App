
<html>
<title>All Home</title>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Paragraph</th>
                <th scope="col">banner</th>
                <th scope="col">pre</th>
                <td>
                    <a class="btn btn-Danger" href="{{ route('home.content.delete.all.truncate') }}"
                        role="button">Delete All Truncate</a>
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($homes as $home)
                <tr>
                    <th scope="row">{{ $home->id }}</th>
                    <td>{{ $home->Title }}</td>
                    <td>{{ $home->Paragraph }}</td>
                    <td>
                        @if ($home->banner != null)
                            <img src="{{ asset('assets/images/homes/' . $home->banner) }}" width="50"
                                height="50">
                        @else
                            <img src="{{ asset('assets/images/homes/notFound.jpg' . $home->banner) }}" width="50"
                                height="50">
                        @endif

                    </td>
                    <td>
                        <a class="btn btn-Danger" href="{{ route('home.content.delete', $home->id) }}"
                            role="button">Delete</a>
                    </td>
            @endforeach
            </tr>

        </tbody>
    </table>
</body>

</html>
