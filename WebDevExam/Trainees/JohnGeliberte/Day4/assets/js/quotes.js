 $(document).ready (function() {
    var q = ['"You shall not pass!."',
    '"You are a Garbage can, not a Garbage CANNOT."',
    '"Dont let your dreams be dreams."',
    '"JUST DO IT - Shia labeouf."',
    '"Yesterday you said tomorrow."',
    '"Stop, think, do it."',
    '"SMART person can easily beaten by a WISE person"',
    '"The best thing in life is food"',
    '"Dont just quit when things fail"',
    '"Lick the back of your hand, thats what AWESOME taste like"'
    ];
    $("#quotes_btn").click(function() {
        var quote_randomizer = Math.floor(Math.random() * 10);
        document.getElementById("quote_id").innerHTML = q[quote_randomizer];
    });
});