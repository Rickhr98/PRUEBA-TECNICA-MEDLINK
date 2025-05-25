# Challenlink - Prueba Técnica PHP

Este repositorio contiene las soluciones a los 3 retos técnicos en PHP para la prueba técnica de MedlinkLA.

## Estructura del proyecto

```
PRUEBA-TECNICA-MEDLINK/
├── challenge-01/
│   ├── README.md
│   ├── index.php
│   └── tests/
│       └── test1.php
├── challenge-02/
│   ├── README.md
│   ├── index.php
│   └── tests/
│       └── test2.php
├── challenge-03/
│   ├── README.md
│   ├── index.php
│   └── tests/
│       └── test3.php
├── run.sh
├── Dockerfile
└── README.md
```

Cada carpeta de `challenge-X` contiene la solución principal en `index.php` y pruebas en la subcarpeta `tests`.

---

## Ejecución local (sin Docker)

Asegúrate de tener instalado PHP 8.x.

### Ejecutar todos los retos

```bash
sh run.sh
```

### Ejecutar un reto específico

```bash
php challenge-01/index.php
php challenge-02/index.php
php challenge-03/index.php
```

---

## Ejecución con Docker (recomendado)

Si prefieres no instalar PHP localmente, puedes usar Docker.

### 1. Construir la imagen Docker

```bash
docker build -t challenlink .
```

### 2. Ejecutar todos los retos

```bash
docker run --rm challenlink
```

### 3. Ejecutar un reto específico

Puedes sobrescribir el comando para correr un reto puntual. Por ejemplo, para challenge 2:

```bash
docker run --rm challenlink php challenge-02/index.php
```

---

## Estructura de cada challenge

Dentro de cada carpeta `challenge-xx/` encontrarás:

- `index.php`: Archivo principal con la solución del reto.
- `README.md`: Descripción breve del reto y cómo probarlo.
- `tests/`: Carpeta con scripts de pruebas adicionales.



