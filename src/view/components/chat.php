<head>
    <link rel="stylesheet" href="resources/main.css">
</head>

<div class="w-full place-content-center row-end-1 my-10 inline-block" style="height: 600px">
        <div>
            <h1 class="text-center mb-1 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">Chat oficial</h1>
        </div>
    <div class=" w-5/6 place-content-center inline-block rounded-lg shadow-lg content-center">
        <div class="w-full inline-block  " >
            <div class="w-5/6 px-5 flex flex-col   ">
                <section id="chat" class="grid place-items-center  mt-5  w-4/5">
                    <div class="flex flex-col w-4/5 leading-1.5 p-4 shadow-lg bg-blue-200 rounded-lg mb-2">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">Lorem Ipsum</span>
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:11</span>
                        </div>
                        <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor</p>
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
                    </div>
                </section>
            </div>
        </div>

        <div class="flex p-4   ">
            <div class="w-5/6">
                <input type="text" id="messageInput" class="border-gray-100 border-2 w-full rounded-lg p-3" placeholder="Escribe tu mensaje">
            </div>
            <div class="w-1/6 place-content-center flex" >
                <div>
                    <button class="bg-blue-300 p-2 rounded-full"  id="sendButton">
                        <svg width="34px" height="34px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M15.712 7.72681L9.89099 13.5478" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.8912 13.548L3.0762 9.381C2.1832 8.835 2.3642 7.488 3.3702 7.197L19.4602 2.549C20.3752 2.284 21.2212 3.138 20.9472 4.05L16.1732 20.014C15.8742 21.014 14.5332 21.186 13.9912 20.294L9.8912 13.548" stroke="#000000" stroke-width="0.8" ></path> </g></svg>
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
    

    <script type = "module">
        const socket = new WebSocket('ws://45.79.19.252:3005');

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


