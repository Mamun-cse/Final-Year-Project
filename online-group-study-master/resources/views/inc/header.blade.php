<header class="header">
    <a href="#" class="logo"> <i class="fas fa-book-reader"></i> Study </a>
    <nav class="navbar">
        <a href="{{url('/')}}">home</a>
        <a href="#features">features</a>
        <a href="{{route('group.show')}}">Groups</a>
        <a href="#question">Question</a>
        <a href="#review">review</a>
        <a href="#results">results</a>
    </nav>
    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-user" id="login-btn"></div>
    </div>
    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </form>
    @if(Auth::check())
    <form method="POST" action="{{ route('signout')}}" class="login-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <ul class="idname">
            <li><a href="#"  style="font-size: 18px">{{Auth::user()->name}}</a></li>
            <li><a href="{{route('profile')}}"  style="font-size: 18px">Profile</a></li>
        </ul>
        <input type="submit" value="log out" class="gs-btn">

    @else
    <form method="POST" action="{{ route('login.custom') }}" class="login-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />


        <h3>login now</h3>
        <input type="email" name="email" placeholder="your email" class="box">
        <input type="password" name="password" placeholder="your password" class="box">
        <p>forget your password <a href="#">click here</a></p>
        <p>don't have an account <a href="{{url('/registration')}}">create now</a></p>

        <input type="submit" value="login now" class="gs-btn">


     @endif
    </form>

</header>
