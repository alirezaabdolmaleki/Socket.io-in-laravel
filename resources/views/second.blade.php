<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
    <!-- Styles -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.socket.io/4.5.3/socket.io.min.js"
        integrity="sha384-WPFUvHkB1aHA5TDSZi6xtDgkF0wXJcIIxXhC6h8OT8EH3fC5PWro5pWJ1THjcfEi" crossorigin="anonymous">
    </script>
 

</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
      

        <div class="container card shadow text center" id="chat">
         
        </div>
    </div>


    <div class="text-center card p-3">
        <div class="form-group m-2">
              <input type="text" class="form-control  text-center" id="message" aria-describedby="emailHelp"
                placeholder="Enter email">
        </div>

        <button type="submit" onclick="sendMessage()" class="btn btn-primary">send</button>

    </div>



    <script>
        let socket;

        $(function() {

            let ip_address = '127.0.0.1';
            let socket_port = '3001';
            socket = io(ip_address + ':' + socket_port);

            socket.on('connection');

            socket.on('sendChatToClient', (message) => {
                $('#chat').append('<p class="text-end p-1">' + message + '</p>');

            });
        });


        function sendMessage() {

            let message = $('#message').val();
            socket.emit('sendChatToServer', message);


            $('#chat').append('<p class="text-start p-1">' + message + '</p>');
            $('#message').val('');

        }
    </script>


</body>

</html>
