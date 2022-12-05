require('./bootstrap');


var channel = pusher.subscribe('article');
channel.bind('created', function(data) {
    let count = parseInt($(".badge-js").text());
    console.log(JSON.stringify(data));
    count++;
    $(".badge-js").text(count);
});

