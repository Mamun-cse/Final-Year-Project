@extends('master')
@section('title')
 Online Group Study 
@stop 
@section('content')
 
<section class="home" id="home">
   
   <div class="swiper home-slider">
      
      <div class="swiper-wrapper">

         <section class="swiper-slide slide" style="background: url(image/home-slide-1.jpg) no-repeat;">
            <div class="content">
               <h3>practice makes a man perfect!</h3>
               <p>time is absolute .time is relative. proper use of time</p>
               <a href="{{route('group.create')}}" class="gs-btn">create group</a>
            </div>
         </section>

         <section class="swiper-slide slide" style="background: url(image/home-slide-2.jpg) no-repeat;">
            <div class="content">
               <h3>practice makes a man perfect!</h3>
               <p>Identify your problems,but give your power and energy to solutions</p>
               <a href="{{route('group.create')}}" class="gs-btn">create group</a>
            </div>
         </section>

         <section class="swiper-slide slide" style="background: url(image/home-slide-3.jpg) no-repeat;">
            <div class="content">
               <h3>practice makes a man perfect!</h3>
               <p>nothing is better than reading ,and gaining more and more knowledge.</p>
               <a href="{{route('group.create')}}" class="gs-btn">create group</a>
            </div>
         </section>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- home section ends -->
<!-- features section starts  -->

<section class="features" id="features">

    <h1 class="heading"> our <span>features</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/govtjob.jpg" alt="">
            <h3>online job preparation</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
            <a href="#" class="gs-btn">read more</a>
        </div>

        <div class="box">
            <img src="image/onlinegroupstudy1.png" alt="">
            <h3>online group study</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
            <a href="#" class="gs-btn">read more</a>
        </div>

        <div class="box">
            <img src="image/onlineexam1.jpg" alt="">
            <h3>online exam system</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
            <a href="#" class="gs-btn">read more</a>
        </div>

    </div>

</section>

<!-- features section ends -->
<!-- products section starts  -->

<section class="products" id="groups">

    <h1 class="heading"> our <span>groups</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">

            @foreach($groups as $group)
            <div class="swiper-slide box">
                <img src="image/groupstudy1.jpg" alt="">
                <h3>{{$group->gname}}</h3>
                <div class="price"> about group details </div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="{{route('join.group',$group->id)}}" class="gs-btn">join group</a>
            </div>
            @endforeach

            
            

        </div>

    </div>


</section>

<!-- products section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading"> student's <span>review</span> </h1>

    <div class="swiper review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <img src="image/pic-1.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde sunt fugiat dolore ipsum id est maxime ad tempore quasi tenetur.</p>
                <h3>john deo</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-2.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde sunt fugiat dolore ipsum id est maxime ad tempore quasi tenetur.</p>
                <h3>john deo</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-3.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde sunt fugiat dolore ipsum id est maxime ad tempore quasi tenetur.</p>
                <h3>john deo</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-4.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde sunt fugiat dolore ipsum id est maxime ad tempore quasi tenetur.</p>
                <h3>john deo</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- review section ends -->


@stop