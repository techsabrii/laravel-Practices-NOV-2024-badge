<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Contact Form</h5>

                {{-- Success Message --}}
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                {{-- Error Message --}}
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="card-body d-flex justify-content-center">
                <form class="row w-50" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Laravel update method --}}

                    <!-- Name -->
                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="name" required>
                    </div>

                    <!-- Contact -->
                    <div class="col-12">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="tel" value="{{ $user->contact }}" name="contact" class="form-control" id="contact" placeholder="03XX-XXXXXXX">
                    </div>

                    <!-- Email -->
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="email" required>
                    </div>

                    <!-- Image Upload -->
                    <div class="col-12 mt-3">
                        <label for="images" class="form-label">Upload Images</label>
                        <input type="file" name="images[]" id="images" class="form-control" multiple>
                        <small class="text-muted">You can select multiple images</small>
                    </div>

                    <!-- Show Existing Images -->
                    @if(!empty($user->image_path))
                        <div class="col-12 mt-3">
                            <label class="form-label">Uploaded Images</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach(json_decode($user->image_path, true) as $img)
                                    <img src="{{ asset($img) }}" class="rounded border" style="width: 80px; height: 80px; object-fit: cover;">
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Submit -->
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
