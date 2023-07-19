
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
                <th scope="col">Paragraph</th>
                <th scope="col">Logo</th>
                <th scope="col">pre</th>
                <td>
                    <a class="btn btn-Danger" href="{{ route('aboutUs.about.delete.all.truncate') }}"
                        role="button">Delete All Truncate</a>
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($about_us as $about)
                <tr>
                    <th scope="row">{{ $about->id }}</th>
                    <td>{{ $about->Title }}</td>
                    <td>{{ $about->Paragraph }}</td>
                    <td>
                        @if ($about->Logo != null)
                            <img src="{{ asset('assets/images/offers/' . $about->Logo) }}" width="50"
                                height="50">
                        @else
                            <img src="{{ asset('assets/images/offers/notFound.jpg' . $about->Logo) }}" width="50"
                                height="50">
                        @endif

                        {{-- <img src="{{ asset('assets/images/offers/' . $about->Logo) }}" width="50" height="50"> --}}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('aboutUs.about.Edit', $about->id) }}"
                            role="button">Edit</a>
                        <a class="btn btn-Danger" href="{{ route('aboutUs.about.Delete', $about->id) }}"
                            role="button">Delete</a>
                    </td>
            @endforeach
            </tr>

        </tbody>
    </table>
</body>

</html>
