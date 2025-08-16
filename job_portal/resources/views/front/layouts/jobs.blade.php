@extends('front.layouts.app')

@section('main')
<section class="section-3 py-5 bg-2">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2>Find Jobs</h2>
            </div>
            <div class="col-md-6 text-end">
                <select name="sort" id="sort" class="form-control w-auto d-inline-block">
                    <option value="">Latest</option>
                    <option value="">Oldest</option>
                </select>
            </div>
        </div>

        <div class="row pt-3">
            @if($jobs->isNotEmpty())
                @foreach($jobs as $job)
                    <div class="col-sm-12 col-md-6 col-lg-4 d-flex mb-4">

                        <div class="card border-0 p-3 shadow mb-4 w-100 h-100">
                            <div class="card-body d-flex flex-column">
                                <h3 class="fs-5 pb-2 mb-0">{{ $job->title }}</h3>
                                <p>{{ Str::words($job->description, 10, '...') }}</p>
                                <div class="bg-light p-3 border mt-auto">
                                    <p class="mb-0">
                                        <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                        <span class="ps-1">{{ $job->location }}</span>
                                    </p>
                                    <p class="mb-0">
                                        <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                        <span class="ps-1">{{ $job->jobType->name }}</span>
                                    </p>
                                    <p class="mb-0">
                                        <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                        <span class="ps-1">{{ $job->salary }}</span>
                                    </p>
                                </div>
                                <div class="d-grid mt-3">
                                    <a href="{{ route('jobDetail',$job->id) }}" class="btn btn-primary btn-lg">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p>No jobs found.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
