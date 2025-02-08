<div class="row mt-4">
    <div class="col-md-6">
        <label for="date-from" class="form-label">Từ Ngày:</label>
        <input type="date" class="form-control" id="date-from">
    </div>
    <div class="col-md-6">
        <label for="date-to" class="form-label">Đến Ngày:</label>
        <input type="date" class="form-control" id="date-to">
    </div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <button class="btn btn-primary w-100">Lọc Thống Kê</button>
    </div>
</div>
<div class="table-responsive">
                <table class="table table-striped table-bordered mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Status</th>
                            <th>Date Added</th>
                            <th>ISBN</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample row -->
                        <tr>
                            <td>1</td>
                            <td>Sample Book</td>
                            <td>John Doe</td>
                            <td>Fiction</td>
                            <td>Available</td>
                            <td>2024-11-21</td>
                            <td>1234567890</td>
                            <td>
                                <button class="btn btn-primary btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>