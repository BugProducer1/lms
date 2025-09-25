@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')
    <div class="col-lg-9">
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="icon-box bg-info-transparent me-2 me-xxl-3 flex-shrink-0">
                                <img src="{{ asset('img/icon/user-octagon.svg') }}" alt="">
                            </span>
                            <div>
                                <span class="d-block">Total Students</span>
                                <h4 class="fs-24 mt-1">{{ $studentCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="icon-box bg-blue-transparent me-2 me-xxl-3 flex-shrink-0">
                                <img src="{{ asset('img/icon/book-2.svg') }}" alt="">
                            </span>
                            <div>
                                <span class="d-block">Total Subject</span>
                                <h4 class="fs-24 mt-1">{{ $courses->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="mb-3 fw-bold">Registered Users</h5>
        <div class="table-responsive custom-table">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($studentList as $row)
                        <tr>
                            <td>{{ $row->name . ' ' . $row->last_name }}</td>
                            <td>{{ $row->email }}</td>
                            <td><a href="instructorprofile/{{ $row->id }}" class="btn btn-primary">View</a></td>
                        </tr>
                    @endforeach;
                </tbody>
            </table>
        </div>
    </div>
@endsection

<script>
    if ($('.summernote').length > 0) {
        $('.summernote').summernote({
            height: 160,
            minHeight: null,
            maxHeight: null,
            toolbar: [
                ['fontsize', ['fontsize']],
                ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough']],
                ['insert', ['picture']]
            ],
        });
    }
</script>
