@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
<section style="position: relative; padding: 6rem 2rem; background-color: #ffffff; font-family: 'Poppins', sans-serif; overflow: hidden;">
  <img src="{{ asset('images/bakery-bg.jpeg') }}" alt="Background with bakery theme"
       style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.2; z-index: 0;">
  
  <div style="position: relative; max-width: 700px; margin-left: 3rem; z-index: 1;">
    <h1 style="font-size: 2.8rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.3;">
      Discover, Experiment, and <br>Enjoy Countless Recipes at 
      <span style="color: #219ebc;">CookLab</span>
    </h1>

    <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
      <a href="#" 
         style="padding: 12px 24px; background: #219ebc; color: white; border-radius: 8px; text-decoration: none; font-weight: 600; transition: background 0.3s;"
         onmouseover="this.style.background='#1b90aa'" onmouseout="this.style.background='#219ebc'">
         Explore Recipes
      </a>
      <a href="{{ route('register') }}" 
         style="padding: 12px 24px; background: #023047; color: white; border-radius: 8px; text-decoration: none; font-weight: 600; transition: background 0.3s;"
         onmouseover="this.style.background='#021f34'" onmouseout="this.style.background='#023047'">
         Create an Account
      </a>
    </div>
  </div>
</section>

{{-- Features Section --}}
<section style="background-color: #88C3C6; padding: 4rem 2rem; font-family: 'Poppins', sans-serif;">
  <h2 style="font-size: 2rem; font-weight: 700; text-align: center; color: #000; margin-bottom: 3rem;">What We Offer</h2>

  <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 2rem;">
    @php
      $features = [
        ['img' => 'recipe-icon.png', 'alt' => 'Recipes Icon', 'text' => 'Thousands of <br>Recipes'],
        ['img' => 'review-icon.png', 'alt' => 'Review Icon', 'text' => 'Experiment &<br> Review'],
        ['img' => 'access-icon.png', 'alt' => 'Access Icon', 'text' => 'Access anytime <br>& anywhere!']
      ];
    @endphp

    @foreach($features as $feature)
      <div style="background: #ffffff; border-radius: 1rem; padding: 2rem; width: 250px; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: transform 0.3s;"
           onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        <img src="{{ asset('images/' . $feature['img']) }}" alt="{{ $feature['alt'] }}" style="width: 60px; margin: 0 auto 1rem;">
        <h4 style="color: #003049; font-size: 1rem; font-weight: 600;">{!! $feature['text'] !!}</h4>
      </div>
    @endforeach
  </div>
</section>

{{-- Spacer putih kecil --}}
<div class="bg-white h-12 w-full"></div>

<footer style="background-color: #70B9BE; font-family: 'Poppins', sans-serif; padding: 4rem 2rem; color: white;"> 
  <div style="max-width: 1200px; margin: auto; display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 2rem; align-items: start;">
    
    {{-- About --}}
    <div style="text-align: left;">
      <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 1rem;">About CookLab</h4>
      <p style="line-height: 1.6; font-size: 0.9rem;">
        CookLab is a modern recipe platform made for everyone who loves to cook, explore, and share. 
        We aim to make cooking simple, inspiring, and accessible for all skill levels. 
        Join us and turn everyday meals into something special.
      </p>
    </div>

    {{-- Terms & Contact --}}
    <div style="text-align: left; padding-left: 5rem;">
      <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 1rem;">Terms & Privacy</h4>
      <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem;">
        <li style="margin-bottom: 0.5rem;">
          <a href="#" style="color: white; text-decoration: none; font-size: 0.9rem;">Terms of Service</a>
        </li>
        <li>
          <a href="#" style="color: white; text-decoration: none; font-size: 0.9rem;">Privacy Policy</a>
        </li>
      </ul>

      <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 1rem;">Contact Us</h4>
      <p style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem; margin-bottom: 0.5rem;">
        <img src="{{ asset('images/email.png') }}" style="width: 16px;"> cookLab@gmail.com
      </p>
      <p style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.9rem;">
        <img src="{{ asset('images/phone.png') }}" style="width: 16px;"> +62 8775434455
      </p>
    </div>

    {{-- Social Media --}}
    <div style="text-align: left; padding-left: 8rem;">
      <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 1rem;">Follow Us</h4>
      <div style="display: flex; flex-direction: column; gap: 0.8rem;">
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <img src="{{ asset('images/ig.png') }}" style="width: 20px;"> 
          <span style="font-size: 0.9rem;">cooklabOfficial</span>
        </div>
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <img src="{{ asset('images/tiktok.png') }}" style="width: 20px;"> 
          <span style="font-size: 0.9rem;">cooklabOfficial</span>
        </div>
        <div style="display: flex; align-items: center; gap: 0.5rem;">
          <img src="{{ asset('images/youtube.png') }}" style="width: 20px;"> 
          <span style="font-size: 0.9rem;">cooklabOfficial</span>
        </div>
      </div>
    </div>
  </div>

  {{-- Bottom line --}}
  <div style="text-align: center; margin-top: 3rem; font-size: 0.75rem; opacity: 0.8; border-top: 1px solid rgba(255,255,255,0.3); padding-top: 1rem;">
    &copy; {{ date('Y') }} CookLab. All rights reserved.
  </div>
</footer>

@endsection
