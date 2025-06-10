<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.adminhead')
    <link href="dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="dashboard/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">
        @include('components.adminsidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('components.adminheader')

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Add New Product</h1>
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}


                    <!-- Form Start -->
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <!-- Product Name -->
                                <div class="form-group">
                                    <label for="name">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Quantity -->
                                <div class="form-group">
                                    <label for="quantity">Quantity <span class="text-danger">*</span></label>
                                    <input type="number" name="quantity" class="form-control"
                                        value="{{ old('quantity') }}">
                                    @error('quantity')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Price -->
                                <div class="form-group">
                                    <label for="price">Price (₹) <span class="text-danger">*</span></label>
                                    <input type="number" name="price" class="form-control" step="0.01"
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label for="images">Product Image</label>
                                    <input type="file" name="images" class="form-control-file">
                                    @error('images')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Buttons -->
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </form>

                    <!-- Form End -->

                </div>
            </div>

            @include('components.adminfooter')
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('components.adminscript')
</body>

</html>
