@extends ('frontend.layouts.app')


@section('content')

<div class="main-content">

  <div class="book-show-area">
    <div class="container">
      <div class="row">

        <div class="col-md-3">
          
          <img src="{{ asset('images/portfolios/girl1.jpg') }}" class="img img-fluid" />
        </div>
        <div class="col-md-9">
          <h3>Marshia Nujhat</h3>
          <p class="text-muted">Owner of 
            <span class="text-primary">Kids Choice</span> 
            <!-- @<span class="text-info">Programming</span> -->
          </p>
          <hr>
          <p><strong>Age: </strong> 32</p>
          <p><strong>Business Starting Year: </strong> 2017</p>
          <div class="book-description">
          <p><strong>Business Details: </strong> 
          Kids Choice is a clothing collection brand for children ages 0-12 years with unique and desirable concepts. We try to always come up with fashionable designs for kids but also always keep focus on the quality.
          </p>  
         </div>
         <div class="book-description">
          <p><strong>Aspirations: </strong> 
          I decided to start this brand as I felt there was a need for some uncommon clothes collections for the kids in Bangladesh. I want children to find comfort in what they wear and also have fun while playing dress-up!
          </p>  
         </div>
         <p><strong>You can contact me via my social media if you want to connect with me or collaborate! </strong></p>
         <p><strong>Email: </strong> marshia.nujhat@gmail.com</p>
         <p><strong>Social Media: </strong> https://kids_choice.com</p>
         <p><strong>Linkedin: </strong> linkedin//marshia1918</p>

          <!-- <div class="book-buttons mt-4">
              <a href="" class="btn btn-outline-success"><i class="fa fa-check"></i> Already Read</a>
              <a href="{{ route('portfolios.show') }}" class="btn btn-outline-warning"><i class="fa fa-cart-plus"></i> Add to Cart</a> -->
              <!-- <a href="book-view.html" class="btn btn-outline-warning"><i class="fa fa-cart-plus"></i> Add to Cart</a> -->
              <!-- <a href="" class="btn btn-outline-danger"><i class="fa fa-heart"></i> Add to Wishlist</a>
          </div>
        </div> -->

      </div>
    </div>
  </div>

</div>

@endsection

