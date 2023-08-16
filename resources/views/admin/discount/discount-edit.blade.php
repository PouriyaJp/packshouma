@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش تخفیفات</title>
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.market.offer.discount') }}">تخفیفات</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش  تخفیفات</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ویرایش تخفیفات
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.offer.discount') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.market.offer.discount.update', $discount->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                     <section class="row">


                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">انتخاب دسته</label>
                                <select name="product_id" id="" class="form-control form-control-sm">
                                    <option value="">دسته را انتخاب کنید</option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}" @if(old('product_id', $discount->product_id) == $product->id) selected @endif>{{ $product->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @error('product_id')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>

                         <section class="col-12 col-md-6">
                             <div class="form-group">
                                 <label for="">عنوان تخفیف</label>
                                 <input type="text" class="form-control form-control-sm" name="name" value="{{ old('name', $discount->name) }}">
                             </div>
                             @error('name')
                             <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                             @enderror
                         </section>

                        <section class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="">درصد تخفیف</label>
                                <input type="text" class="form-control form-control-sm" name="percentage" value="{{ old('percentage', $discount->percentage) }}">
                            </div>
                            @error('percentage')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>


                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">تاریخ شروع</label>
                                <input type="text" name="start_date" id="start_date" class="form-control form-control-sm d-none">
                                <input type="text" id="start_date_view" class="form-control form-control-sm">
                            </div>
                            @error('start_date')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">تاریخ پایان</label>
                                <input type="text" name="end_date" id="end_date" class="form-control form-control-sm d-none">
                                <input type="text" id="end_date_view" class="form-control form-control-sm">
                            </div>
                            @error('end_date')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>

                        <section class="col-12">
                            <div class="form-group">
                                <label for="status">وضعیت</label>
                                <select name="status" id="" class="form-control form-control-sm" id="status">
                                    <option value="0" @if (old('status', $discount->status) == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if (old('status', $discount->status) == 1) selected @endif>فعال</option>
                                </select>
                            </div>
                            @error('status')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>


                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>

        </section>
    </section>
</section>

@endsection



@section('script')

    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>


    <script>
            $(document).ready(function () {
                $('#start_date_view').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#start_date'
                }),
                 $('#end_date_view').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#end_date'
                })
            });
    </script>
@endsection
