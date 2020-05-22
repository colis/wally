'use strict';

const CACHE_NAME = 'wally-v1';
const ASSETS = [
	'/',
	'/wp-content/plugins/instagram-feed/img/placeholder.png',
	'/wp-content/uploads/sb-instagram-feed-images/wallyinuk.jpg',
];

self.addEventListener('install', event => {
	event.waitUntil(
		caches.open(CACHE_NAME).then(cache => {
			return cache.addAll(ASSETS);
		}).catch
	);
});

self.addEventListener('activate', event => {
	event.waitUntil(
		caches.keys().then(keyList => {
			return Promise.all(keyList.map(key => {
				if ( key !== CACHE_NAME ) {
					console.log('[ServiceWorker] Removing old cache', key);
					return caches.delete(key);
				}
			}));
		})
	);
});

self.addEventListener('fetch', event => {
	if ( event.request.mode === 'navigate' && navigator.onLine ) {
		event.respondWith(
			fetch(event.request).then(response => {
				return caches.open(CACHE_NAME).then(cache => {
					cache.put(event.request, response.clone());
					return response;
				});
			})
		);
		return;
	}

	event.respondWith(
		caches.match(event.request).then(response => {
			return response || fetch(event.request).then(response => {
				return caches.open(CACHE_NAME).then(cache => {
					cache.put(event.request, response.clone());
					return response;
				});
			});
		})
	);
});