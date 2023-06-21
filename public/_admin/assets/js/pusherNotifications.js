import Echo from './laravel-echo';
const echo = new Echo({ broadcaster: 'pusher', key: 'd4b71e3af5d51391b4ea', 
cluster: 'mt1',
 encrypted: true });
 export default echo;



   // Enable pusher logging - don't include this in production
   Pusher.logToConsole = true;
   var pusher = new Pusher('d4b71e3af5d51391b4ea', {
    encrypted: true,
    cluster: 'mt1'

  });
 var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('li.scrollable-container');
var channel = pusher.subscribe('timeSlot-notification');


echo.channel('timeSlot-notification') .listen('time-slot', (data) => { console.log(data.message) })

channel.bind('App\\Events\\timeSlotNotification', function (data) {

    var existingNotifications = notifications.html();
    var newNotificationHtml = '<a href="'+data.user_id+'"><div class="media-body"><h6 class="media-heading text-right">' + data.start + '</h6> <p class="notification-text font-small-3 text-muted text-right">' + data.end + '</p><small style="direction: ltr;"><p class="media-meta text-muted text-right" style="direction: ltr;">' + data.date + data.close_date + '</p> </small></div></div></a>';
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
}); 
