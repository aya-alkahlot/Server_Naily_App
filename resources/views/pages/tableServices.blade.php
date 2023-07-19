
<html>
<title>All Services</title>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">parent</th>
                <th scope="col">Paragraph</th>
                <th scope="col">Logo</th>
                <th scope="col">pre</th>
                <td>
                    <a class="btn btn-Danger" href="{{ route('service.services.delete.all.truncate') }}"
                        role="button">Delete All Truncate</a>
                    <a class="btn btn-Danger" href="{{ route('service.services.create') }}"
                        role="button">Store</a>
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <th scope="row">{{ $service->id }}</th>
                    <th scope="row">{{ $service->title }}</th>
                    <td>{{ $service->parent->title  ?? "--"}}</td>
                    <td>{{ $service->Paragraph }}</td>
                    <td>
                        @if ($service->banner != null)
                            <img src="{{ asset('assets/images/services/' . $service->banner) }}" width="50"
                                height="50">
                        @else
                            <img src="{{ asset('assets/images/services/notFound.jpg' . $service->banner) }}" width="50"
                                height="50">
                        @endif

                        {{-- <img src="{{ asset('assets/images/offers/' . $about->Logo) }}" width="50" height="50"> --}}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('service.services.Edit', $service->id) }}"
                            role="button">Edit</a>
                        <a class="btn btn-Danger" href="{{ route('service.services.Delete', $service->id) }}"
                            role="button">Delete</a>
                    </td>
            @endforeach
            </tr>

        </tbody>
    </table>
</body>

</html>
