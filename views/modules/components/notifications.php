<?php
  $session = new UserSession();
  $notification = $session->get_notification();

  if($notification != false){
    switch ($notification['status']){
      case 'OK':
        $class_notification='alert alert-success alert-dismissible';
        $strong = "Operación realizada con éxito. ";
        break;
      case 'ERROR':
        $class_notification='alert alert-danger alert-dismissible';
        $strong = "Ocurrió un error. ";
        break;
      case 'WARNING':
        $class_notification='alert alert-warning alert-dismissible';
        $strong = "¡Advertencia!: ";
        break;
      case 'INFO':
        $class_notification='alert alert-info alert-dismissible';
        $strong = "¡Importante! : ";
        break;
    }

    // $html_notification = "<div class='modal fade'id='modal_nuevo_producto'>\n\t
    // <div class=modal-dialog modal-md'>\n\t
    //   <div class=modal-content'>\n\t
    //     <div class='". $class_notification ."'>\n\t
    //       <button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button>\n <strong>". $strong . "</strong> ". $notification['msg'] ."\n
    //     </div>
    //   </div>
    // </div>
    // </div>";

    // echo $html_notification;  

    // $html_notification = "<div class='". $class_notification ."'>\n\t
    //   <button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button>\n
    //   <strong>". $strong . "</strong> ". $notification['msg'] ."\n
    // </div>";
    // echo $html_notification;

    print(" <div class=' ". $class_notification ." '>
              <button type='button' class='close' data-dismiss='alert' ><i class='fa fa-times'></i></button><strong>". $strong . "</strong> ". $notification['msg'] ."
            </div>
          ");

    // print(" <div class='". $class_notification ."'>
    //           <div class='modal fade' id='modal_cliente_registrado'>
    //             <div class='modal-dialog modal-lg'>
    //               <div class='modal-content'>
    //                 <div class='modal-header'>
    //                   <h4 class='modal-title'><i class='fas fa-check'></i>h4>
    //                   <button type='button' class='close' data-dismiss='modal' ><i class='fas fa-times'></i></button><strong>". $strong . "</strong> ". $notification['msg'] ."
    //                 </div>
    //               </div>
    //             </div>
    //           </div>
    //         s</div>
    //       ");
  }


?>
