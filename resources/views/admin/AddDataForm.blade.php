<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Add New Property</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.property.store') }}" method="POST">
                            @csrf

                            <!-- Image -->
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <select class="form-select" name="photo" required>
                                    <option selected value="" disabled>Choose image</option>
                                    @foreach($images as $index => $value)
                                        <option value="{{ $value['photo'] }}">Image {{ $index + 1 }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Owner -->
                            <div class="mb-3">
                                <label class="form-label">Owner Name</label>
                                <input type="text" class="form-control" name="owner_name" placeholder="Enter owner name">
                            </div>

                            <!-- Price -->
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Enter price">
                            </div>

                            <!-- Location -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="city">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" name="state">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control" name="country">
                                </div>
                            </div>

                            <!-- Rooms -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Bedroom</label>
                                    <input type="number" class="form-control" name="bed_room">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Bathroom</label>
                                    <input type="number" class="form-control" name="bath_room">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="summary" rows="3"></textarea>
                            </div>

                            <!-- Area -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Building Length</label>
                                    <input type="number" class="form-control" name="area_l">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Building Width</label>
                                    <input type="number" class="form-control" name="area_w">
                                </div>
                            </div>

                            <!-- Review -->
                            <div class="mb-4">
                                <label class="form-label">Review</label>
                                <select class="form-select" name="review" required>
                                    <option selected value="" disabled>Choose rating</option>
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <!-- Button -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.adminDashboard') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary px-4">
                                    Save Property
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
