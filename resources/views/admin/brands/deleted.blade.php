@extends('admin.layout.layout')
@section('title', 'Danh sách thương hiệu')
@section('main')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>@yield('title')</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('dashboard.index') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">@yield('title')</div>
                    </li>
                </ul>
            </div>
            
            <div class="wg-box">
                {{-- filter --}}
                @include('admin.brands.component.filter')
                {{-- end filter --}}
                {{-- table --}}
                @include('admin.brands.component.table')
                {{-- end table --}}
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination d-flex justify-content-center my-3">
                    {{ $brands->appends(request()->all())->links() }}
                </ul>
            </nav>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('script')

@endsection
