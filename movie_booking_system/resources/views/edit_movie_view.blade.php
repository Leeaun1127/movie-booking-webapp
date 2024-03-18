<x-app-layout>
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/edit_movie_view.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action='/edit_movie' method='POST' enctype="multipart/form-data">
                        @csrf
                        <table class="submit-table">
                            <tr>
                                <td><label for="movie">Movie Name:</label></td>
                                <td><input type="text" id="movie" name="movie" value='{{$movies->name}}' ></td>
                                <td rowspan="5"><img src="{{ asset($movies->poster) }}">
                                    @error('movie')
                                    <div class="alert alert-danger">{{ $message
                                    }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label for="genre">Movie Genre:</label></td>
                                <td><input type="text" id="genre" name="genre" value='{{$movies->genre}}' >
                                    @error('genre')
                                    <div class="alert alert-danger">{{ $message
                                    }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label for="duration">Movie Duration:</label></td>
                                <td><input type="text" id="duration" name="duration" value='{{$movies->duration}}' >
                                    @error('duration')
                                    <div class="alert alert-danger">{{ $message
                                    }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label for="lang">Movie Language:</label></td>
                                <td><input type="text" id="lang" name="lang" value='{{$movies->language}}' >
                                    @error('lang')
                                    <div class="alert alert-danger">{{ $message
                                    }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label for="desc">Movie Description:</label></td>
                                <td><input type="text" id="desc" name="desc" value='{{$movies->desc}}' >
                                    @error('desc')
                                    <div class="alert alert-danger">{{ $message
                                    }}</div>
                                    @enderror
                                </td>
                            </tr>
                        </table>
                        <input type="text" id="movieid" name="movieid" value={{$movies->id}} hidden>
                        <button type="submit" class="edit-btn">Save Edit</button>      
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>