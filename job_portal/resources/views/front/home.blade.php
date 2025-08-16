@extends('front.layouts.app')

@section('main')
<section class="section-0 lazy d-flex bg-image-style dark align-items-center" data-bg="{{ asset('assets/images/banner5.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1>Find your dream job</h1>
                <p>Thousands of jobs available.</p>
                <div class="banner-btn mt-5">
                    <a href="#" class="btn btn-primary mb-4 mb-sm-0">Explore Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-1 py-5"> 
    <div class="container">
        <div class="card border-0 shadow p-5">
            <form action="{{ route("jobs") }}" method="GET">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keywords">
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                </div>
                <div class="col-md-3 mb-3">
                    <select class="form-control">
                        <option value="">Select a Category</option>
                        @if($newCategories-> isNotEmpty())
                        @foreach($newCategories as $category)
                        <option value="">{{ $category->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div> 
            </form>           
        </div>
    </div>
</section>

<section class="section-2 bg-2 py-5">
    <div class="container">
        <h2>Popular Categories</h2>
        <div class="row pt-5">
            @foreach($categories as $category)
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="{{ route('jobs').'?category='.$category->id }}"><h4 class="pb-2">{{ $category->name }}</h4></a>
                    <p class="mb-0"><span>0</span> Available position</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-3 py-5">
    <div class="container">
        <h2>Featured Jobs</h2>
        <div class="row pt-5">
            @foreach($featuredJobs as $featuredJob)
            <div class="col-md-4">
                <div class="card border-0 p-3 shadow mb-4">
                    <div class="card-body">
                        <h3 class="fs-5 pb-2">{{ $featuredJob->title }}</h3>
                        <p>{{ Str::words($featuredJob->description, 5) }}</p>
                        <div class="bg-light p-3 border">
                            <p class="mb-0"><strong><i class="fa fa-map-marker"></i></strong> {{ $featuredJob->location }}</p>
                            <p class="mb-0"><strong><i class="fa fa-clock-o"></i></strong> {{ $featuredJob->jobType->name ?? 'N/A' }}</p>
                            <p class="mb-0"><strong><i class="fa fa-usd"></i></strong> {{ $featuredJob->salary }}</p>
                        </div>
                        <div class="d-grid mt-3">
                            <a href="{{ route('jobDetail', $featuredJob->id) }}" class="btn btn-primary btn-lg">Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-3 bg-2 py-5">
    <div class="container">
        <h2>Latest Jobs</h2>
        <div class="row pt-5">
            @foreach($latestJobs as $latestJob)
            <div class="col-md-4">
                <div class="card border-0 p-3 shadow mb-4">
                    <div class="card-body">
                        <h3 class="fs-5 pb-2">{{ $latestJob->title }}</h3>
                        <p>{{ Str::words($latestJob->description, 5) }}</p>
                        <div class="bg-light p-3 border">
                            <p class="mb-0"><strong><i class="fa fa-map-marker"></i></strong> {{ $latestJob->location }}</p>
                            <p class="mb-0"><strong><i class="fa fa-clock-o"></i></strong> {{ $latestJob->jobType->name ?? 'N/A' }}</p>
                            <p class="mb-0"><strong><i class="fa fa-usd"></i></strong> {{ $latestJob->salary }}</p>
                        </div>
                        <div class="d-grid mt-3">
                            <a href="{{ route('jobDetail', $latestJob->id) }}" class="btn btn-primary btn-lg">Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
