<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Chat</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/socket.io-client/dist/socket.io.js"></script>
</head>
<body>
    <h2>Chat Diskusi</h2>
    <div id="chat-box" style="border:1px solid #ddd; padding:10px; width:300px; height:300px; overflow-y:scroll;">
        @foreach ($messages as $message)
            <p><strong>{{ $message->username }}:</strong> {{ $message->message }}</p>
        @endforeach
    </div>

    <input type="text" id="message" placeholder="Ketik pesan..." />
    <button onclick="sendMessage()">Kirim</button>

    <script src="../node_modules/laravel-echo/dist/echo.iife.min.js"></script>

    <script>
        // let username = {{ auth()->id() }};
        let chatBox = document.getElementById('chat-box');
        let messageInput = document.getElementById('message');

        // Kirim pesan
        function sendMessage() {
            let message = messageInput.value;
            if (message.trim() === "") return;

            axios.post('/chat', { message: message })
                .then(response => {
                    chatBox.innerHTML += `<p><strong>Anda:</strong> ${message}</p>`;
                    chatBox.scrollTop = chatBox.scrollHeight;
                    messageInput.value = "";
                })
                .catch(error => console.error(error));
        }

        // Realtime update dengan Laravel Reverb
        window.Echo = new Echo({
            broadcaster: 'reverb',
            host: 'http://127.0.0.1:8080'
        });

        Echo.channel('chat-channel')
            .listen('.new-message', (event) => {
                chatBox.innerHTML += `<p><strong>${event.message.user.name}:</strong> ${event.message.message}</p>`;
                chatBox.scrollTop = chatBox.scrollHeight;
            });
    </script>
</body>
</html>
