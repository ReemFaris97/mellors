Pusher.logToConsole = true;

var pusher = new Pusher('d4b71e3af5d51391b4ea', {
    cluster: 'mt1',
    encrypted: true


});

var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
// var notifications = notificationsWrapper.find('li.scrollable-container');
// var channel = pusher.subscribe('timeSlot-notification');
var rideStatus = pusher.subscribe('ride-status');
var rideQueue = pusher.subscribe('ride-queue');
var totalRiders = pusher.subscribe('total_riders');

var not = pusher.subscribe('User.Notifications.' + currentUser);

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

function notification() {
    var newNotificationHtml = '<li class=""> <a href="#" class="media"> <div class="media-body"> <p class="notification-text font-small-3 text-muted"> ' + data.data.title + '</p> </div> <span style="direction: ltr;"class="date">' + data.data.date + '</span> </a> </li>';
    $('#appendNotifications').prepend(newNotificationHtml);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
}

not.bind('App\\Events\\StoppageEvent', function (data) {
    notification();
    console.log(data);
});
not.bind('App\\Events\\ReportEvent', function (data) {
    notification();
});

not.bind('App\\Events\\RsrReportEvent', function (data) {
    notification();
});

totalRiders.bind('App\\Events\\TotalRidersEvent', function (data) {
    console.log(data);
    var oldnumber = $("#park-" + data.data.id).html();
    $("#park-" + data.data.id).html(parseInt(oldnumber) + parseInt(data.data.count));
});
