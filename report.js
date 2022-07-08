function silmulate(){
    const mysql = require('mysql');

    const db = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "123456",
        database:"smartHouse",
    })
    
    db.connect((err) => {
        if (err) throw err;
        console.log("Connected!");
    });
}
