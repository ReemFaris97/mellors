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
        $("#tooltip" + data.data.id).remove();

    } else {
        $("#rideQueue2").html();
        $("#rideQueue" + data.data.id).prepend(`<div class="tooltip-outer">
        <div class="tooltip-icon" id="tooltip`+ data.data.id + `" data-toggle="tooltip" title="" data-original-title="` + data.data.sub_cat + `"><i class="fa fa-info-circle"> </i></div>
        </div>`);

        document.getElementById("rideStatus" + data.data.id).style.backgroundColor = "#ffc7ce";

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

function playSound() {
    const audio = new Audio('/audios/notification.mp3');
    audio.play();
}

function notification(data) {
    var newNotificationHtml = '<li class=""> <a href="' + data.data.action + '" class="media"> <div class="media-body"> <p class="notification-text font-small-3 text-muted"> ' + data.data.title + '</p> </div> <span style="direction: ltr;"class="date">' + data.data.date + '</span> </a> </li>';
    $('#appendNotifications').prepend(newNotificationHtml);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();

    $("#not-realtime").html('');
    $("#notif-real").addClass("visible-notif");
    $("#not-realtime").append(data.data.title +' <a href="' + data.data.action + '" class="notif-link">here</a>');
    document.getElementById('notif-real').style.animation = 'movein 0.5s ease forwards, moveout 0.5s 5s ease forwards'
}

not.bind('App\\Events\\RsrReportEvent', function (data) {

    notification(data);
    playSound();
    $("#notif-real").addClass("visible-notif");
    $("#not-realtime").append(data.data.title +' <a href="' + data.data.action + '" class="notif-link">here</a>');
    console.log(111)

});

not.bind('App\\Events\\StoppageEvent', function (data) {

    notification(data);
    playSound();


});
not.bind('App\\Events\\ReportEvent', function (data) {
    console.log(data)
    notification(data);
    playSound();

});


totalRiders.bind('App\\Events\\TotalRidersEvent', function (data) {
    console.log(data);
    var oldnumber = $("#park-" + data.data.id).html();
    $("#park-" + data.data.id).html(parseInt(oldnumber) + parseInt(data.data.count));
});



const beamsClient = new PusherPushNotifications.Client({
    instanceId: '5ff5290c-319d-46b8-b077-84ad0350650c',
});

beamsClient.start()
    .then(() => beamsClient.addDeviceInterest('hello'))
    .then(() => console.log('Successfully registered and subscribed!'))
    .catch(console.error);

