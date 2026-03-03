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
}

iniciarServidor();