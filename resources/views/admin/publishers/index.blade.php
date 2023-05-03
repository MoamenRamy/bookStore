@extends('theme.default')

@section('head')
<!-- Custom styles for this page -->
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
عرض الناشرون
@endsection

@section('content')
<a href="{{ route('publishers.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>أضف ناشرا جديدا</a>
<hr>
    <div class="row">
        <div class="col-md-12">
            <table id="books-table" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>العنوان</th>
                        <th>خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($publishers as $publisher)
                        <tr>
                            <td><a>{{ $publisher->name }}</a></td>
                            <td><a>{{ $publisher->address }}</a></td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{route('publishers.edit', $publisher)}}"><i class="fa fa-edit"></i>تعديل</a>
                                <form method="POST" action="{{route('publishers.destroy', $publisher)}}" class="d-inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل انت متأكد ؟')"><i class="fa fa-trash"></i> حذف </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#books-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"
                }
            });
        });
    </script>
@endsection
