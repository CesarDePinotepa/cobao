<?php
$nombre = $_FILES['arch']['name'];
$tipo_archivo = $_FILES['arch']['type'];
$tamano_archivo = $_FILES['arch']['size'];
$ruta = "../archivos/";
$ruta_del_archivo = $ruta.$_FILES['arch']['name'];
$nombre_archivo=$_FILES['arch']['name'];

if ($nombre!=''){
    if (!((strpos($tipo_archivo, "pdf"))&& ($tamano_archivo < 1000000))){
        /*se indica que la ext o el tamaño no son correctos*/
        echo "La extensión no es correcto o el tamaño del alrchivo es muy alta";

    }else{
        if(move_uploaded_file($_FILES['userfile']['tmp_name'],$ruta_del_archivo)){
            echo "El archivo se subió correctamente";
        }else{
            echo "No se pudo subir el archivo";
        }
    }
}

/*class clase_subir
{
    private $formatos = ['file/pdf'];

    public function subirArchivo($file){
        if (is_array($file)){
            if (in_array($file['type'],$this->formatos)){
                move_uploaded_file($file['tmp_name'],'../archivos/'.$file['name']);
                echo "El archivo se subió correctamente";
            }else{
                die("Sin soporte para este formato");

            }

        }else{
            die("No se subió el archivo");
        }
    }

}*/