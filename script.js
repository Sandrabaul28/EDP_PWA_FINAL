document.getElementById('student-form').addEventListener('submit', function (e) {
   e.preventDefault(); // Prevent the default form submission

   // Get form data
   const formData = new FormData(this);

   // Send a POST request to create.php
   fetch("create.php", {
       method: 'POST',
       body: formData,
   })
   .then(response => response.text())
   .then(data => {
      if (data === "Student information saved successfully") {
         // Display a success message on the web page
         alert("Student information saved successfully");
         // You can also clear the form or perform other actions here
     } else {
         // Display an error message on the web page
         alert("Error");
     }
   })
   .catch(error => console.error('Error:', error));
});
