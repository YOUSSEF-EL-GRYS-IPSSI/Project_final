function sendMail(){
    let data = {
        email: document.getElementById("email").value,
        name: document.getElementById("name").value,
        signal: document.getElementById("clean")[document.getElementById("clean").selectedIndex].value,
        orient: document.getElementById("clean-2")[document.getElementById("clean-2").selectedIndex].value,
        message:  document.getElementById('msg').value
    };
    let xhr = new XMLHttpRequest(); // Création d'XMLHttpRequest
    xhr.open('POST', 'http://website.localhost/Contact/sendmail', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Call a function when the state changes.
        if(xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
        }
    }
    xhr.send("data="+JSON.stringify(data));
}