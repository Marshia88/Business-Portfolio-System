@extends ('frontend.layouts.app')


@section('content')

<div class="main-content">

  <div class="book-show-area">
    <div class="container">
      <div class="row">

        <div class="col-md-3">
          <img src="{{ asset('images/portfolios/girl1.jpg') }}" class="img img-fluid" />
          <!-- <img src="{{ asset('public/images/portfolios/'.$portfolio->image) }}" class="img img-fluid" /> -->
        </div>
        <div class="col-md-9">
          <h3>{{ $portfolio->name }}</h3>
          <p class="text-muted">Owner of
          <span class="text-primary">{{ $portfolio->business_name }}</span>
          @<span class="text-info">{{ $portfolio->category->name }}</span>
          </p>
          <hr>
          <p><strong>Age: </strong> {{ $portfolio->age }}</p>
          <p><strong>Business Starting Year: </strong> {{ $portfolio-> start_year }}</p>
          <div class="business-description">
          <p><strong>Business Details: </strong> {{ $portfolio->description }}</p>
          </div>
          <p>
          <div class="business-description">
          <strong>Aspirations: </strong> {{ $portfolio->aspirations }}
          </p>
          </div>
          <p><strong>You can contact me via my social media if you want to connect with me or collaborate! </strong></p>
          <p><strong>Email: </strong> {{ $portfolio->email }}</p>
          <p><strong>Social Media: </strong> {{ $portfolio->social_media }}</p>
          <p><strong>Linkedin: </strong> {{ $portfolio->linkedin }}</p>

        </div>
      </div>
    </div>
  </div>

</div>

@endsection

