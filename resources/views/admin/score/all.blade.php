@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Scrore Category')</th>
                                <th scope="col">@lang('Scrore Title')</th>
                                <th scope="col">@lang('Scrore Number')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($score as $scorerow)
                            <tr>
                                <td data-label="@lang('Start Date')">{{$scorerow->scorecategory}}</td>
                                <td data-label="@lang('End Date')">{{$scorerow->scorevalue}}</td>
                                <td data-label="@lang('End Date')">{{$scorerow->scorenumber }}</td>
                                <td data-label="Action">
                                    <a href="{{route('admin.score.edit',$scorerow->id)}}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="edit">
                                        <i class="las la-edit text--shadow"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{paginateLinks($score)}}
                </div>
            </div><!-- card end -->
        </div>

@endsection
@push('breadcrumb-plugins')
    <!-- Button trigger modal -->
    <a  href="{{route('admin.score.add')}}" class="btn btn--primary mr-2 mt-2">
       @lang('+ Add Score')
    </a>
    <form action="{{route('admin.score.all')}}" method="GET" class="form-inline float-sm-right bg--white mt-2">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="@lang('Search by title')" value="" autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
@endpush
@push('script')

@endpush
