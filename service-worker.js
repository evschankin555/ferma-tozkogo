self.addEventListener('install', event => {
    event.waitUntil(
        caches.open('app-cache').then(cache => {
            return cache.addAll([
                '/',
                '/index.php',
                '/manifest.json',
                '/icon.png',
            ]);
        })
    );
});

self.addEventListener('fetch', event => {
    event.respondWith(
        // Проверяем, является ли запрос методом GET
        event.request.method === 'GET'
            ? (
                // Пробуем загрузить ресурс с сервера
                fetch(event.request).then(response => {
                    // Клонируем ответ, чтобы его можно было использовать и вернуть в fetch
                    const responseClone = response.clone();

                    // Сохраняем ресурс в кеше
                    caches.open('app-cache').then(cache => {
                        cache.put(event.request, responseClone);
                    });

                    return response;
                }).catch(() => {
                    // Если запрос к серверу не удался, пытаемся получить ресурс из кеша
                    return caches.match(event.request);
                })
            )
            : (
                // Если запрос не методом GET, просто возвращаем его
                fetch(event.request)
            )
    );
});

