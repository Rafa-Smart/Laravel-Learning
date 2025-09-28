<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Blog Detail</h3>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title mb-3">{{ $blog->title }}</h4>
                        <p class="card-text fs-5">{{ $blog->description }}</p>
                        <hr>
                        <p class="text-muted mb-1"><strong>Created at:</strong> {{ $blog->created_at }}</p>
                        <p class="text-muted"><strong>Updated at:</strong> {{ $blog->updated_at }}</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ url('blog') }}" class="btn btn-secondary">Back to List</a>
                        <a href="{{ url("blog/".$blog->id."/edit") }}" class="btn btn-warning">Edit</a>
                        <a href="{{ url("blog/".$blog->id."/delete") }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
