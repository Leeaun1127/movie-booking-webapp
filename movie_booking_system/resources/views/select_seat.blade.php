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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/select_seat.css">
    </head>

    <body>
       
        <div class="seat-container">
            <table>
                <tr>
                    <td colspan="30"><div id="screen">Screen</div></td>
                </tr>
                <tr class="gap">
                    <td colspan="30"></td>
                </tr>
                <?php for($j=0;$j<12;$j++) { 
                    $z = 1;?>
                <tr>
                    <?php for($i=0;$i<5;$i++) { ?>
                        <td class="row" >
                            <div class="seat" onclick="toggleSeat(this)" value="<?=$j?>-<?=$z?>" id="<?=$j?>-<?=$z?>"></div>
                        </td>
                    <?php $z++; } ?>

                    <td class="walk"></td>

                    <?php for($i=0;$i<15;$i++) { ?>
                        <td class="row">
                            <div class="seat" onclick="toggleSeat(this)"  value="<?=$j?>-<?=$z?>" id="<?=$j?>-<?=$z?>"></div>
                        </td>
                    <?php $z++; } ?>

                    <td class="walk"></td>

                    <?php for($i=0;$i<5;$i++) { ?>
                        <td class="row" >
                            <div class="seat" onclick="toggleSeat(this)" value="<?=$j?>-<?=$z?>" id="<?=$j?>-<?=$z?>"></div>
                        </td>
                    <?php $z++; } ?>
                </tr>
                <?php } ?>
            </table>
            <script src="js/select_seat.js"></script>
        </div>
        <div id="overlay-receipt-container">
            <div id="receipt-container">
                <div class="close-btn">
                    <i class="fa fa-close" style="font-size:50px;" onclick="off()"></i>
                </div>
                <?php
                    if($data['date'] == 1){
                        $dDate = date("Y-m-d", strtotime("-2 day"));
                    }else if($data['date'] == 2){
                        $dDate = date("Y-m-d", strtotime("-1 day"));
                    }else if($data['date'] == 3){
                        $dDate = date("Y-m-d");
                    }else if($data['date'] == 4){
                        $dDate = date("Y-m-d", strtotime("+1 day"));
                    }else if($data['date'] == 5){
                        $dDate = date("Y-m-d", strtotime("+2 day"));
                    }
                ?>
                <div class="receipt-body">
                    <h1>Receipt</h1>
                    <table class="receipt-table">
                        <tbody class="receipt-table-body">
                            <tr>
                                <td>Movie Title :</td>
                                <td align="right">{{Movie::where('id', $data['movie'])->value('name')}}</td>
                            </tr>
                            <tr>
                                <td>Cinema :</td>
                                <td align="right">{{Location::where('id', $data['cinema'])->value('name')}}</td>
                            </tr>
                            <tr>
                                <td>Date :</td>
                                <td align="right">{{$dDate}}</td>
                            </tr>
                            <tr>
                                <td>Time :</td>
                                <td align="right">{{Time::where('id', $data['time'])->value('time')}}</td>
                            </tr>
                            <tr>
                                <td>Seat number :</td>
                                <td align="right" id="seat_num"></td>
                            </tr>
                            <tr>
                                <td>Ticket count :</td>
                                <td align="right" id="ticket_count"></td>
                            </tr>
                        </tbody>
                        <tfoot class="receipt-table-foot">
                            <tr>
                                <td>Total (RM)</td>
                                <td align="right" id="total_price"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="receipt-footer" id="receipt_footer"></div>
                </div>
                
                <div id="payment" class="payment w3-animate-bottom" onclick='loading(@json($data))'>
                    <div class="text">Proceed Payment</div>
                </div>
            </div>
        </div>
        <div id="overlay-loading">
            <div id="loading-container">
                <p><i class="fa fa-spinner w3-text-white w3-spin" style="font-size:64px"></i></p>
            </div>
        </div>
        
        <form action='/add_booking' method='POST'>
            @csrf
            <input type="text" id="movieS" name="movieS" value=0 hidden>
            <input type="text" id="dateS" name="dateS" value='{{$dDate}}' hidden>
            <input type="text" id="timeS" name="timeS" value=0 hidden>
            <input type="text" id="cinemaS" name="cinemaS" value=0 hidden>
            <input type="text" id="seatS" name="seatS" value=0 hidden>
            <button type="submit" id="add_booking_button" hidden></button>
        </form>
           
        <div class="page-container">
            <div id="proceed" class="proceed w3-animate-bottom">
                <div class="text">{{ __('Confirm') }}</div>
            </div>
    
        </div>
           
        
    </body>
</x-app-layout>