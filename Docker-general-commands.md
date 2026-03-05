**=======================Docker Conceptos Básicos=======================**



* **Imagen:** Es una plantilla o molde para crear contenedores, es inmutable y se construye con 

&nbsp;  un Dockerfile, se construye como una clase en programación orientada a objetos. Las imágenes 

&nbsp;  pueden ser de programas, sistemas operativos, paqueterías, librerías o extensiones de otros 

&nbsp;  programas.



* **Contenedor:** Es una instancia en ejecución de una imagen, es ligero, aislado

    y tiene su propio sistema de archivos, red y procesos, se puede iniciar, detener y borrar.



* **Volumen:** Sirve para guardar datos de forma persistente, vive fuera del contenedor, permite 

&nbsp;  que los datos sobrevivan aunque borras el servidor y es ideal para bases de datos.





**=======================Docker Comandos Básicos=======================**



° **docker --versión** ---> Te muestra tu versión de Docker.

° **docker info** ---> Da información de contenedores y comandos.

° **docker ps** ---> Ver contenedores en ejecución.

° **docker ps -a** ---> Ver todos los contenedores.

° **docker images** ---> Muestra todas tus imágenes de docker.

° **docker pull  \[programa/paqueteria/sistema]:\[versión]** ---> Descarga una imagen 

° **docker build -t \[nombre de imagen ] \[dirección]** ---> Convierte un dockerfile en imagen (en una dirección actual pon solo un punto ".").

° **docker rmi \[id\_imagen]** ---> Elimina una imagen.

° **docker rmi -F \[id\_imagen]** ---> Elimina una imagen de manera forzosa. 

° **docker tag \[id\_imagen]** \[Nombre de Imagen]:\[Tag] ---> agrega Tags a imágenes existentes.

° **docker image prune** ---> Elimina imágenes sin usar.





**=======================Docker Comandos de Ejecución=======================**

 

**# docker run \[Nombre de imagen]** ---> Ejecuta una imagen convirtiendola de contenedor y ejecutando ese contenedor.

**# docker run \[Atributos] \[Nombre de imagen]:** Run tiene varios atributos de ejecucion entre los mas comunes estan:

**# " -d " ---------------------------->** Hace que el comando se ejecute en segundo plano. 
**# " -p \[puerto]:\[numero de puerto]** "**->** Se define en que puerto de tu red se ejecuta tu contenedor, es util para conexiones de bases de datos. 
**# " -e \[ variable = valor] " -------->** Esto ejecuta un contenedor con variables de entorno, con esto puedes definir contraseñas y nombres de usuario en bases de datos.
**# " -v \[datos:/var/lib/posql] " ------->** Esto crea subcarpetas dentro del contenedor donde se guarda informacion que persistira aun si se apaga o reinicia el contenedor.

**# " docker run -it ubuntu bash " ------>** Esto hace que puedas meterte en las subcarpetas del servidor pero en el caso de este comando varia dependiendo del programa
ya que en el caso presente es para meterse a un sistema operativo comprimido en imagen, en este caso debes investigar aparte o revisar el dockerfile en el que se basa.



**=======================Docker Comandos de Administración=======================**



**> docker ps --size ---->** Muestra los todos los contenedores en detalle.

**> docker stats -------->** Muestra el rendimiento de los contenedores.

**> docker stop \[nombre de contenedor] ----->** Detiene un contenedor.

**> docker start \[nombre de contenedor] ---->** Inicia un contenedor.
**> docker restart \[nombre de contenedor] -->** Reinicia un contenedor.

**> docker rm \[nombre de contenedor] ------->** Elimina un contenedor.

**> docker rm -F \[nombre de contenedor] ---->** Lo mismo que lo anterior pero forzosamente.

**> docker system prune -------------------->** Limpia recursos de docker sin usar.



**=======================Docker Comandos de Inspección y Debugs=======================**



**\& docker logs \[nombre de contenedor] ----->** Muestra los logs o registros del contenedor.

**\& docker logs -F \[nombre de contenedor] -->** Muestra los registros del contenedor en tiempo real.

**\& docker inspect \[nombre de contenedor] -->** Muestra los detalles técnicos del contenedor.



**=======================Docker Comandos de Volúmenes=======================**



**@ docker volume ls** -------> Muestra todos los volúmenes.   

**@ docker volume create \[nombre de volumen] -->** Crea un volumen.

**@ docker volume rm  \[nombre de volumen] ----->** Elimina un volumen.

**@ docker volume prune ----------------------->** Elimina volúmenes sin usar.



* Como usar un volumen anteriormente creado:

**docker run -v \[nombre de volumen]:/var/lib/postgresql/data \[nombre de imagen]**



**=======================Docker Comandos de Red=======================**



**: docker network ls -------->** Muestra las redes configuradas.

**: docker network create \[nombre de red] --->** Crea una red.

**: docker run --network \[nombre de red] \[nombre de imagen] --->** establece la red en una imagen.





**=======================DockerHub 101=======================**

1. **docker login -a \[nombre de usuario] -->** necesitas una cuenta en dockerhub y al poner el comando te pide tu contraseña.
2. **docker build -t \[nombre de usuario]/\[nombre de imagen:version]  --->** construyes una imagen para dockerhub.
3. **docker push \[nombre de usuario]/\[nombre de imagen:version] -------->** subes la imagen a tu perfil de dockerhub.
4. **docker pull \[nombre de usuario]/\[nombre de imagen:version] -------->** descargas una imagen de un perfil de dockerhub.







