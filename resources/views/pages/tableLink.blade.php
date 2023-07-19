
<html>
<title>All about Us</title>

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
                <th scope="col">Link</th>
                <th scope="col">Image</th>
                <th scope="col">pre</th>
                <td>
                    <a class="btn btn-Danger" href="{{ route('dashboard.link.delete.all.truncate') }}"
                        role="button">Delete All Truncate</a>
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($links as $link)
                <tr>
                    <th scope="row">{{ $link->id }}</th>
                    <td>{{ $link->Title }}</td>
                    <td>{{ $link->Link }}</td>
                    <td>
                        @if ($link->banner != null)
                            <img src="{{ asset('assets/images/setting/' . $link->banner) }}" width="50"
                                height="50">
                        @else
                            <img src="{{ asset('assets/images/setting/notFound.jpg' . $link->banner) }}" width="50"
                                height="50">
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('dashboard.link.Edit', $link->id) }}"
                            role="button">Edit</a>
                        <a class="btn btn-Danger" href="{{ route('dashboard.link.Delete', $link->id) }}"
                            role="button">Delete</a>
                    </td>
            @endforeach
            </tr>

        </tbody>
    </table>
</body>

</html>
