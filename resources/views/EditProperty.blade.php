<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Property</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('property.update', $prop->property_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Image -->
                            <!-- Untuk sementara belum bisa melakukan edit gambar -->

                            <!-- Owner -->
                            <div class="mb-3">
                                <label class="form-label">Owner Name</label>
                                <input type="text" class="form-control" name="owner_name" placeholder="Enter owner name" value="{{ $prop->owner_name }}">
                            </div>

                            <!-- Price -->
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Enter price" value="{{ $prop->price }}">
                            </div>

                            <!-- Location -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" value="{{ $prop->city }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" name="state" value="{{ $prop->state }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control" name="country" value="{{ $prop->country }}">
                                </div>
                            </div>

                            <!-- Rooms -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Bedroom</label>
                                    <input type="number" class="form-control" name="bed_room" value="{{ $prop->bed_room }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Bathroom</label>
                                    <input type="number" class="form-control" name="bath_room" value="{{ $prop->bath_room }}">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="summary" rows="3">{{ $prop->summary }}</textarea>
                            </div>

                            <!-- Area -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Building Length</label>
                                    <input type="number" class="form-control" name="area_l" value="{{ $prop->area_l }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Building Width</label>
                                    <input type="number" class="form-control" name="area_w" value="{{ $prop->area_w }}">
                                </div>
                            </div>

                            <!-- Review -->
                            <div class="mb-4">
                                <label class="form-label">Review</label>
                                <select class="form-select" name="review">
                                    <option selected value="{{ $prop->review }}">{{ $prop->review }}</option>
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <!-- Button -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('property.index') }}" class="btn btn-secondary">
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
