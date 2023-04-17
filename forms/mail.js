


export function myfunction(){
  var name = document.querySelector('#names');
  var email = document.querySelector('#email');
  var phone = document.querySelector('#phone');
  var date = document.querySelector('#time');
  var time = document.querySelector('#date');
  var message = document.querySelector('#message');
  var button = document.querySelector('#button');

  var mysql = require('mysql');

  var con = mysql.createConnection({
      host: "localhost",
      user: "root",
      password: "",
      database: "login"
  });

  alert(`${name.value} ${email.value} ${phone.value} ${date.value} ${time.value} ${message.value}`);
  con.connect(function(err) {
      if (err) throw err;
      console.log("Connected!");
      var sql = "INSERT INTO appointments (name, email, phone, date, time,message) VALUES ('Company', 'Highway',090998889,'12/10/2002','09:10','patho','hello')";
      con.query(sql, function (err, result) {
        if (err) throw err;
          console.log("1 record inserted");
        });
  });
}
button.addEventListener('click',myfunction,true);