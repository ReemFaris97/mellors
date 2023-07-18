
Pusher.logToConsole = true;

var pusher = new Pusher('d4b71e3af5d51391b4ea', {
    encrypted: true


});

var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('li.scrollable-container');

var channel = pusher.subscribe('timeSlot-notification');
var rideStatus = pusher.subscribe('ride-status');
var rideQueue = pusher.subscribe('ride-queue');
var not = pusher.subscribe('User.Notifications.'+currentUser);

console.log(not);
 channel.bind('App\\Events\\timeSlotNotification', function (data) {
    console.log('working');
    console.log(data);
    var existingNotifications = notifications.html();
    var newNotificationHtml = '<a href="' + data.user_id + '"><div class="media-body"><h6 class="media-heading text-right">' + data.start + '</h6> <p class="notification-text font-small-3 text-muted text-right">' + data.end + '</p><small style="direction: ltr;"><p class="media-meta text-muted text-right" style="direction: ltr;">' + data.date + data.close_date + '</p> </small></div></div></a>';
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();


    console.log(data);
});
rideStatus.bind('App\\Events\\RideStatusEvent', function (data) {
    console.log(data);

    if (data.data.status === "active") {
        document.getElementById("rideStatus" + data.data.id).style.backgroundColor = "#c6efce";
        $("#tooltip" + data.data.id).attr("data-original-title", data.data.sub_cat);

    } else {
        document.getElementById("rideStatus" + data.data.id).style.backgroundColor = "#ffc7ce";
        $("#tooltip" + data.data.id).attr("data-original-title", data.data.sub_cat);
    }

});
rideQueue.bind('App\\Events\\RideQueueEvent', function (data) {
    console.log(data);

    if (data.data.status === "active") {
        $("#rideQueue" + data.data.id).addClass("playHasQue");

    } else {
        $("#rideQueue" + data.data.id).removeClass("playHasQue");

    }

});

not.bind('App\\Events\\StoppageEvent', function (data) {
    console.log(data);

});
// window.Echo.channel('User.Notifications.'+currentUser)
//     .listen('App\\Events\\StoppageEvent', (e) => {
//         console.log(e);
//     });




// var channel2 = Echo.channel('User.Notifications.'+currentUser);
// console.log(channel2)
// channel2.listen('StoppageEvent', function(data) {
//     alert(JSON.stringify(data));
// });
Echo.private(`User.Notifications.${currentUser}`)
    .notification((notification) => {
        console.log(notification);

    });
