require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pengaduan', require('./components/PengaduanNotification.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        pengaduans: '',
    },
    created() {
        if (window.Laravel.userId) {
            axios.post('/notification/pengaduan/notification').then(response => {
                this.pengaduans = response.data;
                timeAgo();
                if (this.pengaduans.toString() == "true") {
                    playSound();
                }
                console.log(response.data);
            });

            Echo.private('App.Admin.' + window.Laravel.userId).notification((response) => {
               data = {
                    "data": response,
                    'created_at': response.pengaduan.created_at
                };
                this.pengaduans.push(data);
                timeAgo();
                console.log(response);
            });
        };

        function timeAgo() {
            Vue.filter('myOwnTime', function(value) {
                return moment(value).fromNow();
            });
        };

        function playSound() {
            var audio = new Audio('http://soundbible.com/mp3/Open_Soda_Can-KP-1219969174.mp3');
            audio.muted = true;
            audio.play();
        };

    }
});
