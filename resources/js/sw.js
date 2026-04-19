// self.addEventListener("push", (event) => {

//     notification = event.data.json();

// // {"title" : "Hi", "body": "Check this out", "url": "/?message1"}

//     event.waitUntil(self.registration.showNotification(notification.title, {

//         body: notification.body,
//         icon: "icon.png",
//         data: {
//             notifURL: notification.url
//         }
//     }));

// });

// self.addEventListener("notificationClick", (event) => {

//    event.waitUntil(clients.openWindow(event.notification.data.notifURL));

// } );


self.addEventListener('push', function (e) {
    if (!(self.Notification && self.Notification.permission === 'granted')) {
        //notifications aren't supported or permission not granted!
        return;
    }

    if (e.data) {
        var msg = e.data.json();
        console.log(msg)
        e.waitUntil(self.registration.showNotification(msg.title, {
            body: msg.body,
            icon: msg.icon,
            actions: msg.actions
        }));
    }
});
