function validate() 
{
    var name = document.getElementById("name");
    var email = document.getElementById("email").value;
    var em = /^([a-zA-Z-0-9\.-]+)@([a-zA-Z0-9-]+)\.([a-z]+)(\.[a-z]+)?$/;
    if (em.test(email)) 
    {
        alert("Email valid");
    } 
    else 
    {
        alert("Email invalid");
        return false;
    }
  
    // Validate phone number
    var phoneNo = document.getElementById("phone").value;
    var x = /^[789]{1}[0-9]{9}$/;
    if (x.test(phoneNo) == false) 
    {
       alert("Phone invalid");
       return false;
    }
    else
    {
        alert("Phone valid");
    }
  
    // Validate country selection
    var country = document.getElementById("country");
    var a = country.options[country.selectedIndex].value;
    if (a == "")
    {
      alert("Please select the option");
      return false;
    }
    else 
    {
      alert("Value selected is " + a);
    }
  
    // Validate pincode
    var pincode = document.getElementById("pincode").value;
    var pin = /^[0-9]{6}$/;
    if (pin.test(pincode) == false) 
    {
      alert("Invalid pin code");
      return false;
    } 
    else
    {
      alert("Pincode valid");
    }
  
    // Password validation
    var passwd = document.getElementById("password").value;
    if (passwd.length < 8) {
      alert("Password must be at least 8 characters long!");
      return false;
    }
    if (passwd.search(/[0-9]/) === -1) {
      alert("Password must have at least one number!");
      return false;
    }
    if (passwd.search(/[A-Z]/) === -1) {
      alert("Password must have at least one uppercase letter!");
      return false;
    }
    if (passwd.search(/[a-z]/) === -1) {
      alert("Password must have at least one lowercase letter!");
      return false;
    }
    if (passwd.search(/[!@#$%^&*(),.?":{}|<>]/) === -1) {
      alert("Password must have at least one special character!");
      return false;
    }
  
    // Validate password confirmation
    var confirmPassword = document.getElementById("confirm_password").value;
    if (passwd !== confirmPassword) {
      alert("Passwords do not match!");
      return false;
    } else {
      alert("Password is valid and matches!");
    }
     
    var male = document.getElementsByName("gender");
    var female = document.getElementsByName("gender");
    var other = document.getElemenstByName("gender");
 
    if (male.checked)
    {
        alert("You selected: male");
    }
    else if (female.checked) 
    {
        alert("You selected:female");
    }
    else if (other.checked)
    {
        alert("You selected: Other");
    }
    else
    {
        alert("Please select a branch.");
    }
    // All validations passed
    alert("Form submitted successfully!");
    return true;
  }