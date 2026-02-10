USE stock_db;

/*

CREATE TABLE suppliers (
   	id_supplier INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(150),
    phone VARCHAR(20) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
   	id_product INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(500),
    price DECIMAL(10,2) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    fk_supplier INT NOT NULL,
    FOREIGN KEY (fk_supplier) REFERENCES suppliers(id_supplier) ON DELETE SET NULL
);


INSERT INTO suppliers (name,email,phone) VALUES 
("Dulux Valentine","contact@dulux.fr","+33312345671"),
("V33","contact@v33.fr","+33312345672"),
("Libéron","contact@liberon.fr","+33312345673"),
("Luxens","contact@luxens.fr","+33312345674");


INSERT INTO products (name,description,price,fk_supplier) VALUES
("Vert Parisien 2L","Vert parisien 2L en Velours",37.89,2),
("Pinceau 8mm","Pinceau Dexter 8mm de diamètre rond",2.99,4);

*/

