@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
<section style="position: relative; padding: 6rem 2rem; background-color: #ffffff; font-family: 'Poppins', sans-serif; overflow: hidden;">
  <img src="{{ asset('images/bakery-bg.jpeg') }}" alt="Bakery Background"
       style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.2; z-index: 0;">
  
  <div style="position: relative; max-width: 700px; margin-left: 3rem; z-index: 1;">
    <h1 style="font-size: 2.8rem; font-weight: 700; margin-bottom: 1rem;">
      Discover, Experiment, and <br>Enjoy Countless Recipes at 
      <span style="color: #219ebc;">CookLab</span>
    </h1>

    <div style="margin-top: 2rem;">
      <a href="#" style="padding: 12px 24px; background: #219ebc; color: white; border-radius: 8px; margin-right: 10px; text-decoration: none; font-weight: 600;">Explore Recipes</a>
      <a href="{{ route('register') }}" style="padding: 12px 24px; background: #023047; color: white; border-radius: 8px; text-decoration: none; font-weight: 600;">Create an Account</a>
    </div>
  </div>
</section>

{{-- Features Section --}}
<section style="background-color: #88C3C6; padding: 4rem 2rem; font-family: 'Poppins', sans-serif;">
  <h2 style="font-size: 2rem; font-weight: 700; text-align: center; color: #000; margin-bottom: 3rem;">What We Offer</h2>

  <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 2rem;">
      <div style="background: #ffffff; border-radius: 1rem; padding: 2rem; width: 250px; text-align: center;">
      <img src="{{ asset('images/recipe-icon.png') }}" alt="Recipes" style="width: 60px; margin: 0 auto 1rem; display: block;">
      <h4 style="color: #003049; font-size: 1rem; font-weight: 600;">Thousand of <br>Recipes</h4>
    </div>

    <div style="background: #ffffff; border-radius: 1rem; padding: 2rem; width: 250px; text-align: center;">
      <img src="{{ asset('images/review-icon.png') }}" alt="Review" style="width: 60px; margin: 0 auto 1rem; display: block;">
      <h4 style="color: #003049; font-size: 1rem; font-weight: 600;">Experiment &<br> Review</h4>
    </div>
    
    <div style="background: #ffffff; border-radius: 1rem; padding: 2rem; width: 250px; text-align: center;">
      <img src="{{ asset('images/access-icon.png') }}" alt="Access" style="width: 60px; margin: 0 auto 1rem; display: block;">
      <h4 style="color: #003049; font-size: 1rem; font-weight: 600;">Access anytime <br>& anywhere!</h4>
    </div>
  </div>
</section>

@endsection
