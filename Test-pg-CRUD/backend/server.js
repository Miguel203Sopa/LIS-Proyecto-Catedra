const express = require("express");
const { Pool } = require("pg");
const cors = require("cors");

const app = express();
app.use(express.json());
app.use(cors());

const pool = new Pool({
  user: "admin",
  host: "db",
  database: "midb",
  password: "1234",
  port: 5432,
});

async function esperarBase() {
  let conectado = false;

  while (!conectado) {
    try {
      await pool.query("SELECT 1");
      conectado = true;
      console.log("Base de datos conectada");
    } catch (err) {
      console.log("Esperando a la base de datos...");
      await new Promise(res => setTimeout(res, 2000));
    }
  }
}

async function iniciarServidor() {
  await esperarBase();

  await pool.query(`
    CREATE TABLE IF NOT EXISTS persona (
      id SERIAL PRIMARY KEY,
      nombre VARCHAR(100),
      edad INT
    )
  `);

  app.post("/guardar", async (req, res) => {
    const { nombre, edad } = req.body;
    await pool.query(
      "INSERT INTO persona(nombre, edad) VALUES($1, $2)",
      [nombre, edad]
    );
    res.json({ mensaje: "Guardado correctamente" });
  });

  app.listen(3000, () => {
    console.log("Servidor corriendo en puerto 3000 ");
  });

//Esta es la parte de view.html 12+1

  // CREAR
app.post("/usuarios", async (req, res) => {
  const { nombre, codigo, donacion } = req.body;

  await pool.query(
    "INSERT INTO usuario(nombre, codigo, donacion) VALUES($1,$2,$3)",
    [nombre, codigo, donacion]
  );

  res.json({ mensaje: "Usuario creado" });
});

// VER TODOS
app.get("/usuarios", async (req, res) => {
  const result = await pool.query("SELECT * FROM usuario ORDER BY id");
  res.json(result.rows);
});


// ELIMINAR
app.delete("/usuarios/:id", async (req, res) => {
  const { id } = req.params;

  await pool.query("DELETE FROM usuario WHERE id=$1", [id]);

  res.json({ mensaje: "Usuario eliminado" });
});


//UPDATEEEEEEEEEEEE
app.put("/usuarios/:id", async (req, res) => {
  const { id } = req.params;
  const { nombre, codigo, donacion } = req.body;

  await pool.query(
    "UPDATE usuario SET nombre=$1, codigo=$2, donacion=$3 WHERE id=$4",
    [nombre, codigo, donacion, id]
  );

  res.json({ mensaje: "Usuario actualizado" });
});



}

iniciarServidor();