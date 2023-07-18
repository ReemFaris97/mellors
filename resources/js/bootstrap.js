import eu from "../../public/_admin/assets/plugins/moment/src/locale/eu";

window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'd4b71e3af5d51391b4ea',
    // cluster: eu,
    forceTLS: true
});
// var channel2 = Echo.channel('User.Notifications.'+currentUser);
// channel2.listen('StoppageEvent', function(data) {
//     alert(JSON.stringify(data));
// });
