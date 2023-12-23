<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
{{-- <script src="{{ asset('cdn/js/firebase-messaging-sw.js') }}"></script> --}}

<button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-danger btn-xs btn-flat">Bildirim
    izni</button>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyASr8dEB9oEKIGAFxOK8zSloHHrEjT7Kds",
        authDomain: "menufoo-69d4b.firebaseapp.com",
        projectId: "menufoo-69d4b",
        storageBucket: "menufoo-69d4b.appspot.com",
        messagingSenderId: "951178378316",
        appId: "1:951178378316:web:443f3e3e2e5ac6015148e9",
        measurementId: "G-67XD1C6941"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
        messaging
            .requestPermission()
            .then(function() {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);



            }).catch(function(err) {
                console.log('User Chat Token Error' + err);
            });
    }

    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });
</script>
