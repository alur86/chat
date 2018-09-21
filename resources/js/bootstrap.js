import Echo from "laravel-echo"

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'ab6b08e72faf81c2cd76',
    cluster: 'eu',
    encrypted: true
});