function sendEmail(){
    Email.send({
        Host : "smtp.gmail.com",
        Username : "olicass100@gmail.com",
        Password : "96Kenton*",
        To : 'them@website.com',
        From : document.getElementById("email").value,
        Subject : "new contact form enquiry",
        Body : "Name: " + document.getElementById("name").value
            + "<br> Email: " + document.getElementById("email").value
            + "<br> message: " + document.getElementById("message").value
    }).then(
      message => alert("message sent sucesfully")
    );
}
