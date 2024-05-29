<head>
    <link rel="stylesheet" href="resources/main.css">
</head>


    <div class="w-full px-5 flex flex-col justify-center items-center">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">Chat oficial</h1>
        <section id="chat" class="grid place-items-center mt-5 w-4/5">
            <div class="flex flex-col w-4/5 leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700 mb-2">
                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white">Lorem Ipsum</span>
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:11</span>
                </div>
                <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor</p>
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
            </div>
        </section>
        
    </div>
    <input type="text" id="messageInput" placeholder="Escribe tu mensaje">
    <button id="sendButton">Enviar</button> 
    

    <script type = "module">
        const socket = new WebSocket('ws://localhost:32768');

        const messagesElement = document.getElementById('chat');
        const messageInput = document.getElementById('messageInput');
        const sendButton = document.getElementById('sendButton');

        // Función para formatear la fecha y hora en el formato deseado
        const formatDateTime = (dateTimeString) => {
            // Convertir la cadena de tiempo en un objeto Date
            const dateTime = new Date(dateTimeString);

            // Restarle 6 horas al objeto Date
            dateTime.setHours(dateTime.getHours());

            // Opciones de formato para la fecha y hora
            const options = {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            };

            // Formatear la fecha y hora en el formato deseado
            const formattedDateTime = dateTime.toLocaleString('en-US', options);
            return formattedDateTime;
        };

        // Función para manejar los mensajes del servidor WebSocket
        const handleMessage = (event) => {
            const bodyMessage = JSON.parse(event.data);
            console.log(bodyMessage);

            // Crear un nuevo elemento div para el mensaje
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('flex', 'flex-col', 'w-4/5', 'leading-1.5', 'p-4', 'border-gray-200', 'bg-gray-100', 'rounded-e-xl', 'rounded-es-xl', 'dark:bg-gray-700', 'mb-2');
            
            const spanContainer = document.createElement('div');
            spanContainer.classList.add('flex', 'items-center', 'space-x-2', 'rtl:space-x-reverse');

            // Crear el contenido del mensaje con los datos del bodyMessage
            const authorSpan = document.createElement('span');
            authorSpan.classList.add('text-sm', 'font-semibold', 'text-gray-900', 'dark:text-white');
            authorSpan.textContent = bodyMessage.author;

            const timeSpan = document.createElement('span');
            timeSpan.classList.add('text-sm', 'font-normal', 'text-gray-500', 'dark:text-gray-400');
            if(bodyMessage.time != null){
                const formattedTime = formatDateTime(bodyMessage.time);
                timeSpan.textContent = formattedTime;
            } else {
                timeSpan.textContent = "";
            }

            const messageP = document.createElement('p');
            messageP.classList.add('text-sm', 'font-normal', 'py-2.5', 'text-gray-900', 'dark:text-white');
            messageP.textContent = bodyMessage.message;

            const statusSpan = document.createElement('span');
            statusSpan.classList.add('text-sm', 'font-normal', 'text-gray-500', 'dark:text-gray-400');
            statusSpan.textContent = "Delivered";

            // Agregar los elementos al div del mensaje
            spanContainer.appendChild(authorSpan);
            spanContainer.appendChild(timeSpan);
            messageDiv.appendChild(spanContainer);
            messageDiv.appendChild(messageP);
            messageDiv.appendChild(statusSpan);

            // Agregar el nuevo div del mensaje al elemento con id 'chat'
            document.getElementById('chat').appendChild(messageDiv);
        };


        socket.addEventListener('message', handleMessage);

        // Manejar el clic en el botón de enviar
        sendButton.addEventListener('click', () => {
            const message = messageInput.value;
            if (message.trim() !== '') {
                const now = new Date();
                const options = { timeZone: 'America/Mexico_City' };
                const time = now.toLocaleString('en-US', options);
                console.log("Hora en Guadalajara:", time);
                const author = '<?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : ""; ?>'
                const user_id = '<?php echo isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : ""; ?>'
                const sede_id = '<?php echo isset($_SESSION["user_sede_id"]) ? $_SESSION["user_sede_id"] : ""; ?>'
                const bodyMessage = { user_id, sede_id, message, time, author };
                socket.send(JSON.stringify(bodyMessage));
                messageInput.value = '';
            }
        });

        // Enviar el mensaje cuando se presiona la tecla "Enter"
        messageInput.addEventListener('keypress', (event) => {
            if (event.key === 'Enter') {
                sendButton.click();
            }
        });

        


    </script>


