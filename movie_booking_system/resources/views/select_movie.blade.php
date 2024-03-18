<?php
    use App\Models\Movie;
    use App\Models\Location;
    use App\Models\Time;
?>

<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="css/select_movie.css">
    </head>

    <body>
        <div class="page-container">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <section id="tranding">
                    <div class="container">
                        <div class="swiper tranding-slider">
                            <div class="swiper-wrapper">
                                @foreach(Movie::all() as $movie)
                                    <!-- Slide-start -->
                                    <div class="swiper-slide tranding-slide" value="{{$movie->id}}">
                                        <div class="tranding-slide-img">
                                            <img src="{{ asset($movie->poster) }}" alt="Tranding">
                                        </div>
                                        <div class="tranding-slide-content">
                                            <div class="tranding-slide-content-bottom">
                                            <p class="movie-name">
                                                {{ __($movie->name) }}
                                            </p>
                                            <h3 class="movie-rating">
                                                <span>4.5</span>
                                                <div class="rating">
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                <ion-icon name="star"></ion-icon>
                                                </div>
                                            </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Slide-end -->
                                @endforeach
                            </div>

                            <div class="tranding-slider-control">
                                <div class="swiper-button-prev slider-arrow">
                                    <ion-icon name="arrow-back-outline"></ion-icon>
                                </div>
                                <div class="swiper-button-next slider-arrow">
                                    <ion-icon name="arrow-forward-outline"></ion-icon>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>

                        </div>
                    </div>
                </section>
                <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
                <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
                <script src="js/select_movie.js"></script>
            </div>
            <h2 class="p-6 text-xl text-gray-900 dark:text-gray-100">{{ __('Select Date') }}</h2>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="button-container" id="button-container">
                        <?php 
                            $date1  = date("Y-m-d", strtotime("-2 day"));
                            $date2  = date("Y-m-d", strtotime("-1 day"));
                            $date3  = date("Y-m-d");
                            $date4  = date("Y-m-d", strtotime("+1 day"));
                            $date5  = date("Y-m-d", strtotime("+2 day"));

                            $month1 = date('M', strtotime('-2 day'));
                            $month2 = date('M', strtotime('-1 day'));
                            $month3 = date('M');
                            $month4 = date('M', strtotime('+1 day'));
                            $month5 = date('M', strtotime('+2 day'));

                            $day1   = date('j', strtotime('-2 day'));
                            $day2   = date('j', strtotime('-1 day'));
                            $day3   = date('j');
                            $day4   = date('j', strtotime('+1 day'));
                            $day5   = date('j', strtotime('+2 day'));

                        ?>
                        <div class="date-button" onclick="toggleDate(this)" data-index="1">
                            <span><?php echo $day1; ?></span><br>
                            <span class="smaller"><?php echo $month1; ?></span>
                        </div>
                        <div class="date-button" onclick="toggleDate(this)" data-index="2">
                            <span><?php echo $day2; ?></span><br>
                            <span class="smaller"><?php echo $month2; ?></span>
                        </div>
                        <div class="date-button" onclick="toggleDate(this)" data-index="3">
                            <span><?php echo $day3; ?></span><br>
                            <span class="smaller"><?php echo $month3; ?></span>
                        </div>
                        <div class="date-button" onclick="toggleDate(this)" data-index="4">
                            <span><?php echo $day4; ?></span><br>
                            <span class="smaller"><?php echo $month4; ?></span>
                        </div>
                        <div class="date-button" onclick="toggleDate(this)" data-index="5">
                            <span><?php echo $day5; ?></span><br>
                            <span class="smaller"><?php echo $month5; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="p-6 text-xl text-gray-900 dark:text-gray-100">{{ __('Select Time') }}</h2>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="button-container" id="button-container">
                    @foreach(Time::all() as $time)
                        <div class="time-button" onclick="toggleTime(this)" data-index="{{ __($time->id) }}">
                            <span class="smaller">{{ __($time->time) }}</span>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <h2 class="p-6 text-xl text-gray-900 dark:text-gray-100">{{ __('Select Cinema') }}</h2>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="button-container" id="button-container">
                    @foreach(Location::all() as $cinema)
                        <div class="cinema-button" onclick="toggleCinema(this)" data-index="{{ __($cinema->id) }}">
                            <span class="smaller">{{ __($cinema->name) }}</span>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <form action='/submit_info' method='POST'>
                @csrf
                <input type="text" id="movie" name="movie" value='{{Movie::first()->value('id')}}' hidden>
                <input type="text" id="date" name="date" value='0' hidden>
                <input type="text" id="time" name="time" value='0' hidden>
                <input type="text" id="cinema" name="cinema" value='0' hidden>
                <button type="submit">
                    <div id="proceed" class="proceed w3-animate-bottom">
                        <div class="text">{{ __('Select Seat') }}</div>
                    </div>
                </button>
            </form>
        </div>
    </body>

  </x-app-layout>