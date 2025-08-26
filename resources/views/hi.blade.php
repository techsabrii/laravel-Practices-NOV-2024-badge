<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> <!-- Button trigger modal -->

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

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add Record
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body d-flex justify-content-center">
                    <form class="row w-50" action="{{route('records.store')}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <!-- Name -->
                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" value="" name="name" class="form-control" id="name" required>
                        </div>

                        <!-- Contact -->
                        <div class="col-12">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="tel" value="" name="contact" class="form-control" id="contact" placeholder="03XX-XXXXXXX">
                        </div>

                        <!-- Email -->
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="" name="email" class="form-control" id="email" required>
                        </div>


                        <!-- Submit -->
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>





<form action="{{ route('delete-multiple-users') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete selected users?');">
    @csrf
    @method('DELETE')


    <table border="1" class="table table-bordered">
        <tr>
            <th>
                <input type="checkbox" id="select-all"> <!-- Select All Checkbox -->
            </th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Email</th>
            <th>Verified</th>
            <th>Role</th>
            <th colspan="2">Action</th>
        </tr>

        @foreach ($user as $users)
        <tr>
            <td>
                <input type="checkbox" name="ids[]" value="{{ $users->id }}">
            </td>
            <td>{{ $users->name }}</td>
            <td><a href="{{ route('details',['id'=>$users->id]) }}">view</a></td>
            <td>{{ $users->email }}</td>
            <td>{{ $users->verified ?? '-' }}</td>
            <td>{{ $users->role ?? '-' }}</td>
            <td>
                <!-- Update Button -->
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#updateModal{{ $users->id }}" class="btn btn-sm btn-primary">
                    Update
                </a>

            </td>
            <td>
                <form action="{{ route('delete-user', $users->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>





        <!-- Bootstrap Modal -->
        <div class="modal fade" id="updateModal{{ $users->id }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $users->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel{{ $users->id }}">Update User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form class="row" action="{{ route('users.update', $users->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Name -->
                            <div class="col-12">
                                <label for="name{{ $users->id }}" class="form-label">Name</label>
                                <input type="text" value="{{ $users->name }}" name="name" class="form-control" id="name{{ $users->id }}" required>
                            </div>

                            <!-- Contact -->
                            <div class="col-12">
                                <label for="contact{{ $users->id }}" class="form-label">Contact</label>
                                <input type="tel" value="{{ $users->contact }}" name="contact" class="form-control" id="contact{{ $users->id }}" placeholder="03XX-XXXXXXX">
                            </div>

                            <!-- Email -->
                            <div class="col-12">
                                <label for="email{{ $users->id }}" class="form-label">Email</label>
                                <input type="email" value="{{ $users->email }}" name="email" class="form-control" id="email{{ $users->id }}" required>
                            </div>

                            <!-- Image Upload -->
                            <div class="col-12 mt-3">
                                <label for="images{{ $users->id }}" class="form-label">Upload Images</label>
                                <input type="file" name="images[]" id="images{{ $users->id }}" class="form-control" multiple>
                                <small class="text-muted">You can select multiple images</small>
                            </div>

                            <!-- Show Existing Images -->
                            @if(!empty($users->image_path))
                            <div class="col-12 mt-3">
                                <label class="form-label">Uploaded Images</label>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach(json_decode($users->image_path, true) as $img)
                                    <img src="{{ asset($img) }}" class="rounded border" style="width: 80px; height: 80px; object-fit: cover;">
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="col-12 mt-3">
                                <p class="text-muted">No image found</p>
                            </div>
                            @endif

                            <!-- Submit -->
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {{ $user->links() }}
    </div>

    <button type="submit" class="btn btn-danger mt-2">Delete Selected</button>
</form>

<script>
    // Select All functionality
    document.getElementById('select-all').onclick = function() {
        let checkboxes = document.querySelectorAll('input[name="ids[]"]');
        for (let checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
