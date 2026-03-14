<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live Chat - Home Service Platform</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f8f8f8; /* Light grey background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .chat-box { 
            width: 100%; 
            max-width: 400px; 
            margin: auto; 
            border: 1px solid #ccc; 
            padding: 10px; 
            background-color: white; /* White background for chat box */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for effect */
            border-radius: 8px; /* Rounded corners */
        }
        .chat-messages { 
            height: 300px; 
            overflow-y: auto; 
            border-bottom: 1px solid #ccc; 
            margin-bottom: 10px; 
            padding: 5px; 
            background-color: #f9f9f9; /* Slightly lighter grey */
            border-radius: 4px;
        }
        .message { margin-bottom: 8px; }
        .username { font-weight: bold; color: #333; }
        .timestamp { font-size: 0.8em; color: #888; }
        input[type="text"] {
            width: calc(100% - 80px);
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 8px;
            background-color: #4CAF50; /* Green button color */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 60px;
        }
        button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <div class="chat-box">
        <div class="chat-messages" id="chatMessages">
            <!-- Messages will load here -->
        </div>
        <input type="text" id="username" placeholder="Your name" required>
        <input type="text" id="message" placeholder="Type a message" required>
        <button onclick="sendMessage()">Send</button>
    </div>

    <script>
        // Function to load messages from the database
        function loadMessages() {
            fetch('load_messages.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('chatMessages').innerHTML = data;
                    document.getElementById('chatMessages').scrollTop = document.getElementById('chatMessages').scrollHeight;
                });
        }

        // Function to send a message
        function sendMessage() {
            const username = document.getElementById('username').value;
            const message = document.getElementById('message').value;
            if (username && message) {
                fetch('send_message.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `username=${encodeURIComponent(username)}&message=${encodeURIComponent(message)}`
                }).then(() => {
                    document.getElementById('message').value = '';
                    loadMessages(); // Refresh chat after sending
                });
            }
        }

        // Automatically refresh messages every 2 seconds
        setInterval(loadMessages, 2000);
        
        // Load messages initially when the page loads
        window.onload = loadMessages;
    </script>
</body>
</html>
