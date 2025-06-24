<?php
class Resultado{
    public bool $esExitoso;
    public mixed $valor;
    public ?string $error;

    //CONSTRUCTOR PRIVADO PARA FORZAR EL USO DE LOS METODOS ESTATICOS
    private function __construct(bool $esExitoso, mixed $valor = null, ?string $error = null){
    $this->esExitoso = $esExitoso;
    $this->valor = $valor;
    $this->error = $error;
    }

    // Crear un resultado exitoso
    public static function exito(mixed $valor): Resultado {
        return new Resultado(true, $valor, null);
    }

    // Crear un resultado fallido
    public static function fallo(string $mensajeError): Resultado {
        return new Resultado(false, null, $mensajeError);
    }

    // Saber si fue un fallo
    public function esFallo(): bool {
        return !$this->esExitoso;
    }
}
?>