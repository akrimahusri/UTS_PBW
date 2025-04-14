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

{{-- Footer --}}
<footer class="bg-[#3DA0A7] text-white font-[Poppins] px-6 py-12">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 text-sm text-white">

    {{-- Kiri: Social Media --}}
    <div class="flex flex-col items-start md:items-start gap-4">
      <img src="{{ asset('images/ig.png') }}" alt="Instagram" class="w-6 h-6">
      <p class="text-sm">cooklabOfficial</p>

      <img src="{{ asset('images/tiktok.png') }}" alt="TikTok" class="w-6 h-6 mt-4">
      <p class="text-sm">cooklabOfficial</p>

      <img src="{{ asset('images/youtube.png') }}" alt="Youtube" class="w-6 h-6 mt-4">
      <p class="text-sm">cooklabOfficial</p>
    </div>

    {{-- Tengah: Terms & Contact --}}
    <div class="flex flex-col items-start gap-4">
      <h4 class="text-base font-semibold">Terms & Privacy</h4>
      <a href="#" class="hover:underline">Terms of Service</a>
      <a href="#" class="hover:underline">Privacy Policy</a>

      <h4 class="text-base font-semibold mt-6">Contact Us</h4>
      <div class="flex items-center gap-2">
        <img src="{{ asset('images/email.png') }}" alt="Email" class="w-4 h-4">
        <span>cooklab@gmail.com</span>
      </div>
      <div class="flex items-center gap-2">
        <img src="{{ asset('images/phone.png') }}" alt="Phone" class="w-4 h-4">
        <span>+62 8775434455</span>
      </div>
    </div>

    {{-- Kanan: About CookLab --}}
    <div class="md:text-right">
      <h4 class="text-base font-semibold mb-4">About CookLab</h4>
      <p class="text-white/90 text-sm leading-relaxed">
        CookLab is a modern recipe platform made for everyone who loves to cook, explore, and share.
        We aim to make cooking simple, inspiring, and accessible for all skill levels.
        Join us and turn everyday meals into something special.
      </p>
    </div>
  </div>

  <div class="mt-12 text-center text-white/80 text-xs border-t border-white/20 pt-6">
    &copy; {{ date('Y') }} CookLab. All rights reserved.
  </div>
</footer>

@endsection
