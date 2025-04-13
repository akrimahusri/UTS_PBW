@extends('layouts.app')

@section('content')
<section class="hero" style="background:#fb8500;color:white;padding:4rem;text-align:center;">
  <h1 style="font-size:2.5rem; font-weight:bold;">Discover, Experiment, and Enjoy Countless Recipes at CookLab</h1>
  <p style="margin-top:1rem;">Access anytime & anywhere! Whether you're a beginner or a kitchen pro, there's always something new to try.</p>
  <a href="{{ route('register') }}" class="btn" style="display:inline-block;margin-top:2rem;padding:10px 20px;background:#023047;color:white;text-decoration:none;border-radius:5px;">Create an Account</a>
</section>

<section class="features" style="display:flex;justify-content:space-around;gap:1rem;flex-wrap:wrap;padding:3rem;background:#ffe6a7;">
  <div style="max-width:300px;text-align:center;">
    <h3>Thousands of Recipes</h3>
    <p>Explore your favorite dishes from all around the world.</p>
  </div>
  <div style="max-width:300px;text-align:center;">
    <h3>Experiment & Review</h3>
    <p>Try out new recipes and leave your own reviews.</p>
  </div>
  <div style="max-width:300px;text-align:center;">
    <h3>Anytime, Anywhere</h3>
    <p>Save recipes, access your favorites whenever you want.</p>
  </div>
</section>
@endsection
