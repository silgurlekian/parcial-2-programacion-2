<?php

class Variedad
{
    private int $id;
    private string $nombre;
    private string $descripcion;

    /**
     * Devuelve todas las variedades
     * 
     * @return array Array de objetos Variedad
     */
    public static function listaCompleta(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM variedades";

        $statement = $conexion->prepare($query);
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * Obtiene una variedad por su ID
     * 
     * @param int $id ID de la variedad
     * @return Variedad|null Objeto Variedad encontrado o null si no existe
     */
    public static function obtenerPorId(int $id): ?Variedad
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM variedades WHERE id = :id";

        $statement = $conexion->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $statement->execute();

        return $statement->fetch() ?: null;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @param string $nombre
     * @return self
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @param string $descripcion
     * @return self
     */
    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;
        return $this;
    }
}
