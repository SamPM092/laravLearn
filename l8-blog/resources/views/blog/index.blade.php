<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel thing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background-image: url(https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
    <div class="container mt-5" style="padding: inherit;border-radius: 5px;">
        <header class="p-3 bg-light text-white shadow rounded">
            <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 text-secondary">About</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                <button type="button" class="btn btn-outline-primary btn-light me-2">Login</button>
                <button type="button" class="btn btn-outline-warning btn-light">Sign-up</button>
                </div>
            </div>
            </div>
        </header>
            <div class="row">
                <div class="col-md-12">
                    <div class="card  shadow-lg rounded">
                        <div class="card-body">
                            <a href="{{ route('blog.create') }}" class="btn btn-md btn-success mb-3" style="background: cadetblue">ADD BOOK</a>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Book Cover</th>
                                    <th scope="col">Book Title</th>
                                    <th scope="col">Date Added</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($blogs as $blog)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ Storage::url('public/blogs/').$blog->image }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->created_at }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                                <a href="#" class="btn btn-sm btn-success">VIEW</a>  
                                                <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Blog belum Tersedia.
                                    </div>
                                @endforelse
                                </tbody>
                            </table>  
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            //message with toastr
            @if(session()->has('success'))
            
                toastr.success('{{ session('success') }}', 'BERHASIL!'); 

            @elseif(session()->has('error'))

                toastr.error('{{ session('error') }}', 'GAGAL!'); 
                
            @endif
        </script>

    
</body>
</html>