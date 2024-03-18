<?php
    use App\Models\Booking;
    use App\Models\Movie;
    use App\Models\Location;
    use App\Models\Time;
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bookings History') }}
        </h2>
    </x-slot>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/booking_history.css">
    </head>

    <body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Welcome {{ Auth::user()->name }}
                        <div class="container">
                            @foreach(Booking::where('userid', Auth::user()->id)->get() as $booking)
                                <div class="item">
                                    <div class="item-right">
                                        <img class="qr" src="{{ asset('assets/movie_qr.jpg') }}">
                                        <span class="up-border"></span>
                                        <span class="down-border"></span>
                                    </div> <!-- end item-right -->
                                    
                                    <div class="item-left">
                                        <p class="event">Movie</p>
                                        <h2 class="title">{{Movie::where('id', $booking['movieid'])->value('name')}}</h2>
                                        
                                        <div class="sce">
                                            <div class="icon">
                                                <i class="fa fa-table"></i>
                                            </div>
                                            <p>{{$booking['date']}} <br/> {{Time::where('id', $booking['timeid'])->value('time')}}</p>
                                        </div>
                                        <div class="fix"></div>

                                        <div class="loc">
                                            <div class="icon">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <p>{{Location::where('id', $booking['locationid'])->value('name')}} <br/> {{ __($booking->seat) }}</p>
                                        </div>
                                        <div class="fix"></div>

                                        <button class="tickets">Tickets</button>
                                    </div> <!-- end item-left -->
                                </div> <!-- end item -->
                            @endforeach
                        </div>      
                    </div>
                </div>
            </div>
        </div>
    </body>


    
</x-app-layout>
