@extends('admin.layouts.master')

@section('head-tag')
<title>قسط</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.home') }}">خانه</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">قسط</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    قسط
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.buy.instalment.create') }}" class="btn btn-info btn-sm">ایجاد قسط</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>عنوان قسط</th>
                            <th>نوع قسط</th>
                            <th>درصد قسط</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($instalments as $instalment)

                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $instalment->product->name }}</th>
                            <th>{{ $instalment->name }}</th>
                            <th>{{ $instalment->instalment_type }} ماه</th>
                            <th>{{ $instalment->percentage }}</th>
                            <td>{{ jalaliDate($instalment->start_date) }}</td>
                            <td>{{ jalaliDate($instalment->end_date) }}</td>
                            <td class="width-16-rem text-left">
                                <a href="{{ route('admin.market.buy.instalment.edit', $instalment->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <form class="d-inline" action="{{ route('admin.market.buy.instalment.destroy', $instalment->id) }}" method="post">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                </form>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </section>

        </section>
    </section>
</section>

@endsection

@section('script')

    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection
