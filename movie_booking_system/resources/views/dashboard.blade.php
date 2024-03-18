<?php
    use App\Models\Movie;
?>
<x-app-layout>
    <meta name="vi" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/dashboard.css">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="w3-content w3-display-container" style="max-width:100%; height:600px">
        <img class="mySlides" src="{{ asset('assets/Movie2_poster.jpg') }}" style="width:100%; height:600px">
        <img class="mySlides" src="{{ asset('assets/Movie3_poster.jpg') }}" style="width:100%; height:600px">
        <img class="mySlides" src="{{ asset('assets/Movie1_poster.jpg') }}" style="width:100%; height:600px">
        <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
            <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
            <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    {{ __('All Movies') }}
                    <div class = "movie_container">
                        @foreach(Movie::all() as $movie)
                            <div class = "movie">
                                <a href="select_movie">
                                    <img src="{{ asset($movie->poster) }}">
                                    <div class="middle">
                                        <div class="text">Book Now</div>
                                    </div>
                                    <p style="text-align:center">{{ __($movie->name) }}<p>
                                </a>
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <script src="js/dashboard.js"></script>
</x-app-layout> 
