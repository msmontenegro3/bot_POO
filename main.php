<?php

//DATOS PARA LA CONEXI脫N CON TELEGRAM Y RECONOCIMIENTO DEL MENSAJE
$token= "bot5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4";

$data = file_get_contents("php://input");
$update = json_decode($data,true);
$message = $update['message'];

$id = $message["from"]["id"];
$name = $message["from"]["first_name"];
$text = $message["text"];



//ASIGNACI脫N COMANDO EN FORMATO /----

if(isset($text) && $text == '/start' ){
    $respuesta = "Hola " .$name. " bienvenido al bot que va a ayudarte a mejorar tus habilidades de programaci贸n 馃槃 \n\n
    A continuaci贸n tienes los comandos que puedes utilizar:
    \n /ejercicio1
    \n /help
    \n /indice
    \n /recursos";

    sendMessage($id,$respuesta,$token);
} 
else if (isset($text) && $text == '/help' ){
    $respuesta = "Este bot se encarga de generar ejercicios y guiarte en el proceso de abstracci贸n, de acuerdo a los pilares de la programaci贸n orientada a objetos (POO) 馃榿.\n\nSabemos que puede ser un camino dif铆cil, por lo que vas a iniciar con ejercicios sencillos, y asociarlos a su soluci贸n en diagrama UML. Una vez realizado el proceso de abstracci贸n, recomendamos que desarrolles estos ejercicios en el lenguaje de programaci贸n Java.\n\n FAQ \n\n<b>驴Qu茅 hago si no encuentro el teclado 馃槗?</b>\nPuedes abrir el teclado nuevamente con el bot贸n que est谩 en el cuadro de ingreso de texto, al lado derecho, antes del clip de adjuntar archivos\n\n驴<b>C贸mo regreso a la pregunta anterior 馃ゴ?</b>\nS贸lo copia el mensaje anterior a la pregunta que deseas ver y listo 馃ぉ";

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
    $respuesta = "Infograf铆as: 
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

    $respuesta = "<b>Ejercicio n煤mero 1:</b> \n\n La compa帽铆a 鈥渁cer鈥? ha iniciado su trayecto dentro del mercado de la telefon铆a celular 馃摫. Con ese objetivo, se ha planteado el lanzamiento de diferentes modelos de celulares con su respectiva memoria, espacio y color. El programa que va a dise帽ar debe contemplar las principales caracter铆sticas y acciones que puede realizar un celular como encenderse y hacer llamadas. Realice su soluci贸n en un diagrama de clases, o en c贸digo en Java. A continuaci贸n, va a recibir una serie de preguntas y respuestas que le van a servir de gu铆a para su proceso de abstracci贸n.\n\n En la parte inferior va a aparecer un teclado con opciones para que respondas la siguiente pregunta 驴Cu谩l <b>NO</b> corresponde a un atributo de la clase celular?";

    $keyboard= [
        ['Memoria','Conectarse a internet'],
        ['Tama帽o (pulgadas)','Espacio (GB)']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
} 

//PRIMERA RESPUESTA
else if (isset($text) && $text == 'Conectarse a internet'){
    $sticker = "CAACAgEAAxkBAAEBG4xikkhecv_h6ogW4Kuaya68DiML2AACowQAAp-NkETEJoys9tiH2SQE";

    sendSticker($id,$sticker,$token);

    $respuesta = "Exacto!馃ぉ Recuerda que los atributos son caracter铆sticas o propiedades de los objetos. Ahora selecciona cu谩l es un m茅todo de la clase celular.";
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

    $respuesta = "Correcto!馃ぉ Recuerda que los m茅todos son las operaciones, funciones o acciones que puede hacer una clase.Para el estudio de POO te recomendamos realizar diagramas UML de las clases que vas creando.";
    sendMessage($id,$respuesta,$token);

    $photo = "https://bot-poo.000webhostapp.com/E1.1.png";

    $respuesta = "Ahora selecciona cu谩l de los diagramas corresponder铆a a la clase Celular \n\n Recuerda que el orden de un diagrama UML para las calses es 1. Nombre de la clase 2. Atributos 3. M茅todos.";

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
    $respuesta = "鉁? Vas s煤per bien ".$name." 馃コ. Ahora es momento de abrir tu editor de c贸digo (netbeans, eclipse, o cualquiera que te guste) y responde: \n C贸mo declarar铆as la clase celular en Java:
    \n\n <b>Opciones</b>
    \n Celular{ 鈥? }
    \n public class Celular{ 鈥? }
    \n Void Celular ( ) { 鈥? }
    ";

    $keyboard= [
        ['Celular{ 鈥? }','Void Celular ( ) { 鈥? }'],
        ['public class Celular{ 鈥? }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//CUARTA RESPUESTA
else if (isset($text) && $text == 'public class Celular{ 鈥? }'){
    $respuesta = "Excelente! 鉁? Recuerda, en Java las clases se declaran con la palabra reservada Class. \n\n Considerando que la clase 鈥淐elular鈥? tiene los atributos color y memoria. 驴Cu谩l ser铆a el constructor de la clase? 
    \n\n<b>Opciones</b>
    \npublic Celular(String color, int memoria, float espacio){...}
    \nprivate Constructor (String color, int memoria, float espacio) { 鈥? }
    \nCelular(String color, int memoria, float espacio) { 鈥? }";
    $keyboard= [
        ['public Celular(String color, int memoria, float espacio){...}'],
        ['private Constructor (String color, int memoria, float espacio) { 鈥? }'],
        ['Celular(String color, int memoria, float espacio) { 鈥? }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);

}

//QUINTA RESPUESTA
else if (isset($text) && $text == 'public Celular(String color, int memoria, float espacio){...}'){

    $sticker = "https://media.giphy.com/media/6G48V62YlbZj1W6fso/giphy.gif";

    sendSticker($id,$sticker,$token);


    $respuesta = "鉁? Muy bien! Recuerda que el constructor 馃懛 permite darle un valor inicial a una instancia de clase. En Java el constructor debe recibir el mismo nombre de la clase.
    \n\n Ya que sabes declarar una clase y darle un estado inicial, ahora vas a recordar uno de los pilarres de POO 馃彌锔廍ncapsulamiento馃彌锔?
    \n En la declaraci贸n de los atributos siguientes, 驴cu谩l utiliza encapsulamiento?
    \nOpciones
    \nString color = 鈥渞ojo鈥?;
    \nprivate String color; 
    ";
    $keyboard= [
        ['String color = 鈥渞ojo鈥?'],
        ['private String color']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//SEXTA RESPUESTA
else if (isset($text) && $text == 'private String color'){
    $respuesta = "鉁? Est谩s en lo correcto 馃槃 En java, para proteger los atributos o clases de un objeto se utilizan las palabras reservadas (modificadores de acceso) private, public, protected. 
    \n\n Pero... y si quieres acceder o modificar alg煤n atributo encapsulado es necesario utilizar m茅todos getters y setters. Cu谩l ser铆a el m茅todo setter correcto para el atributo color.
    \n\nOpciones
    \npublic void setColor(String color) { 鈥? }
    \npublic String setColor() { 鈥? }
    ";
    $keyboard= [
        ['public void setColor(String color) { 鈥? }'],
        ['public String setColor() { 鈥? }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//SEXTA RESPUESTA
else if (isset($text) && $text == 'public void setColor(String color) { 鈥? }'){
    $respuesta = "鉁? Perfecto 馃榾. Los m茅todos setters deben ser void porque no retornan un valor. Adem谩s, necesita un par谩metro para establecerlo (aqu铆 el par谩metro es String color)
    \nEntonces 驴Cu谩l ser铆a el m茅todo getter correcto para el atributo memoria?";
    $keyboard= [
        ['public void getMemoria(Int memoria) { 鈥? }'],
        ['public int getMemoria( ) { 鈥? }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//S脡PTIMA RESPUESTA
else if (isset($text) && $text == 'public int getMemoria( ) { 鈥? }'){
    $respuesta = '鉁? Asombroso! 馃コ Sigue practicando y genera los m茅todos getters y setters para el resto de atributos de la clase celular.
    \Continuemos 馃 Vas a programar un m茅todo que encienda el celular, 驴cu谩l es la mejor manera de implementarlo? Seleccione:
    鈥?	Opci贸n 1 public String enciende() {
		String estado="Encendiendo...";
		return estado;
        }
    鈥?	Opci贸n 2 public void enciende() {
		system.out.println(鈥淓ncendiendo鈥?);
        }
    ';
    $keyboard= [
        ['Opci贸n 1'],
        ['Opci贸n 2']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k);
}

//OCTAVA RESPUESTA
else if (isset($text) && $text == 'Opci贸n 1'){

    $respuesta = "S煤per! 馃コ馃コ馃コ No cometas el error de imprimir por consola, en lugar de retornar los datos que necesites.
    \n驴Qu茅 sigue? Intenta ahora programar el m茅todo llamar, recuerda que debe recibir un par谩metro (la persona a la que deseas llamar)";
    sendMessage($id,$respuesta,$token);

    $sticker = "https://media.giphy.com/media/du3J3cXyzhj75IOgvA/giphy.gif";

    sendSticker($id,$sticker,$token);

    $respuesta = "馃帀 Has resuelto el primer estudio de caso 馃帀. Instancia la clase celular en la clase main y prueba los m茅todos que has utilizado. 
    \nAqu铆 tienes un repositorio con el ejercicio resuelto a nuestra manera para que te sirva de gu铆a 馃檲: \nhttps://github.com/msmontenegro3/estudioCaso1.git";
    sendMessage($id,$respuesta,$token);

}


//EJERCICIO 2
else if (isset($text) && $text == '/ejercicio2' ){
    $sticker="https://media.giphy.com/media/I0V9yJDaRYJbX6JeQO/giphy.gif";
    sendSticker($id,$sticker,$token);

    $respuesta = "La escuela 鈥淎BC鈥? desea utilizar un programa que les ayude a sus estudiantes de niveles iniciales a reconocer los sonidos que hacen los animales. Los primeros animales que observan son los m谩s cercanos a ellos, es decir, las mascotas. Por lo tanto, el programa debe reproducir el sonido (onomatopeya) que producen los siguientes animales: perro 馃悤 y gato 馃悎.";

    sendMessage($id,$respuesta,$token);

    $sticker="CAACAgIAAxkBAAEBIO9iosv7uq5nWggqvPWn5z6ZcNmglgAC3gAD9HsZAAG9he9u98XOPSQE";
    sendSticker($id,$sticker,$token);
    $respuesta = "Iniciemos programando la clase Perro. De las siguientes declaraciones 驴Cu谩l es un atributo para la clase Perro?";

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
    $respuesta = "鉁? Exacto! Como ya te hab铆amos dicho, un atributo es una caracter铆stica o un estado de la clase.";
    sendMessage($id,$respuesta,$token);

    $respuesta = "De la siguiente lista, 驴Qu茅 m茅todo no corresponde a la clase Perro?";

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
    $respuesta = "鉁? Correcto! El m茅todo volar no es una acci贸n que pueda realizar un perro. Es importante identificar que los m茅todos dentro de una clase deben ser funciones u operaciones concernientes a la clase.\n\n
    Ahora pensemos en la clase Gato";

    sendMessage($id,$respuesta,$token);

    $sticker="CAACAgIAAxkBAAEBIPNiotTDEPnNQbc5KOzqwH_yTJ9e3QAC-AAD9HsZAAELURd6t1046SQE";
    sendSticker($id,$sticker,$token);

    $respuesta = "驴De qu茅 manera deber铆a instanciarse esa clase en Java?";

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
    $respuesta = "鉁? Buen trabajo! En Java para instanciar una clase se utiliza la palabra reservada new.\n\nBien, ahora imagina que este sistema va a crecer, y va a contener a todas las mascotas, y por qu茅 no, a todos los seres vivos. Entonces existe la necesidad de utilizar herencia.";

    sendMessage($id,$respuesta,$token);
    
    $respuesta = "Entonces 驴Cu谩l de los siguientes diagramas UML es el correcto para la relaci贸n entre animal, gato y perro?";

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
    $respuesta = "鉁? Enhorabuena! La clase gato y perro van a heredar atributos y m茅todos de la clase animal. Evidentemente se cumple la regla de 鈥渆s un鈥? para identificar si existe herencia.";

    sendMessage($id,$respuesta,$token);

    $respuesta = "驴C贸mo debe declararse en Java la clase Gato, considerando que hereda de animal?";

    $keyboard= [
        ['public class Gato extends Animal{ 鈥? }'],
        ['public class Animal extends Pato{ 鈥? }'],
        ['public class Gato super Animal{ 鈥? }']
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);

    sendMessage($id,$respuesta,$token,$k); 
}

//RESPUESTA 2.5
else if(isset($text) && $text == 'public class Gato extends Animal{ 鈥? }' ){
    $respuesta = "鉁? Muy bien! En Java la palabra extends se utiliza para declarar la herencia existente entre las clases";

    sendMessage($id,$respuesta,$token);
    $respuesta = "驴C贸mo se llama al constructor de la clase padre, desde el constructor de la clase Gato?";

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
    $respuesta = "鉁? S煤per! La palabra reservada super, invoca al constructor de la clase padre (en este caso invoca al constructor de animal).";

    sendMessage($id,$respuesta,$token);
    $respuesta = "Y si la clase padre recibe como par谩metros nombre y raza 驴C贸mo debe declararse el constructor de la clase hija Perro?";

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
    $respuesta = "鉁? Est谩s en lo correcto! Si la clase padre tiene un constructor, que recibe par谩metros, la clase hija tambi茅n debe recibir los mismos par谩metros.";

    sendMessage($id,$respuesta,$token);
    
}















//RESPUESTA POR DEFECTO
else if(isset($text)){
    $respuesta = "Te equivocaste, intenta de nuevo 馃槄. Si tienes problemas puedes usar el comando /help";

    sendMessage($id,$respuesta,$token);
} 

//ENV脥O Y CONEXI脫N API DE TELEGRAM

//Funci贸n para enviar menssajes
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

//Funci贸n para enviar fotos
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

//Aqu铆 puede mandar stickers al menos desde la web
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


