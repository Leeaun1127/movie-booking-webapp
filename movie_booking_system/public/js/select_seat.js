allSeats = document.querySelectorAll('.seat');
var count = 0;
var seat = [];

function checkSelection(){
    if(count > 0){
        console.log('seat selected');

        document.getElementById("proceed").style["display"] = "block";

        const proceedButton = document.getElementById('proceed');
        proceedButton.addEventListener('click', () => {
            console.log('Button clicked!');
            
            var receipt = document.getElementById('receipt_footer');
            receipt.innerHTML='';
            var seatstring='';
            seat.forEach(function(perseat){
               seatstring+=perseat+',';
            });
            var seatstring1 = seatstring.substr(0,seatstring.length-1);
            displayprice = document.createElement("h3");
            document.getElementById('seat_num').innerHTML = seatstring1;
            document.getElementById('ticket_count').innerHTML = count;
            document.getElementById('total_price').innerHTML = count*12;
            document.getElementById("seatS").value = seatstring1;
            on();
        });
    }else{
        document.getElementById("proceed").style["display"] = "none";
    }
}

function toggleSeat(element){
    element.classList.toggle("selected");
    if(element.classList.contains('selected')){
        if(!(seat.includes(element.id))){
            seat.push(element.id);
        }
        
        count++;
    }else{
        seat.splice(seat.indexOf(element.id), 1);
        count--;
    }

    checkSelection();
}

function on() {
    document.getElementById("overlay-receipt-container").style.display = "block";
}

function off() {
    document.getElementById("overlay-receipt-container").style.display = "none";
}

function loading(data){
    console.log(data['cinema']);
    document.getElementById("movieS").value = data['movie'];
    document.getElementById("timeS").value = data['time'];
    document.getElementById("cinemaS").value = data['cinema'];
    document.getElementById("overlay-loading").style.display = "block";
    
   
    setTimeout(function() {
        document.getElementById("add_booking_button").click();
        console.log(document.getElementById("movieS").value);
    }, 2000); // 2 second
}

