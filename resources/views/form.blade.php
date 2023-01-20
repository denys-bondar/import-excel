<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Import excel</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="p-3 m-0 border-0 bd-example">
<!-- Example Code -->
<div class="row">
    <div class="d-flex justify-content-center align-self-center">
        <h1 class="display-4">Import excel files</h1>
    </div>
</div>

@if(count($errors) > 0)
    <div class="row">
        <div class="d-flex justify-content-center align-self-center">
            <div class="alert alert-danger row gy-2 gx-3 align-items-center">
                Upload Validation Error:<br>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<!-- Example Code -->
<div class="row">
    <div class="d-flex justify-content-center align-self-center">
        <form class="row gy-2 gx-3 align-items-center" action="{{ route('file') }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
                <input type="file" name="file" class="form-control" aria-label="file example" required>
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>
    </div>
</div>
<!-- End Example Code -->
</body>
</html>
