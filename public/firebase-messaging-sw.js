/* Firebase Cloud Messaging — service worker (must live at site root: /firebase-messaging-sw.js) */
importScripts('https://www.gstatic.com/firebasejs/10.12.0/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/10.12.0/firebase-messaging-compat.js');

firebase.initializeApp({
  apiKey: 'AIzaSyB-KcVMEb8TMyO6HKbthQ6m6tMXEadGyQ4',
  authDomain: 'quickart-customer.firebaseapp.com',
  projectId: 'quickart-customer',
  messagingSenderId: '616864050624',
  appId: '1:616864050624:web:2edcc5d6a43bb4c9b92c25',
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(function (payload) {
  console.log('[firebase-messaging-sw.js] Background message', payload);
});
