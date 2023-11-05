function validateForm() 
{
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var password = document.getElementById("password").value;
    var address = document.getElementById("address").value;
  
    var namePattern = /^[A-Za-z\s]+$/;
    var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    var phonePattern = /^\d{10}$/;
  
    if (!name.match(namePattern)) {
      alert("Invalid name. Please enter alphabets and spaces only.");
      return false;
    }
  
    if (!email.match(emailPattern)) {
      alert("Invalid email. Please enter a valid email address.");
      return false;
    }
  
    if (!phone.match(phonePattern)) {
      alert("Invalid phone number. Please enter a 10-digit number.");
      return false;
    }
  
    if (password.length < 8) {
      alert("Invalid password. Password must be at least 8 characters long.");
      return false;
    }
  
    if (address.length < 1) {
      alert("Invalid address. Please enter a valid address.");
      return false;
    }
  
    // If all validations pass, the form can be submitted
    return true;
  }
  