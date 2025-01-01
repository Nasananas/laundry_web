import './bootstrap';

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

const echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

// Mendengarkan event 'order-status-updated' di channel pengguna
const userId = '{{ Auth::user()->id }}'; // ID pengguna yang sedang login
echo.channel('user.' + userId)
    .listen('OrderStatusUpdated', (event) => {
        console.log('Pesanan #'+ event.order.id + ' statusnya berubah menjadi: ' + event.status);

        // Menampilkan notifikasi
        const notificationCountElement = document.getElementById('notification-count');
        const currentCount = parseInt(notificationCountElement.innerText) || 0;
        notificationCountElement.innerText = currentCount + 1; // Menambahkan jumlah notifikasi

        // Menambahkan notifikasi ke dalam list notifikasi
        const notificationList = document.getElementById('notification-list');
        const notification = document.createElement('li');
        notification.innerText = `Pesanan #${event.order.id} statusnya berubah menjadi ${event.status}`;
        notificationList.appendChild(notification);
    });
