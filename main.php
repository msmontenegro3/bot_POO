<?php

//DATOS PARA LA CONEXIÓN CON TELEGRAM Y RECONOCIMIENTO DEL MENSAJE
$token= "bot5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4";

$data = file_get_contents("php://input");
$update = json_decode($data,true);
$message = $update['message'];

$id = $message["from"]["id"];
$name = $message["from"]["first_name"];
$text = $message["text"];



//ASIGNACIÓN COMANDO EN FORMATO /----

if(isset($text) && $text == '/start' ){
    $respuesta = "Hola " .$name. " bienvenido al bot que va a ayudarte a mejorar tus habilidades de programación 😄 \n\n
    A continuación tienes los comandos que puedes utilizar:
    \n /ejercicio1
    \n /help
    \n /indice
    \n /recursos";

    sendMessage($id,$respuesta,$token);
} 
else if (isset($text) && $text == '/help' ){
    $respuesta = "Este bot se encarga de generar ejercicios y guiarte en el proceso de abstracción, de acuerdo a los pilares de la programación orientada a objetos (POO) 😁.\n\nSabemos que puede ser un camino difícil, por lo que vas a iniciar con ejercicios sencillos, y asociarlos a su solución en diagrama UML. Una vez realizado el proceso de abstracción, recomendamos que desarrolles estos ejercicios en el lenguaje de programación Java.\n\n FAQ \n\n<b>¿Qué hago si no encuentro el teclado 😓?</b>\nPuedes abrir el teclado nuevamente con el botón que está en el cuadro de ingreso de texto, al lado derecho, antes del clip de adjuntar archivos\n\n¿<b>Cómo regreso a la pregunta anterior 🥴?</b>\nSólo copia el mensaje anterior a la pregunta que deseas ver y listo 🤩";

    sendMessage($id,$respuesta,$token);
} 

else if(isset($text) && $text == '/indice' ){
    $respuesta = "LISTA DE EJERCICIOS:\n
    /ejercicio1
    /ejercicio2";

    sendMessage($id,$respuesta,$token);
}

else if(isset($text) && $text == '/recursos' ){
    $respuesta = "LISTA DE ENLACES QUE PUEDEN INTERESARTE PARA ESTUDIAR:";
    sendMessage($id,$respuesta,$token);
    $respuesta = "Infografías: 
    \nhttps://teloexplicocongatitos.com/poster/tlecg07
    \nVideos explicativos:
    \nhttps://youtu.be/L8ywM1BQwT0
    \nCheatsheets:
    \nhttps://introcs.cs.princeton.edu/java/11cheatsheet/";

    sendMessage($id,$respuesta,$token);
}
//EJERCICIO1

