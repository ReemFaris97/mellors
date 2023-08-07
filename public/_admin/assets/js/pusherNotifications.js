Pusher.logToConsole = true;

var pusher = new Pusher('ceda1182e958c5909414', {
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

function notification(data) {
    var newNotificationHtml = '<li class=""> <a href="' + data.data.action + '" class="media"> <div class="media-body"> <p class="notification-text font-small-3 text-muted"> ' + data.data.title + '</p> </div> <span style="direction: ltr;"class="date">' + data.data.date + '</span> </a> </li>';
    $('#appendNotifications').prepend(newNotificationHtml);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
}

not.bind('App\\Events\\RsrReportEvent', function (data) {

    notification(data);

});

not.bind('App\\Events\\StoppageEvent', function (data) {

    notification(data);
});
not.bind('App\\Events\\ReportEvent', function (data) {
    console.log(data)
    notification(data);
});



totalRiders.bind('App\\Events\\TotalRidersEvent', function (data) {
    console.log(data);
    var oldnumber = $("#park-" + data.data.id).html();
    $("#park-" + data.data.id).html(parseInt(oldnumber) + parseInt(data.data.count));
});



const beamsClient = new PusherPushNotifications.Client({
    instanceId: '108f46b7-7e81-4a23-b0e1-e6f44d4fdc64',
});

beamsClient.start()
    .then(() => beamsClient.addDeviceInterest('hello'))
    .then(() => console.log('Successfully registered and subscribed!'))
    .catch(console.error);

