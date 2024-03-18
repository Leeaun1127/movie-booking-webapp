<?php
    use App\Models\Movie;
?>

<x-app-layout>
    <link rel="stylesheet" href="css/admin_panel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="movie-table">
                        <thead>
                            <tr>
                                <th>Movie ID</th>
                                <th>Poster</th>
                                <th>Name</th>
                                <th>Genre</th>
                                <th>Duration</th>
                                <th>Language</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movies as $movie)
                            <tr>
                                <td>{{ __($movie->id) }}</td>
                                <td>
                                    <img src="{{ asset($movie->poster) }}">
                                </td>
                                <td>{{ __($movie->name) }}</td>
                                <td>{{ __($movie->genre) }}</td>
                                <td>{{ __($movie->duration) }}</td>
                                <td>{{ __($movie->language) }}</td>
                                <td>{{ __($movie->desc) }}</td>
                                <td>
                                    <a href='{{ route('show_edit_movie',['movieid'=>$movie->id]) }}'><i style="font-size:medium;" class="fa fa-edit"></i></a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href='{{ route('delete_movie',['movieid'=>$movie->id]) }}' onclick="confirm('Are you sure you want to delete this movie')"><i style="font-size:medium;" class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span clas="paginate"> {{$movies->links()}} </span>
                    <button type="button" class="create-btn" onclick="window.location.href='{{ route('create_movie') }}'">Create New Movie</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>