else if (isset($text) && $text == '/ejercicio1' ){
    $sticker="CAACAgIAAxkBAAIBf2KR1nd5imaOmP_hbP1LbpgyElfTAAIoAANOXNIpuNOsexIyTdQkBA";
    sendSticker($id,$sticker,$token);

    $respuesta = "<b>Ejercicio número 1:</b> \n\n La compañía “acer” ha iniciado su trayecto dentro del mercado de la telefonía celular 📱. Con ese objetivo, se ha planteado el lanzamiento de diferentes modelos de celulares con su respectiva memoria, espacio y color. El programa que va a diseñar debe contemplar las principales características y acciones que puede realizar un celular como encenderse y hacer llamadas. Realice su solución en un diagrama de clases, o en código en Java. A continuación, va a recibir una serie de preguntas y respuestas que le van a servir de guía para su proceso de abstracción.\n\n En la parte inferior va a aparecer un teclado con opciones para que respondas la siguiente pregunta ¿Cuál <b>NO</b> corresponde a un atributo de la clase celular?";

    $keyboard= [
        ['Memoria','Conectarse a internet'],
        ['Tamaño (pulgadas)','Espacio (GB)']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
} 

//PRIMERA RESPUESTA
else if (isset($text) && $text == 'Conectarse a internet'){
    $sticker = "CAACAgEAAxkBAAEBG4xikkhecv_h6ogW4Kuaya68DiML2AACowQAAp-NkETEJoys9tiH2SQE";

    sendSticker($id,$sticker,$token);

    $respuesta = "Exacto!🤩 Recuerda que los atributos son características o propiedades de los objetos. Ahora selecciona cuál es un método de la clase celular.";
    $keyboard= [
        ['Color','Encender'],
        ['Marca','Espacio']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);

}
//SEGUNDA RESPUESTA
else if(isset($text) && $text == 'Encender'){

    $sticker = "CAACAgEAAxkBAAEBG5BikktWuHVV2pEAAWGt313-SdSuqYgAAt4CAAIpT5FEIAABzG5eGoJTJAQ";

    sendSticker($id,$sticker,$token);

    $respuesta = "Correcto!🤩 Recuerda que los métodos son las operaciones, funciones o acciones que puede hacer una clase.Para el estudio de POO te recomendamos realizar diagramas UML de las clases que vas creando.";
    sendMessage($id,$respuesta,$token);

    $photo = "https://bot-poo.000webhostapp.com/E1.1.png";

    $respuesta = "Ahora selecciona cuál de los diagramas correspondería a la clase Celular \n\n Recuerda que el orden de un diagrama UML para las calses es 1. Nombre de la clase 2. Atributos 3. Métodos.";

    $keyboard= [
        ['Diagrama 1','Diagrama 2'],
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);
    sendPhoto($id,$photo,$token);
    sendMessage($id,$respuesta,$token,$k);
    

}

//TERCERA RESPUESTA
else if (isset($text) && $text == 'Diagrama 1'){
    $sticker = "https://media.giphy.com/media/fwbZnTftCXVocKzfxR/giphy.gif";

    sendSticker($id,$sticker,$token);
    $respuesta = "✅ Vas súper bien ".$name." 🥳. Ahora es momento de abrir tu editor de código (netbeans, eclipse, o cualquiera que te guste) y responde: \n Cómo declararías la clase celular en Java:
    \n\n <b>Opciones</b>
    \n Celular{ … }
    \n public class Celular{ … }
    \n Void Celular ( ) { … }
    ";

    $keyboard= [
        ['Celular{ … }','Void Celular ( ) { … }'],
        ['public class Celular{ … }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//CUARTA RESPUESTA
else if (isset($text) && $text == 'public class Celular{ … }'){
    $respuesta = "Excelente! ✅ Recuerda, en Java las clases se declaran con la palabra reservada Class. \n\n Considerando que la clase “Celular” tiene los atributos color y memoria. ¿Cuál sería el constructor de la clase? 
    \n\n<b>Opciones</b>
    \npublic Celular(String color, int memoria, float espacio){...}
    \nprivate Constructor (String color, int memoria, float espacio) { … }
    \nCelular(String color, int memoria, float espacio) { … }";
    $keyboard= [
        ['public Celular(String color, int memoria, float espacio){...}'],
        ['private Constructor (String color, int memoria, float espacio) { … }'],
        ['Celular(String color, int memoria, float espacio) { … }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);

}

//QUINTA RESPUESTA
else if (isset($text) && $text == 'public Celular(String color, int memoria, float espacio){...}'){

    $sticker = "https://media.giphy.com/media/6G48V62YlbZj1W6fso/giphy.gif";

    sendSticker($id,$sticker,$token);


    $respuesta = "✅ Muy bien! Recuerda que el constructor 👷 permite darle un valor inicial a una instancia de clase. En Java el constructor debe recibir el mismo nombre de la clase.
    \n\n Ya que sabes declarar una clase y darle un estado inicial, ahora vas a recordar uno de los pilarres de POO 🏛️Encapsulamiento🏛️
    \n En la declaración de los atributos siguientes, ¿cuál utiliza encapsulamiento?
    \nOpciones
    \nString color = “rojo”;
    \nprivate String color; 
    ";
    $keyboard= [
        ['String color = “rojo”'],
        ['private String color']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//SEXTA RESPUESTA
else if (isset($text) && $text == 'private String color'){
    $respuesta = "✅ Estás en lo correcto 😄 En java, para proteger los atributos o clases de un objeto se utilizan las palabras reservadas (modificadores de acceso) private, public, protected. 
    \n\n Pero... y si quieres acceder o modificar algún atributo encapsulado es necesario utilizar métodos getters y setters. Cuál sería el método setter correcto para el atributo color.
    \n\nOpciones
    \npublic void setColor(String color) { … }
    \npublic String setColor() { … }
    ";
    $keyboard= [
        ['public void setColor(String color) { … }'],
        ['public String setColor() { … }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//SEXTA RESPUESTA
else if (isset($text) && $text == 'public void setColor(String color) { … }'){
    $respuesta = "✅ Perfecto 😀. Los métodos setters deben ser void porque no retornan un valor. Además, necesita un parámetro para establecerlo (aquí el parámetro es String color)
    \nEntonces ¿Cuál sería el método getter correcto para el atributo memoria?";
    $keyboard= [
        ['public void getMemoria(Int memoria) { … }'],
        ['public int getMemoria( ) { … }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//SÉPTIMA RESPUESTA
else if (isset($text) && $text == 'public int getMemoria( ) { … }'){
    $respuesta = '✅ Asombroso! 🥳 Sigue practicando y genera los métodos getters y setters para el resto de atributos de la clase celular.
    \Continuemos 🤗 Vas a programar un método que encienda el celular, ¿cuál es la mejor manera de implementarlo? Seleccione:
    •	Opción 1 public String enciende() {
		String estado="Encendiendo...";
		return estado;
        }
    •	Opción 2 public void enciende() {
		system.out.println(“Encendiendo”);
        }
    ';
    $keyboard= [
        ['Opción 1'],
        ['Opción 2']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//OCTAVA RESPUESTA
else if (isset($text) && $text == 'Opción 1'){

    $respuesta = "Súper! 🥳🥳🥳 No cometas el error de imprimir por consola, en lugar de retornar los datos que necesites.
    \n¿Qué sigue? Intenta ahora programar el método llamar, recuerda que debe recibir un parámetro (la persona a la que deseas llamar)";
    sendMessage($id,$respuesta,$token);

    $sticker = "https://media.giphy.com/media/du3J3cXyzhj75IOgvA/giphy.gif";

    sendSticker($id,$sticker,$token);

    $respuesta = "🎉 Has resuelto el primer estudio de caso 🎉. Instancia la clase celular en la clase main y prueba los métodos que has utilizado. 
    \nAquí tienes un repositorio con el ejercicio resuelto a nuestra manera para que te sirva de guía 🙈: \nhttps://github.com/msmontenegro3/estudioCaso1.git";
    sendMessage($id,$respuesta,$token);

}


//EJERCICIO 2
else if (isset($text) && $text == '/ejercicio2' ){
    $sticker="https://media.giphy.com/media/I0V9yJDaRYJbX6JeQO/giphy.gif";
    sendSticker($id,$sticker,$token);

    $respuesta = "La escuela “ABC” desea utilizar un programa que les ayude a sus estudiantes de niveles iniciales a reconocer los sonidos que hacen los animales. Los primeros animales que observan son los más cercanos a ellos, es decir, las mascotas. Por lo tanto, el programa debe reproducir el sonido (onomatopeya) que producen los siguientes animales: perro 🐕 y gato 🐈.";

    sendMessage($id,$respuesta,$token);

    $sticker="CAACAgIAAxkBAAEBIO9iosv7uq5nWggqvPWn5z6ZcNmglgAC3gAD9HsZAAG9he9u98XOPSQE";
    sendSticker($id,$sticker,$token);
    $respuesta = "Iniciemos programando la clase Perro. De las siguientes declaraciones ¿Cuál es un atributo para la clase Perro?";

    $keyboard= [
        ['private String Ladrar;', 'private Stirng Jugar;'],
        ['private String Raza;', 'private String Comer;']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
} 
//RESPUESTA 2.1
else if (isset($text) && $text == 'private String Raza;' ){

    $sticker="CAACAgEAAxkBAAEBG4xikkhecv_h6ogW4Kuaya68DiML2AACowQAAp-NkETEJoys9tiH2SQE";

    sendSticker($id,$sticker,$token);
    $respuesta = "✅ Exacto! Como ya te habíamos dicho, un atributo es una característica o un estado de la clase.";
    sendMessage($id,$respuesta,$token);

    $respuesta = "De la siguiente lista, ¿Qué método no corresponde a la clase Perro?";

    $keyboard= [
        ['Jugar', 'Ladrar'],
        ['Volar', 'Nadar']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//RESPUESTA 2.2
else if(isset($text) && $text == 'Volar' ){
    $respuesta = "✅ Correcto! El método volar no es una acción que pueda realizar un perro. Es importante identificar que los métodos dentro de una clase deben ser funciones u operaciones concernientes a la clase.\n\n
    Ahora pensemos en la clase Gato";

    sendMessage($id,$respuesta,$token);

    $sticker="CAACAgIAAxkBAAEBIPNiotTDEPnNQbc5KOzqwH_yTJ9e3QAC-AAD9HsZAAELURd6t1046SQE";
    sendSticker($id,$sticker,$token);

    $respuesta = "¿De qué manera debería instanciarse esa clase en Java?";

    $keyboard= [
        ['Gato gato = new Gato;', 'Gato gato = class Gato'],
        ['Gato gato = new Gato();', 'Gato gato = extends Gato();']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
} 

//RESPUESTA 2.3
else if(isset($text) && $text == 'Gato gato = new Gato();' ){
    $respuesta = "✅ Buen trabajo! En Java para instanciar una clase se utiliza la palabra reservada new.\n\nBien, ahora imagina que este sistema va a crecer, y va a contener a todas las mascotas, y por qué no, a todos los seres vivos. Entonces existe la necesidad de utilizar herencia.";

    sendMessage($id,$respuesta,$token);
    
    $respuesta = "Entonces ¿Cuál de los siguientes diagramas UML es el correcto para la relación entre animal, gato y perro?";

    $photo = "https://oop.rocketpym.com/E2.1.png";
    sendPhoto($id,$photo,$token);
    $keyboard= [
        ['UML 1'],
        ['UML 2'],
        ['UML 3']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);  
}

//RESPUESTA 2.4
else if(isset($text) && $text == 'UML 1' ){
    $respuesta = "✅ Enhorabuena! La clase gato y perro van a heredar atributos y métodos de la clase animal. Evidentemente se cumple la regla de “es un” para identificar si existe herencia.";

    sendMessage($id,$respuesta,$token);

    $respuesta = "¿Cómo debe declararse en Java la clase Gato, considerando que hereda de animal?";

    $keyboard= [
        ['public class Gato extends Animal{ … }'],
        ['public class Animal extends Pato{ … }'],
        ['public class Gato super Animal{ … }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k); 
}

//RESPUESTA 2.5
else if(isset($text) && $text == 'public class Gato extends Animal{ … }' ){
    $respuesta = "✅ Muy bien! En Java la palabra extends se utiliza para declarar la herencia existente entre las clases";

    sendMessage($id,$respuesta,$token);
    $respuesta = "¿Cómo se llama al constructor de la clase padre, desde el constructor de la clase Gato?";

    $keyboard= [
        ['public Gato(){extends();}'],
        ['public Gato(){this();}'],
        ['public Gato(){super();}']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k); 
}

//RESPUESTA 2.6
else if(isset($text) && $text == 'public Gato(){super();}' ){
    $respuesta = "✅ Súper! La palabra reservada super, invoca al constructor de la clase padre (en este caso invoca al constructor de animal).";

    sendMessage($id,$respuesta,$token);
    $respuesta = "Y si la clase padre recibe como parámetros nombre y raza ¿Cómo debe declararse el constructor de la clase hija Perro?";

    $keyboard= [
        ['public Perro(){super(nombre, raza);}'],
        ['public Perro(String nombre, String raza){super();}'],
        ['public Perro(String nombre, String raza){super(nombre, raza);}']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//RESPUESTA 2.6
else if(isset($text) && $text == 'public Perro(String nombre, String raza){super(nombre, raza);}' ){
    $respuesta = "✅ Estás en lo correcto! Si la clase padre tiene un constructor, que recibe parámetros, la clase hija también debe recibir los mismos parámetros.";

    sendMessage($id,$respuesta,$token);
    
}















//RESPUESTA POR DEFECTO
else if(isset($text)){
    $respuesta = "Te equivocaste, intenta de nuevo 😅. Si tienes problemas puedes usar el comando /help";

    sendMessage($id,$respuesta,$token);
} 

//ENVÍO Y CONEXIÓN API DE TELEGRAM

//Función para enviar menssajes
function sendMessage($chatID, $messaggio, $token,&$k = ''){
    $url = "https://api.telegram.org/" . $token . "/sendMessage?disable_web_page_preview=false&parse_mode=HTML&chat_id=" . $chatID;

	if(isset($k)) {
		$url = $url."&reply_markup=".$k; 
		}


        $url = $url."&text=" . urlencode($messaggio);
        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

//Función para enviar fotos
function sendPhoto($chatID, $photo, $token){
    $url = "https://api.telegram.org/" . $token . "/sendPhoto?photo=".$photo."&chat_id=" . $chatID;

    $url = $url."&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

//Aquí puede mandar stickers al menos desde la web
function sendSticker($chatID, $sticker, $token){
    $url = "https://api.telegram.org/" . $token . "/sendSticker?sticker=".$sticker."&chat_id=" . $chatID;

    $url = $url."&text=" . urlencode($sticker);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
?>


