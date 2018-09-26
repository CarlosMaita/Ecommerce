<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="desciption" content="Rouxa, Tienda virtual de Ropa para Damas, Caballeros y Niños.">
    <meta name="keywords" content="Rouxa, Ropa, Damas, Caballeros, Zapatos, Tienda Virtual">
    <meta name="author" content="Eutuxia, C.A.">
    <meta name="application-name" content="Tienda Virtual de Ropa, Rouxa."/>
    <link rel="icon" type="image/jpg" sizes="16x16" href="../imagen/favicon.jpg">
    <link rel="stylesheet" href="../css/style-main.css">
    <link href="../admin/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <title>Rouxa</title>
    <style>
        #letrap{ font-size: 30px; }
        #topic:hover #res{ display: block; }
        #preg{
            font-size: 20px;
            cursor: pointer;
        }
        #res{
            font-size: 15px;
            text-align: justify;
            display: none;
        }
    </style>
  </head>
  <body>
    <?php include_once '../common/menu2.php';
          include_once '../common/2domenu2.php';
    ?>
   <div style="min-height:100vh; background: #fff;">
    <?php
        if($_GET){
             switch($_GET['id']){
                 case 1:
                     ?>
         <div class="container p-3">
            <h1 id="letrap"  class="text-primary text-center">
              Ventas Al Mayor
            </h1>
            <hr class="my-4">
         </div>
         <div class="container">
           <div class="row justify-content-center">
             <div class="col-8 text-center">
                <div class="accordion" id="ac1">
                  <div class="card">
                    <div class="card-header" id="uno">
                      <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cuno" aria-expanded="true" aria-controls="collapseOne">
                          ¿A partir de cuantas piezas?
                        </button>
                      </h5>
                    </div>
                    <div id="cuno" class="collapse" aria-labelledby="uno" data-parent="#ac1">
                      <div class="card-body">
                        Las ventas Al Mayor se tomarán en cuenta a partir de 12 piezas.<br>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="dos">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#cdos" aria-expanded="false" aria-controls="collapseTwo">

                        </button>
                      </h5>
                    </div>
                    <div id="cdos" class="collapse" aria-labelledby="dos" data-parent="#ac1">
                      <div class="card-body">
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="tres">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctres" aria-expanded="false" aria-controls="collapseThree">
                          ¿Puedo elegir diferentes modelos?
                        </button>
                      </h5>
                    </div>
                    <div id="ctres" class="collapse" aria-labelledby="tres" data-parent="#ac1">
                      <div class="card-body">
                        Si, Puedes seleccionar todos los modelos y productos que desees, siempre y cuando sea a partir de 12 piezas.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="cuatro">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ccuatro" aria-expanded="false" aria-controls="collapseThree">
                          ¿Las tallas pueden ser variadas?
                        </button>
                      </h5>
                    </div>
                    <div id="ccuatro" class="collapse" aria-labelledby="cuatro" data-parent="#ac1">
                      <div class="card-body">
                        Por supuesto, puedes seleccionar las tallas que desees.<br>
                        En cualquier combinación que quieras elegir.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="cinco">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ccinco" aria-expanded="false" aria-controls="collapseThree">
                          ¿Cuales son las ofertas que podré obtener?
                        </button>
                      </h5>
                    </div>
                    <div id="ccinco" class="collapse" aria-labelledby="cinco" data-parent="#ac1">
                      <div class="card-body">
                        Son las mejores ofertas:<br>
                        - A partir de 1 Docena (12 piezas) hasta 4 Docenas, Recibirás un descuento del 5%.<br>
                        - A partir de 5 Docenas hasta 9 Docenas, recibirás un descuento del 8%.<br>
                        - A partir de 10 Docenas en adelante, recibirás un descuento del 10%.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container text-center my-3">
            <a class="btn btn-outline-dark" href="index.php">Volver</a>
          </div>
                     <?php
                     break;
                 case 2:
                       ?>
     <div class="container p-3">
        <h1 id="letrap" class="text-primary  text-center">
          Envíos y entregas
        </h1>
        <hr class="my-4">
     </div>
     <div class="container">
       <div class="row justify-content-center">
         <div class="col-8 text-center">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="hone">
                <h5 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#one" aria-expanded="true" aria-controls="collapseOne">
                    ¿Cuánto tiempo tardan en hacer los envíos?
                  </button>
                </h5>
              </div>
              <div id="one" class="collapse" aria-labelledby="hone" data-parent="#accordionExample">
                <div class="card-body">
                  Los envíos los realizamos de 24 a 48 horas, a partir de la confirmación en nuestras cuentas el pago del pedido.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="htwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#two" aria-expanded="false" aria-controls="collapseTwo">
                    ¿Cuánto tardará mi pedido en llegar?
                  </button>
                </h5>
              </div>
              <div id="two" class="collapse" aria-labelledby="htwo" data-parent="#accordionExample">
                <div class="card-body">
                  Todo dependerá de la empresa de encomiendas, del lugar de destino, y de la fecha en la cual se realiza el envío (feriados, fin de semana). En promedio tarda de 2 a 7 días en llegar.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="hthree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#three" aria-expanded="false" aria-controls="collapseThree">
                    ¿Cómo se cancela el costo del envío?
                  </button>
                </h5>
              </div>
              <div id="three" class="collapse" aria-labelledby="hthree" data-parent="#accordionExample">
                <div class="card-body">
                  Todos los envíos son realizados con cobro en destino, si desea otro medio de envío, consulte con en <a href="../contacto/atencion.php" target="_blank">atencion cercana</a>.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="hfour">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#four" aria-expanded="false" aria-controls="collapseThree">
                    ¿Cómo realizan los envíos?
                  </button>
                </h5>
              </div>
              <div id="four" class="collapse" aria-labelledby="hfour" data-parent="#accordionExample">
                <div class="card-body">
                  Todos los envíos son realizados con cobro en destino, si desea otro medio de envío, consulte con nosotros.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="hfive">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#five" aria-expanded="false" aria-controls="collapseThree">
                    ¿A qué hora realizan los envíos?
                  </button>
                </h5>
              </div>
              <div id="five" class="collapse" aria-labelledby="hfive" data-parent="#accordionExample">
                <div class="card-body">
                  Todos los envíos son realizados de Lunes a Viernes a las 3:00PM. Sin Excepción.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="hsix">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#six" aria-expanded="false" aria-controls="collapseThree">
                    ¿Podrian enviar mi pedido pago?
                  </button>
                </h5>
              </div>
              <div id="six" class="collapse" aria-labelledby="hsix" data-parent="#accordionExample">
                <div class="card-body">
                  Si, los pedidos los podemos enviar pagos desde la oficina de encomiendas. Sin embargo el cliente deberá cancelar el monto del envío antes de nosotros realizarlo.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="hseven">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#seven" aria-expanded="false" aria-controls="collapseThree">
                    ¿Cómo realizan los envíos?
                  </button>
                </h5>
              </div>
              <div id="seven" class="collapse" aria-labelledby="hseven" data-parent="#accordionExample">
                <div class="card-body">
                  Todos los envíos son realizados con cobro en destino, si desea otro medio de envío, consulte con nosotros.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="height">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#eight" aria-expanded="false" aria-controls="collapseThree">
                    ¿Cómo puedo comprobar el estado de mi pedido y de la entrega?
                  </button>
                </h5>
              </div>
              <div id="eight" class="collapse" aria-labelledby="height" data-parent="#accordionExample">
                <div class="card-body">
                  El estado de tu pedido lo puedes conocer con tu código de seguimiento (Llave digital), colocándolo en la opción de "Rastreo" de la empresa de encomiendas.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="hnine">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#nine" aria-expanded="false" aria-controls="collapseThree">
                    ¿Pueden hacer envíos a otro País?
                  </button>
                </h5>
              </div>
              <div id="nine" class="collapse" aria-labelledby="hnine" data-parent="#accordionExample">
              <div class="card-body">
                 Si, pero debes contactarnos antes de realizar la compra.
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
     </div>
     <div class="container text-center my-3">
       <a class="btn btn-outline-dark" href="index.php">Volver</a>
     </div>
                     <?php
                      break;
                 case 3:
                       ?>
       <div class="container p-3">
          <h1 id="letrap" class="text-primary  text-center">
            Devoluciones y Reembolsos
          </h1>
          <hr class="my-4">
       </div>
       <div class="container">
         <div class="row justify-content-center">
           <div class="col-8 text-center">
            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="hone">
                  <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#one" aria-expanded="true" aria-controls="collapseOne">
                      ¿Puedo devolver un producto que no me haya gustado?
                    </button>
                  </h5>
                </div>
                <div id="one" class="collapse" aria-labelledby="hone" data-parent="#accordionExample">
                  <div class="card-body">
                    No, Sólo podrás devolver los productos que te hayan llegado con defectos de fabrica.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="htwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#two" aria-expanded="false" aria-controls="collapseTwo">
                      ¿Cuánto tiempo tengo para realizar una devolución?
                    </button>
                  </h5>
                </div>
                <div id="two" class="collapse" aria-labelledby="htwo" data-parent="#accordionExample">
                  <div class="card-body">
                    Tienes 15 días para realizar la devolución de tu pedido. Contados a partir del momento en que retiras el pedido en la oficina de la empresa de encomiendas.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="hthree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#three" aria-expanded="false" aria-controls="collapseThree">
                      ¿Puedo devolver la mercancía y pedir a cambio mi dinero de vuelta?
                    </button>
                  </h5>
                </div>
                <div id="three" class="collapse" aria-labelledby="hthree" data-parent="#accordionExample">
                  <div class="card-body">
                    No, los reembolsos solo lo hacemos si la mercancía cuenta con defectos de fabrica.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="hfour">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#four" aria-expanded="false" aria-controls="collapseThree">
                      ¿Me abonarán los gastos de envío si realizo la devolución de un producto?
                    </button>
                  </h5>
                </div>
                <div id="four" class="collapse" aria-labelledby="hfour" data-parent="#accordionExample">
                  <div class="card-body">
                    No, los gastos del envío son montos pagados a la empresa de encomiendas, por lo cual nosotros no podemos devolver ese costo.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="hfive">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#five" aria-expanded="false" aria-controls="collapseThree">
                      ¿Se puede cambiar un producto por otro?
                    </button>
                  </h5>
                </div>
                <div id="five" class="collapse" aria-labelledby="hfive" data-parent="#accordionExample">
                  <div class="card-body">
                    Si, pero deberás cancelar la diferencia. Ademas que deberás pagar el costo del nuevo envío.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="hsix">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#six" aria-expanded="false" aria-controls="collapseThree">
                      ¿Cuándo recibiré el reembolso?
                    </button>
                  </h5>
                </div>
                <div id="six" class="collapse" aria-labelledby="hsix" data-parent="#accordionExample">
                  <div class="card-body">
                    Recibirás el rembolso en un plazo de 14 días naturales a partir de que: <br>
                    Hayamos recibido el pedido devuelto en nuestros almacenes; o
                    nos comuniques tu decisión de revocar el contrato de compra. En ese plazo de 14 días (a) deberás enviarnos una prueba de que has devuelto tu pedido o (b) recibiremos tu pedido online en nuestro almacén. <br>
                    Una vez hayas entregado el paquete al servicio de mensajería, tardará entre 3 - 5 días laborables en llegar a nuestro almacén. Cuando recibamos los productos devueltos, nos colocaremos en contacto contigo.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="hseven">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#seven" aria-expanded="false" aria-controls="collapseThree">
                      ¿Qué debo hacer si el paquete fue robado o extraviado por la agencia de encomiendas?
                    </button>
                  </h5>
                </div>
                <div id="seven" class="collapse" aria-labelledby="hseven" data-parent="#accordionExample">
                  <div class="card-body">
                    Deberás ponerte en contacto con la agencia de encomiendas, y presentarles tu situación para que puedan solucionar tu problema. Rouxa, C.A. no se hace responsable por los problemas ocasionados por la(s) empresa(s) de encomienda.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
       <div class="container text-center my-3">
         <a class="btn btn-outline-dark" href="index.php">Volver</a>
       </div>
                     <?php
                     break;
                 case 4:
                       ?>
       <div class="container p-3">
          <h1 id="letrap"  class="text-primary text-center">
            Métodos de pago
          </h1>
          <hr class="my-4">
       </div>
       <div class="container">
         <div class="row justify-content-center">
           <div class="col-8 text-center">
              <div class="accordion" id="ac1">
                <div class="card">
                  <div class="card-header" id="onei">
                    <h5 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cone" aria-expanded="true" aria-controls="collapseOne">
                        ¿Qué métodos de pago aceptan?
                      </button>
                    </h5>
                  </div>
                  <div id="cone" class="collapse" aria-labelledby="onei" data-parent="#ac1">
                    <div class="card-body">
                      Aceptamos pagos ofrecidos por Mercado pago y Transferencias bancarias a nuestras cuentas. Todos los pagos son procesados por dicha plataforma de cobranza.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="twoi">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctwo" aria-expanded="false" aria-controls="collapseTwo">
                        ¿Comó puedo realizar el pago de mi pedido?
                      </button>
                    </h5>
                  </div>
                  <div id="ctwo" class="collapse" aria-labelledby="twoi" data-parent="#ac1">
                    <div class="card-body">
                      El pago lo puedes realizar al momento de realizar su pedido, a traves de la plataforma de cobranza Mercado Pago.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="tres">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctres" aria-expanded="false" aria-controls="collapseThree">
                        ¿Puedo pagar mi pedido con dinero en efectivo o cheque?
                      </button>
                    </h5>
                  </div>
                  <div id="ctres" class="collapse" aria-labelledby="tres" data-parent="#ac1">
                    <div class="card-body">
                      No aceptamos cheques, giros bancarios o dinero en efectivo como pago por tu pedido. Los métodos de pago aceptados se indican en los terminos y condiciones.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="tres">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctres" aria-expanded="false" aria-controls="collapseThree">
                        ¿Puedo usar varios métodos de pago para mi pedido?
                      </button>
                    </h5>
                  </div>
                  <div id="ctres" class="collapse" aria-labelledby="tres" data-parent="#ac1">
                    <div class="card-body">
                      No puedes pagar por tu pedido con varios métodos de pago.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container text-center my-3">
          <a class="btn btn-outline-dark" href="index.php">Volver</a>
        </div>
                     <?php
                      break;

                 case 5:
                       ?>
       <div class="container p-3">
          <h1 id="letrap"  class="text-primary text-center">
            Seguimiento de pedidos
          </h1>
          <hr class="my-4">
       </div>
       <div class="container">
         <div class="row justify-content-center">
           <div class="col-8 text-center">
              <div class="accordion" id="ac1">
                <div class="card">
                  <div class="card-header" id="onei">
                    <h5 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cone" aria-expanded="true" aria-controls="collapseOne">
                        ¿Como se en donde se encuentra mi pedido?
                      </button>
                    </h5>
                  </div>
                  <div id="cone" class="collapse" aria-labelledby="onei" data-parent="#ac1">
                    <div class="card-body">
                      La ubicación de tu pedido la podrás observar en la pagina de <a href="../compras/index.php">seguimiento</a>, colocando tu llave dital.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="twoi">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctwo" aria-expanded="false" aria-controls="collapseTwo">
                        ¿Que es una Llave digital?
                      </button>
                    </h5>
                  </div>
                  <div id="ctwo" class="collapse" aria-labelledby="twoi" data-parent="#ac1">
                    <div class="card-body">
                      La <b>Llave digital</b> es un codigo generado por nuestro sistema, con el cual podrás obtener toda la información
                      referente a tu pedido.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="tres">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctres" aria-expanded="false" aria-controls="collapseThree">

                      </button>
                    </h5>
                  </div>
                  <div id="ctres" class="collapse" aria-labelledby="tres" data-parent="#ac1">
                    <div class="card-body">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container text-center my-3">
          <a class="btn btn-outline-dark" href="index.php">Volver</a>
        </div>
                     <?php
                     break;
                 case 6:
                       ?>
                       <div class="container p-3">
                          <h1 id="letrap"  class="text-primary text-center">
                            Vendedores
                          </h1>
                          <hr class="my-4">
                       </div>
                       <div class="container">
                         <div class="row justify-content-center">
                           <div class="col-8 text-center">
                              <div class="accordion" id="ac1">
                                <div class="card">
                                  <div class="card-header" id="onei">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cone" aria-expanded="true" aria-controls="collapseOne">
                                        Sin información.
                                      </button>
                                    </h5>
                                  </div>
                                  <div id="cone" class="collapse" aria-labelledby="onei" data-parent="#ac1">
                                    <div class="card-body">

                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" id="twoi">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctwo" aria-expanded="false" aria-controls="collapseTwo">

                                      </button>
                                    </h5>
                                  </div>
                                  <div id="ctwo" class="collapse" aria-labelledby="twoi" data-parent="#ac1">
                                    <div class="card-body">

                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" id="tres">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctres" aria-expanded="false" aria-controls="collapseThree">

                                      </button>
                                    </h5>
                                  </div>
                                  <div id="ctres" class="collapse" aria-labelledby="tres" data-parent="#ac1">
                                    <div class="card-body">

                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="container text-center my-3">
                          <a class="btn btn-outline-dark" href="index.php">Volver</a>
                        </div>
                     <?php
                      break;
                 case 7:
                       ?>
                       <div class="container p-3">
                          <h1 id="letrap"  class="text-primary text-center">
                            Promociones
                          </h1>
                          <hr class="my-4">
                       </div>
                       <div class="container">
                         <div class="row justify-content-center">
                           <div class="col-8 text-center">
                              <div class="accordion" id="ac1">
                                <div class="card">
                                  <div class="card-header" id="onei">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cone" aria-expanded="true" aria-controls="collapseOne">
                                        Sin información.
                                      </button>
                                    </h5>
                                  </div>
                                  <div id="cone" class="collapse" aria-labelledby="onei" data-parent="#ac1">
                                    <div class="card-body">

                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" id="twoi">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctwo" aria-expanded="false" aria-controls="collapseTwo">

                                      </button>
                                    </h5>
                                  </div>
                                  <div id="ctwo" class="collapse" aria-labelledby="twoi" data-parent="#ac1">
                                    <div class="card-body">

                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" id="tres">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctres" aria-expanded="false" aria-controls="collapseThree">

                                      </button>
                                    </h5>
                                  </div>
                                  <div id="ctres" class="collapse" aria-labelledby="tres" data-parent="#ac1">
                                    <div class="card-body">

                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="container text-center my-3">
                          <a class="btn btn-outline-dark" href="index.php">Volver</a>
                        </div>
                     <?php
                     break;
                 case 8:
                       ?>
       <div class="container p-3">
          <h1 id="letrap" class="text-primary text-center">
            Retiros en tienda
          </h1>
          <hr class="my-4">
       </div>
       <div class="container">
         <div class="row justify-content-center">
           <div class="col-8 text-center">
              <div class="accordion" id="ac1">
                <div class="card">
                  <div class="card-header" id="onei">
                    <h5 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cone" aria-expanded="true" aria-controls="collapseOne">
                        ¿Dónde puedo retirar mi pedido?
                      </button>
                    </h5>
                  </div>
                  <div id="cone" class="collapse" aria-labelledby="onei" data-parent="#ac1">
                    <div class="card-body">
                      Los pedidos los puedes retirar en la oficina de la empresa de encomiendas a la cual se te haya sido enviado el pedido.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="twoi">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctwo" aria-expanded="false" aria-controls="collapseTwo">
                        ¿Ustedes tienen tienda fisica?
                      </button>
                    </h5>
                  </div>
                  <div id="ctwo" class="collapse" aria-labelledby="twoi" data-parent="#ac1">
                    <div class="card-body">
                      No, nosotros somos tienda virtual.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container text-center my-3">
          <a class="btn btn-outline-dark" href="index.php">Volver</a>
        </div>
                     <?php
                      break;
                 case 9:
                       ?>
       <div class="container p-3">
          <h1 id="letrap"  class="text-primary text-center">
            Información de Rouxa
          </h1>
          <hr class="my-4">
       </div>
       <div class="container">
         <div class="row justify-content-center">
           <div class="col-8 text-center">
              <div class="accordion" id="ac1">
                <div class="card">
                  <div class="card-header" id="onei">
                    <h5 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cone" aria-expanded="true" aria-controls="collapseOne">
                        ¿Qué es Rouxa?
                      </button>
                    </h5>
                  </div>
                  <div id="cone" class="collapse" aria-labelledby="onei" data-parent="#ac1">
                    <div class="card-body">
                      Rouxa es la Tienda virtual (E-commerce) de la empresa Venezolana Rouxa C.A., fabricante de ropa de alta calidad y confort, cumpliendo con los estándares exigidos por nuestros clientes nacionales e internacionales.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="twoi">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctwo" aria-expanded="false" aria-controls="collapseTwo">
                        ¿Cuál es la visión de Rouxa C.A.?
                      </button>
                    </h5>
                  </div>
                  <div id="ctwo" class="collapse" aria-labelledby="twoi" data-parent="#ac1">
                    <div class="card-body">
                      Rouxa C.A. tiene como vision: "Vestir a las comunidades del nuevo continente considerando sus culturas y raíces originarias".
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="tres">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctres" aria-expanded="false" aria-controls="collapseThree">
                        ¿Que intereses sociales persigue Rouxa C.A?
                      </button>
                    </h5>
                  </div>
                  <div id="ctres" class="collapse" aria-labelledby="tres" data-parent="#ac1">
                    <div class="card-body">
                      Rouxa C.A. cree en la familia como pilar fundamental de la sociedad. Por lo que, el fortalecimiento de valores familiares en la sociedad Venezolana es el principal interes social de la empresa.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container text-center my-3">
          <a class="btn btn-outline-dark" href="index.php">Volver</a>
        </div>
              <?php
                      break;
                  case 10:
                        ?>
              <div class="container p-3">
              <h1 id="letrap" class="text-primary text-center">
                Publicar en Rouxa
              </h1>
              <hr class="my-4">
              </div>
              <div class="container">
              <div class="row justify-content-center">
              <div class="col-8 text-center">
               <div class="accordion" id="ac1">
                 <div class="card">
                   <div class="card-header" id="onei">
                     <h5 class="mb-0">
                       <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#cone" aria-expanded="true" aria-controls="collapseOne">
                         ¿Puedo publicar mi ropa en la página de Rouxa?
                       </button>
                     </h5>
                   </div>
                   <div id="cone" class="collapse" aria-labelledby="onei" data-parent="#ac1">
                     <div class="card-body">
                       Si, por supuesto puedes publicar todos los modelos y diseños que tengas.
                     </div>
                   </div>
                 </div>
                 <div class="card">
                   <div class="card-header" id="twoi">
                     <h5 class="mb-0">
                       <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#ctwo" aria-expanded="false" aria-controls="collapseTwo">
                         ¿Como podría publicar en la página?
                       </button>
                     </h5>
                   </div>
                   <div id="ctwo" class="collapse" aria-labelledby="twoi" data-parent="#ac1">
                     <div class="card-body">
                       Para publicar en nuestra página, debes ponerte en contacto con nosotros. Ve a <a href="../contacto/atencion.php">Atención cercana y pregunta que debes
                       hacer para poder publicar todos tus diseños en nuestra página.</a>
                     </div>
                   </div>
                 </div>
               </div>
              </div>
              </div>
              </div>
              <div class="container text-center my-3">
              <a class="btn btn-outline-dark" href="index.php">Volver</a>
              </div>
                      <?php
                       break;
                 default:
                       ?>
                       <div class="container">
                          <h1 id="letrap" class="text-primary">
                            No hay Preguntas frecuentes resgistradas.
                          </h1>
                        </div>
                     <?php
                     break;
             }
        }else{
              ?>
        <div class="container p-3">
         <h1 id="letrap" class="text-center text-primary">Preguntas Frecuentes(FAQ)</h1>
         <hr class="my-4">
         <ul class="faq-column">
           <li id="faq-li" style="background: #aaa;">
             <ul class="faq-row">
               <li><a href="index.php?id=9" class="text-white">Información de Rouxa</a></li>
               <li><a href="index.php?id=2" class="text-white">Envíos</a></li>
               <li><a href="index.php?id=3" class="text-white">Devoluciones y Reembolsos</a></li>
               <li><a href="index.php?id=4" class="text-white">Métodos de pago</a></li>
               <li><a href="index.php?id=8" class="text-white">Retiros en tienda</a></li>
             </ul>
           </li>
           <li id="faq-li" style="background: #aaa;">
             <ul class="faq-row">
               <li><a href="index.php?id=1" class="text-white">Al Mayor</a></li>
               <li><a href="index.php?id=5" class="text-white">Seguimiento de Pedidos</a></li>
               <li><a href="index.php?id=6" class="text-white">Vendedores</a ></li>
               <li><a href="index.php?id=7" class="text-white">Promociones</a></li>
               <li><a href="index.php?id=10" class="text-white">Publicar Ropa en Rouxa</a></li>
             </ul>
           </li>
        </ul>
      </div>
         <?php
        }
        ?>
   </div>
   <?php include_once '../common/footer2.php';?>
     <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
     <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
     <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
